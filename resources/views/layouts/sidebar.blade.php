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
                    <a href="{{route('claims')}}">
                        <i class="fe-file"></i>
                         <span>Claims</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a>Create Claim</a></li>
                        <li><a>Search Claim</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('contacts')}}">
                        <i class="fe-users"></i>
                         <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('settings')}}">
                        <i class="fe-package"></i>
                         <span>Settings</span>
                    </a>
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
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span>Cities</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('cities-list')}}">Cities List</a></li>
                        <li><a href="{{route('create-city')}}">Add City</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-sidebar"></i>
                        <span>Provinces</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('provinces-list')}}">Provinces List</a></li>
                        <li><a href="{{route('create-province')}}">Add Province</a></li>
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

