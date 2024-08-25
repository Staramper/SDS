<ul class="nav nav-pills nav-sidebar flex-column">

    @switch(auth()->user()->role)
    
    @case('root')

            <li class="nav-item px-2">
                <a href="{{ route('users') }}" class="nav-link">
                <i class="fa-solid fa-user"></i>
                    <p> Users</p>
                </a></li>

            <li class="nav-item px-2">
                <a href="{{ route('empleados') }}" class="nav-link">
                    <i class="fa fa-bar-chart"></i>
                    <p> Employees</p>
                </a></li>

            <li class="nav-item px-2">
                <a href="{{ route('disp') }}" class="nav-link">
                    <i class="fa fa-video-camera"></i>
                    <p> Devices</p>
                </a></li>
    @break    
    @case('admin')

            <li class="nav-item px-2">
                <a href="{{ route('empleados') }}" class="nav-link">
                    <i class="fa fa-bar-chart"></i>
                    <p> Employees</p>
                </a></li>

            <li class="nav-item px-2">
                <a href="{{ route('disp') }}" class="nav-link">
                    <i class="fa fa-video-camera"></i>
                    <p> Devices</p>
                </a></li>

            <!-- <li class="nav-item px-2">
                    <a href="" class="nav-link">
                    <i class="fa fa-user"></i>
                    <p> Account</p>
                </a></li>
            <li class="nav-item px-2">
                    <a href="" class="nav-link">
                    <i class="fa fa-info-circle"></i>
                    <p> Help</p>
                </a></li> -->
    @break
    @default
    @endswitch
    </li>
</ul>
