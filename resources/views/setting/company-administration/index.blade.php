@extends('layouts.v2.app')

@section('content')
    {{-- Breadcrumb --}}

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">{{config('app.name','Laravel')}}</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
          <li class="breadcrumb-item active" aria-current="page">Company Administration</li>
        </ol>
</nav>

<div class="page-title-box pb-1">
    <h4 class="page-title">Company Administration</h4>
</div>

    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
                        <li class="breadcrumb-item active">Custom List</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div> --}}
    {{-- Table Content --}}

<div class="card">
    <div class="card-body">

    <div class="row">
        <div class="col-12">
        @include('flash::message')
            <div class="card">
                <h5 class="card-header bg-primary text-white">Customizable Lists</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('users-list') }}"> User List</a>
                        </div>
                        <div class="col-10">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores nostrum voluptatibus eum at vitae perspiciatis dolorem, perferendis accusamus laudantium tempore, id quod. Nihil in laborum repudiandae quas illo at quasi.</p>
                        </div>
                   </div>
                   <hr>
                   <div class="row">
                        <div class="col-2">
                            <a href="{{ route('insurer-list') }}">Insurer List</a>
                        </div>
                        <div class="col-10">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis molestiae, unde a ut velit reprehenderit quo deserunt amet facilis magni cupiditate doloremque ipsam fugiat nobis dolores iusto earum voluptate placeat.</p>
                        </div>
                   </div>
                   <hr>
                   <div class="row">
                    <div class="col-2">
                        <a href="{{ route('branch-list') }}">Branch List</a>
                    </div>
                    <div class="col-10">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor a corrupti laudantium, velit esse voluptas doloribus nam eligendi nisi. Illum, a tempore! Tempora modi accusamus accusantium, aperiam soluta voluptatum doloremque.</p>
                    </div>
               </div>
                 </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
