@extends('partials.app')
@section('pagename', 'Enrollments')
@section('content')


<main class="p-6">
    <div class="card bg-white overflow-hidden">
        <div class="card-header">
            <h4 class="card-title">{{ ucfirst($type) }} Enrollments</h4>
        </div>

        <div class="p-4">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200" id="dttable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Enrollment Number</th>
                                    <th>E-Card Number</th>
                                    <th>District</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
            ajax: {
                url: '{{ route("enrollmentlist") }}',
                data: function (data) {
                    // Add a filter for "status" to fetch only "verified" records
                    data.status = '{{ $type }}';
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'father_spouse_name', name: 'father_spouse_name' },
                { data: 'mobile_number', name: 'mobile_number' },
                { data: 'application_id', name: 'application_id' },
                { data: 'e_card_number', name: 'e_card_number' },
                { data: 'district', name: 'district' },
                { data: 'status_button', name: 'status_button' },
                { data: 'action', name: 'action' },
            ]
        });
    });
</script>


@endsection