   <!-- Sidenav Menu Start -->
   <div class="app-menu">

<!-- Brand Logo -->
<a href="{{ url('/home') }}" class="logo-box">
    <img src="{{ asset('') }}assets/images/logo-light.png" class="logo-light h-6" alt="Light logo">
    <img src="{{ asset('') }}assets/images/logo-dark.png" class="logo-dark h-6" alt="Dark logo">
</a>

<!--- Menu -->
<div data-simplebar>
    <ul class="menu" data-fc-type="accordion">

        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link waves-effect">
                <span class="menu-icon"><i class="ph-duotone ph-house"></i></span>
                <span class="menu-text"> Home </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link waves-effect">
                            <span class="menu-icon"><i class="ph-duotone ph-pen-nib"></i></span>
                <span class="menu-text"> Enrollments </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="sub-menu hidden">
            @if (Auth::user()->role == 'admin')
                <li class="menu-item">
                    <a href="{{ route('enrollmentsWithFilter', 'pending') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">New</span>
                    </a>
                </li>
            @endif
                <li class="menu-item">
                    <a href="{{ route('enrollmentsWithFilter', 'verified') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">Verified</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('enrollmentsWithFilter', 'rejected') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">Rejected</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('enrollments') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">All</span>
                    </a>
                </li>
                @if (Auth::user()->role != 'admin')
                <li class="menu-item">
                    <a href="{{ route('addapplication') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">New Apply</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>

        @if (Auth::user()->role == 'admin')
        <li class="menu-item">
            <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link waves-effect">
                <span class="menu-icon"><i class="ph-duotone ph-sign-in"></i></span>
                <span class="menu-text"> Users </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="sub-menu hidden">
                <li class="menu-item">
                    <a href="{{ route('adduser') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">Create</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('users') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">View</span>
                    </a>
                </li>
              
            </ul>
        </li>

       
        <li class="menu-item">
            <a href="{{ route('report') }}" class="menu-link waves-effect">
                            <span class="menu-icon"><i class="ph-duotone ph-chart-bar"></i></span>
                <span class="menu-text"> Reports </span>
            </a>
        </li>
        @endif

       

       
    </ul>
</div>
</div>
<!-- Sidenav Menu End  -->