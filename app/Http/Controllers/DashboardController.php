<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            $enrollmentCounts = [
                'verified' => Application::where('status', 'verified')->where('user_id', $user->id)->count(),
                'rejected' => Application::where('status', 'rejected')->where('user_id', $user->id)->count(),
                'pending' => Application::where('status', 'pending')->where('user_id', $user->id)->count(),
                'total' => Application::where('user_id', $user->id)->count()
            ];
            return view('dashboard', compact('enrollmentCounts'));
        } else {
            $enrollmentCounts = [
                'verified' => Application::where('status', 'verified')->count(),
                'rejected' => Application::where('status', 'rejected')->count(),
                'pending' => Application::where('status', 'pending')->count(),
                'total' => Application::count(),
            ];
            $userCounts = [
                'admin' => User::where('role', 'admin')->count(),
                'total' => User::count(),
            ];

            return view('dashboard', compact('enrollmentCounts', 'userCounts'));
        }
    }

    public function applicationdetails($id)
    {
        // Fetch the application details based on the provided id
        $details = Application::find($id);

        if (!$details) {
            // Handle the case where the application with the given id doesn't exist
            return abort(404); // You can customize the error response as needed
        }

        // Pass the application details to the "applicationdetails" view
        return view('applicationdetails', ['details' => $details]);
    }


    public function addapplication()
    {
        // Add logic to fetch data for the dashboard
        // For example, you can fetch recent activities, user data, etc.

        return view('addapplication'); // Replace 'dashboard.index' with your actual view name
    }

    public function applicationstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'father_spouse_name' => 'required|string',
            'e_card_number' => 'required|string',
            'full_address' => 'required|string',
            'mobile_number' => 'required|string',
            'occupation' => 'required|string',
            'pincode' => 'required|string',
            'cast' => 'required|in:SC,ST,OBC,MOBC,GEN,OTHERS',
            'total_family_members' => 'required|integer',
            'district' => 'required|string',
            'block' => 'required|string',
            'ulb' => 'required|string',
            'block_ulb_name' => 'required|string',
            'document_type' => 'required|in:Aadhaar,PAN,Voter ID',
            'document_number' => 'required|string',
            'photo' => 'required|image|max:51200', // Max 50KB
        ]);

        // Get the logged-in user's ID
        $userId = Auth::id();

        // Generate a unique application ID (you can customize this as needed)
        $applicationId = 'KKSKF' . time(); // Example: APP-1630929876

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Specify the storage disk ('public' in this case)
            // 'photos' is the directory within the 'public' disk where the file will be stored
        }


        // Create and store the application record in the database using the Application model
        $application = new Application([
            'user_id' => $userId, // Set the user_id of the logged-in user
            'application_id' => $applicationId, // Set the unique application_id
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'father_spouse_name' => $request->input('father_spouse_name'),
            'e_card_number' => $request->input('e_card_number'),
            'full_address' => $request->input('full_address'),
            'mobile_number' => $request->input('mobile_number'),
            'occupation' => $request->input('occupation'),
            'pincode' => $request->input('pincode'),
            'cast' => $request->input('cast'),
            'total_family_members' => $request->input('total_family_members'),
            'district' => $request->input('district'),
            'block' => $request->input('block'),
            'ulb' => $request->input('ulb'),
            'block_ulb_name' => $request->input('block_ulb_name'),
            'document_type' => $request->input('document_type'),
            'document_number' => $request->input('document_number'),
            'photo' => $photoPath, // Store the path to the uploaded photo
            // Add other fields as needed
        ]);

        $application->save();
        return redirect()->back()->with('success', 'Application has been Submitted successfully.');
    }
}
