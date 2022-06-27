<ul class="nav nav-pills navtab-bg nav-justified">
    <li class="nav-item mr-2">
        <a href="{{route('create-user')}}" class="nav-link @if($tab == 'general_details') active @endif" >
            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
            <span class="d-none d-sm-block">General Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('account-preference')}}" class="nav-link @if($tab == 'account_preference') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Account Preferences</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('user-permission')}}" class="nav-link @if($tab == 'user_permission') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">User Permissions</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('payout-setting')}}" class="nav-link @if($tab == 'payout_setting') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Payout Settings</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('team-membership')}}" class="nav-link @if($tab == 'team_membership') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Team Membership</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('skill')}}" class="nav-link @if($tab == 'skill') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Skills</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('attachments')}}" class="nav-link @if($tab == 'attachments') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Attachments</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('management-notes')}}" class="nav-link @if($tab == 'management_notes') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Management Notes</span>
        </a>
    </li>
</ul>
<hr>
