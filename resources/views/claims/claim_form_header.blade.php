<ul class="nav nav-pills navtab-bg nav-justified">
    <li class="nav-item mr-2">
        <a href="{{ route('create-claims') }}" class="nav-link @if($tab == 'insurer_details') active @endif" >
            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
            <span class="d-none d-sm-block">Insurer Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('insured-details')}}" class="nav-link @if($tab == 'insured_details') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Insured Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('loss-details')}}" class="nav-link @if($tab == 'loss_details') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Loss Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('assignment-information') }}" class="nav-link @if($tab == 'assignment_information') active @endif" style="">
            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
            <span class="d-none d-sm-block">Assignment Information</span>
        </a>
    </li>
</ul>
<hr>
