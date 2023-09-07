@extends('partials.app')
@section('pagename', 'Reports')
@section('content')

<main class="p-6">
    <div class="card bg-white overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">Download Enrollemnt Report</h4>
        </div>
        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="p-6">
                    <form class="grid lg:grid-cols-3 gap-6" method="post" action="{{ route('downloadreport') }}">
                        @csrf
                        <div>
                            <label for="from_date" class="text-gray-800 text-sm font-medium inline-block mb-2">From Date</label>
                            <input type="date" name="from_date" class="form-input" id="from_date">
                        </div>
                        <div>
                            <label for="to_date" class="text-gray-800 text-sm font-medium inline-block mb-2">To Date</label>
                            <input type="date" name="to_date" class="form-input" id="to_date">
                        </div>


                        <div>
                            <label for="user_id" class="text-gray-800 text-sm font-medium inline-block mb-2">User</label>
                            <select name="user_id" class="form-select" id="user_id">
                                <option selected disabled value="">Choose...</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }} <small>{{ $user->role }}</small></option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="district" class="text-gray-800 text-sm font-medium inline-block mb-2">District</label>
                            <select name="district" class="form-select" id="district">
                                <option selected disabled value="">Choose...</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->district }}">{{ $district->district }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="status" class="text-gray-800 text-sm font-medium inline-block mb-2">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option selected disabled value="">Choose...</option>
                                <option value="pending">Pending</option>
                                <option value="verified">Verified</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>

                        <div class="col-span-3">
                            <button class="btn bg-primary text-white" type="submit">Download Report</button>
                        </div>
                    </form>
                </div>
            </div>


        </div> <!-- end card -->
</main>



@endsection