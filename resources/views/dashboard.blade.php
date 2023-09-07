@extends('partials.app')
@section('pagename', 'Dashboard')
@section('content')


    <main class="p-6">

        <!-- Page Title Start -->
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 text-lg font-medium">Dashboard</h4>

            <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
                <a href="#" class="text-sm font-medium text-slate-700">{{ env('APP_NAME') }}</a>
                <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
                <a href="#" class="text-sm font-medium text-slate-700" aria-current="page">Dashboard</a>
            </div>
        </div>
        <!-- Page Title End -->

        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="p-5">
                        <i class="bx bx-layer float-right text-3xl text-muted"></i>
                        <h6 class="text-muted text-sm uppercase">New</h6>
                        <h3 class="text-2xl mb-3" data-plugin="counterup">{{ $enrollmentCounts['pending'] }}</h3>
                         <span class="text-muted"><a href="{{ route('enrollmentsWithFilter', 'pending') }}">Entrollments</a> </span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="p-5">
                        <i class="bx bx-layer float-right text-3xl text-muted"></i>
                        <h6 class="text-muted text-sm uppercase">Verified </h6>
                        <h3 class="text-2xl mb-3" data-plugin="counterup">{{ $enrollmentCounts['verified'] }}</h3>
                         <span class="text-muted"><a href="{{ route('enrollmentsWithFilter', 'verified') }}">Entrollments</a> </span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="p-5">
                        <i class="bx bx-dollar-circle float-right text-3xl text-muted"></i>
                        <h6 class="text-muted text-sm uppercase">Rejected </h6>
                        <h3 class="text-2xl mb-3"><span data-plugin="counterup">{{ $enrollmentCounts['rejected'] }}</span></h3>
                        <span class="text-muted"><a href="{{ route('enrollmentsWithFilter', 'rejected') }}">Entrollments</a> </span>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="p-5">
                        <i class="bx bx-bx bx-analyse float-right text-3xl text-muted"></i>
                        <h6 class="text-muted text-sm uppercase">Total</h6>
                        <h3 class="text-2xl mb-3"><span data-plugin="counterup">{{ $enrollmentCounts['total'] }}</span></h3>
                        <span class="text-muted"><a href="{{ route('enrollments') }}">Entrollments</a> </span>
                    </div>
                </div>
            </div>

           
        </div>
        <!-- end row -->

     



        <div class="grid lg:grid-cols-3 gap-6 mb-6">
           
        <canvas id="enrollmentPieChart" width="200" height="200"></canvas>
           

            
        </div>
        <div class="grid lg:grid-cols-3 gap-6 mb-6">
           
        <canvas id="enrollmentLineChart" width="400" height="200"></canvas>
           

            
        </div>

       

    </main>

    <script>
    // Data for the pie chart (you can replace this with actual data)
    var enrollmentData = {
        labels: ['Verified', 'Rejected', 'Pending'],
        datasets: [{
            data: [{{ $enrollmentCounts['verified'] }}, {{ $enrollmentCounts['rejected'] }}, {{ $enrollmentCounts['pending'] }}],
            backgroundColor: ['green', 'red', 'yellow'], // Customize colors as needed
        }],
    };

    // Data for the line chart (you can replace this with actual data)
    var lineChartData = {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [{
            label: 'Enrollments',
            data: [10, 15, 8, 20, 12, 18, 14], // Replace with actual enrollment data for the last 7 days
            borderColor: 'blue', // Customize line color
            fill: false,
        }],
    };

    // Create a pie chart
    var pieChart = new Chart(document.getElementById('enrollmentPieChart'), {
        type: 'pie',
        data: enrollmentData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    // Create a line chart
    var lineChart = new Chart(document.getElementById('enrollmentLineChart'), {
        type: 'line',
        data: lineChartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });
</script>


   
@endsection