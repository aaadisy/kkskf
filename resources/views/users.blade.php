@extends('partials.app')
@section('pagename', 'User List')
@section('content')


<main class="p-6">
    <div class="card bg-white overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
        </div>

        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200" id="dttable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card -->


</main>


    <script>
        $(document).ready(function () {
            $('#dttable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("userlist") }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'mobile_number', name: 'mobile_number'},
                    {data: 'address', name: 'address'},
                    {data: 'email', name: 'email'},
                    {data: 'registration_date', name: 'registration_date'},
                    {data: 'role', name: 'role'},
                ]
            });
        });
    </script>


@endsection