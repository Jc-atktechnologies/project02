<ul class="nav nav-pills navtab-bg nav-justified">
    <li class="nav-item mr-2">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['general_details']}}" @else disabled="disabled" @endif class="nav-link @if($tab == 'general_details') active @endif " >
            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
            <span class="d-none d-sm-block">General Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['preferences']}}" @else disabled="disabled" @endif  class="nav-link @if($tab == 'account_preference') active @endif " style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Preferences</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['permissions']}}" @else disabled="disabled" @endif class="nav-link @if($tab == 'user_permission') active @endif " style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Permissions</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['payout']}}" @else disabled="disabled" @endif class="nav-link @if($tab == 'payout_setting') active @endif " style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Payout Settings</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="#" @else disabled="disabled" @endif class="nav-link @if($tab == 'team_membership') active @endif disabled" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Team Membership</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="#" @else disabled="disabled" @endif class="nav-link @if($tab == 'skill') active @endif disabled" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Skills</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['attachment']}}" @else disabled="disabled" @endif class="nav-link @if($tab == 'attachments') active @endif " style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Attachments</span>
        </a>
    </li>
    <li class="nav-item">
        <a @if(!empty($tabs_url)) href="{{$tabs_url['notes']}}" @else disabled="disabled" @endif class="nav-link @if($tab == 'management_notes') active @endif " style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Notes</span>
        </a>
    </li>
</ul>
<hr>
