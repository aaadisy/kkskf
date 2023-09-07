<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function updateApplication(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'status' => 'required|in:pending,verified,rejected',
            'remark' => 'nullable|string|max:255',
        ]);

        // Update the application status and remark
        $application = Application::findOrFail($id);
        $application->status = $request->input('status');
        $application->remark = $request->input('remark');
        $application->save();

        // Redirect back with a success message
        return redirect()->route('applicationdetails', $id)->with('success', 'Application updated successfully.');
    }

    public function downloadReport(Request $request)
    {
        // Get the filter criteria from the form
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $userId = $request->input('user_id');
        $district = $request->input('district');
        $status = $request->input('status');

        // Start with a query for all applications
        $query = Application::query();

        // Apply filters based on the form inputs
        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($district) {
            $query->where('district', $district);
        }

        if ($status) {
            $query->where('status', $status);
        }

        // Fetch applications based on the applied filters
        $applications = $query->get();

        // Create a CSV string
        $csv = "ID,Name,Mobile Number,Enrollment Number,E-Card Number,District,Status\n";

        foreach ($applications as $application) {
            $csv .= "{$application->id},{$application->father_spouse_name},{$application->mobile_number},{$application->application_id},{$application->e_card_number},{$application->district},{$application->status}\n";
        }

        // Set response headers for downloading the CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="application_report.csv"',
        ];

        // Return the CSV as a downloadable file
        return Response::make($csv, 200, $headers);
    }

    public function users()
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.

        return view('users'); // Replace 'dashboard.index' with your actual view name
    }

    public function enrollments()
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.

        return view('enrollments'); // Replace 'dashboard.index' with your actual view name
    }

    public function enrollmentsWithFilter($type)
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.
        $type =  $type;
        return view('enrollmentswithfilter', compact('type'));
    }



    public function userlist(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->get();
            return Datatables::of($data)->make(true);
        }
    }


    public function enrollmentlist(Request $request)
    {
        if ($request->ajax()) {
            $user = Auth::user();

            // Define a query to fetch applications and join the users table
            $query = Application::select('applications.*')
                ->leftJoin('users', 'applications.user_id', '=', 'users.id')
                ->addSelect('users.first_name', 'users.last_name', 'users.email'); // Add any additional user fields you need

            // Check the user's role
            if ($user->role !== 'admin') {
                // Regular user can only see their own applications
                $query->where('applications.user_id', $user->id);
            }

            if ($request->has('status')) {
                // Filter by the "status" parameter value
                $query->where('applications.status', $request->input('status'));
            }

            $data = $query->get();

            return Datatables::of($data)
                ->addColumn('status_button', function ($row) {
                    $statusButton = '';
                    switch ($row->status) {
                        case 'pending':
                            $statusButton = '<button type="button" class="btn rounded-full bg-warning/25 text-warning hover:bg-warning hover:text-white">Pending</button>';
                            break;
                        case 'verified':
                            $statusButton = '<button type="button" class="btn rounded-full bg-success/25 text-success hover:bg-success hover:text-white">Verified</button>';
                            break;
                        case 'rejected':
                            $statusButton = '<button type="button" class="btn rounded-full bg-danger/25 text-danger hover:bg-danger hover:text-white">Rejected</button>';
                            break;
                        default:
                            // Handle other cases or provide a default button
                            break;
                    }
                    return $statusButton;
                })
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . route('applicationdetails', $row->id) . '" class="btn rounded-full bg-primary/25 text-primary hover:bg-primary hover:text-white">View</a>';
                    return $viewBtn;
                })
                ->rawColumns(['status_button', 'action']) // Specify both 'status_button' and 'action' columns as raw HTML
                ->make(true);
        }
    }


    public function report()
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.

        $users = User::get();
        $districts = Application::select('district')->get();

        return view('report', compact('users', 'districts')); // Replace 'dashboard.index' with your actual view name
    }




    public function adduser()
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.

        return view('adduser'); // Replace 'dashboard.index' with your actual view name
    }

    public function userstore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:200',
            'last_name' => 'required|string|max:200',
            'mobile_number' => 'required|numeric|digits:10',
            'address' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8', // You can adjust the minimum password length
            'role' => 'required|in:admin,employee', // Adjust the available roles as needed
        ]);

        // Create a new user record
        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile_number' => $request->input('mobile_number'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash the password
            'role' => $request->input('role'),
        ]);

        // Save the user record to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User has been registered successfully.');
    }
}
