@extends('partials.app')
@section('pagename', 'Enrollment Details')
@section('content')


<main class="p-6">
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 text-lg font-medium">Enrollment Details</h4>

        <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
            <a href="#" class="text-sm font-medium text-slate-700">{{ env('APP_NAME') }}</a>
            <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
            <a href="#" class="text-sm font-medium text-slate-700">Enrollments</a>
            <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
            <a href="#" class="text-sm font-medium text-slate-700" aria-current="page">Enrollment Details</a>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- User Details Section Start -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <tbody>
            <tr align="center">
                <td colspan="4" style="font-size:20px;color:blue">User Details</td>
            </tr>
            <tr align="center">
                <td colspan="4" style="font-size:20px;color:red">Enrollment Number: {{ $details->enrollment_number }}</td>
            </tr>
            <tr>
                <th scope="">First Name</th>
                <td>{{ $details->user->first_name }}</td>
                <th scope="">Last Name</th>
                <td>{{ $details->user->last_name }}</td>
            </tr>
            <tr>
                <th scope="">Mobile Number</th>
                <td>{{ $details->user->mobile_number }}</td>
                <th>Address</th>
                <td>{{ $details->user->address }}</td>
            </tr>
        </tbody>
    </table>
    <!-- User Details Section End -->

    <!-- Application Details Section Start -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <tbody>
            <tr align="center">
                <td colspan="4" style="font-size:20px;color:blue">Application Details</td>
            </tr>
            <tr>
                <th scope="">Full Name</th>
                <td>{{ $details->full_name }}</td>
                <th scope="">Gender</th>
                <td>{{ $details->gender }}</td>
            </tr>
            <tr>
                <th scope="">Date of Birth</th>
                <td>{{ $details->date_of_birth }}</td>
                <th scope="">Father/Spouse Name</th>
                <td>{{ $details->father_spouse_name }}</td>
            </tr>
            <tr>
                <th scope="">e-Card Number</th>
                <td>{{ $details->e_card_number }}</td>
                <th scope="">District</th>
                <td>{{ $details->district }}</td>
            </tr>
            <tr>
                <th scope="">Pincode</th>
                <td>{{ $details->pincode }}</td>
                <th scope="">Block / ULB</th>
                <td>{{ $details->block_ulb_name }}</td>
            </tr>
            <tr>
                <th scope="">BLOCK/ULB Name</th>
                <td>{{ $details->block_ulb_name }}</td>
                <th scope="">Document Type</th>
                <td>{{ $details->document_type }}</td>
            </tr>
            <tr>
                <th scope="">Document Number</th>
                <td>{{ $details->document_number }}</td>
                <th scope="">Photo</th>
                <td>
                    <a href="{{ asset('storage/' . $details->photo) }}" target="_blank">
                        <img src="{{ asset('storage/' . $details->photo) }}" style="width: 100px;" alt="Photo">
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="">Full Address</th>
                <td>{{ $details->full_address }}</td>
                <th scope="">Mobile Number</th>
                <td>{{ $details->user->mobile_number }}</td>
            </tr>
            <tr>
                <th scope="">Occupation</th>
                <td>{{ $details->occupation }}</td>
                <th scope="">Date of Apply</th>
                <td>{{ $details->created_at }}</td>
            </tr>
            <tr>
                <th>Order Final Status</th>

                <td>
    @if($details->status == 'pending')
        <button type="button" class="btn rounded-full bg-warning/25 text-warning hover:bg-warning hover:text-white">Pending</button>
    @elseif($details->status == 'verified')
        <button type="button" class="btn rounded-full bg-success/25 text-success hover:bg-success hover:text-white">Verified</button>
    @elseif($details->status == 'rejected')
        <button type="button" class="btn rounded-full bg-danger/25 text-danger hover:bg-danger hover:text-white">Rejected</button>
    @else
        <!-- Handle other cases or provide a default button -->
    @endif
</td>

                <th>Admin Remark</th>
                <td>{{ $details->remark }}</td>
            </tr>
        </tbody>
    </table>
    <!-- Application Details Section End -->
    <button style="text-align: center;" type="button" data-fc-type="modal" class="btn bg-primary text-white">
        Take Action
    </button>

    <div class="hidden w-full h-full fixed top-0 start-0 z-50 transition-all duration-500">
        <div class="fc-modal-open:mt-7 fc-modal-open:opacity-100 fc-modal-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="flex justify-between items-center py-2.5 px-4 border-b">
                    <h3 class="font-bold text-gray-800">
                        Update Application
                    </h3>
                    <button data-fc-dismiss type="button" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm">
                        <span class="sr-only">Close</span>
                        <i class="bx bx-x text-xl"></i>
                    </button>
                </div>
                <div class="p-4">
                    <form id="updateApplicationForm" action="{{ route('update-application', $details->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Status selection -->
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <!-- Add options for different status values -->
                                <option value="pending" @if($details->status == 'pending') selected @endif>Pending</option>
                                <option value="verified" @if($details->status == 'verified') selected @endif>Verified</option>
                                <option value="rejected" @if($details->status == 'rejected') selected @endif>Rejected</option>
                            </select>

                        </div>

                        <!-- Remark input -->
                        <div class="form-group">
                            <label for="remark">Remark:</label>
                            <textarea name="remark" id="remark" class="form-input" rows="5">{{ $details->remark }}</textarea>
                        </div>

                        <!-- Submit button -->
                        <div class="flex justify-end items-center gap-x-2 py-2.5 px-4 border-t">
                            <button data-fc-dismiss type="button" class="btn bg-secondary text-white">
                                Close
                            </button>
                            <button type="submit" class="btn bg-primary text-white">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div>

    </div>




</main>

@endsection