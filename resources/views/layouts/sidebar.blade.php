<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" >

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fe-home"></i> <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fe-sidebar"></i>
                         <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('performance')}}">
                        <i class="fe-target"></i>
                         <span>Performance</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('finance')}}">
                        <i class="fe-dollar-sign"></i>
                         <span>Finance</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('calendar')}}">
                        <i class="fe-calendar"></i>
                         <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('claims-list')}}">
                        <i class="fe-file"></i>
                         <span>Claims</span>
                    </a>
                    <!-- <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('create-claims')}}">Create claim</a></li>
                        <li><a href="{{route('claims-list')}}">Search</a></li>
                    </ul> -->
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file"></i>
                         <span>Insurers</span>
                         <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('create-insurer')}}">Create Insurer</a></li>
                        <li><a href="{{route('insurer-list')}}">Insurer List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-users"></i>
                        <span>Users Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('users-list')}}">User List</a></li>
                        <li><a href="{{route('create-user')}}">Add User</a></li>
                    </ul>
                </li>
                <li>
                    <a>
                        <i class="fe-package"></i>
                         <span>Settings</span>
                         <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li>
                            <a href="javascript:void(0)">
                                <span>System</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li>
                                    <a href="{{route('custom-list')}}">Custom List</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-paperclip"></i>
                        <span>Branches</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('branch-list')}}">Branches List</a></li>
                        <li><a href="{{route('create-branch')}}">Add Branch</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

