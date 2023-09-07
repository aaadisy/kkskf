@extends('partials.app')
@section('pagename', 'Dashboard')
@section('content')


<main class="p-6">

<!-- Page Title Start -->
<div class="flex justify-between items-center mb-6">
    <h4 class="text-slate-900 text-lg font-medium">Add User</h4>

    <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
        <a href="#" class="text-sm font-medium text-slate-700">{{ env('APP_NAME') }}</a>
        <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
        <a href="#" class="text-sm font-medium text-slate-700">Users</a>
        <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
        <a href="#" class="text-sm font-medium text-slate-700" aria-current="page">Add User</a>
    </div>
</div>
<!-- Page Title End -->

<div class="flex flex-col gap-6">
    <div class="card">
        <div class="p-6">
            <h4 class="card-title mb-4">Add User</h4>

            <form class="grid lg:grid-cols-3 gap-6" method="post" action="{{ route('userstore') }}">
                @csrf
                <div>
                    <label for="validationDefault01" class="text-gray-800 text-sm font-medium inline-block mb-2">First name</label>
                    <input type="text" class="form-input" id="validationDefault01" name="first_name"  value="" required>
                </div>
                <div>
                    <label for="validationDefault02" class="text-gray-800 text-sm font-medium inline-block mb-2">Last name</label>
                    <input type="text" class="form-input" id="validationDefault02" name="last_name"  value="" required>
                </div>
                <div>
                    <label for="mobile" class="text-gray-800 text-sm font-medium inline-block mb-2">Mobile Number</label>
                    <input type="text" class="form-input" id="mobile" name="mobile_number" value="" required>
                </div>
                <div>
                    <label for="validationDefaultUsername" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                    <div class="flex items-center">
                        <span class="py-2 px-3 bg-light rounded-l" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-input rounded-l-none" name="email" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div>
                    <label for="password" class="text-gray-800 text-sm font-medium inline-block mb-2">Password</label>
                    <input type="text" class="form-input" id="password" name="password" value="" required>
                </div>
               
                <div>
                    <label for="validationDefault04" class="text-gray-800 text-sm font-medium inline-block mb-2">Role</label>
                    <select name="role" class="form-select" id="validationDefault04" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div>
                    <label for="address" class="text-gray-800 text-sm font-medium inline-block mb-2">Address</label>
                    <input type="text" class="form-input" id="address" name="address" value="" required>
                </div>

                <div>
                    <label for="validationDefault05" class="text-gray-800 text-sm font-medium inline-block mb-2">Registration Date</label>
                    <input type="date" name="registration_date" class="form-input" id="validationDefault05" required>
                </div>
               
                <div class="col-span-3">
                    <button class="btn bg-primary text-white" type="submit">Add User</button>
                </div>
            </form>
        </div>
    </div>

</div>
</main>

   
@endsection