<div class="card">
    <div class="card-body">

@foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach
<form method="post" action="{{$route}}">
    @csrf
    {!! $type !!}
    <input type="hidden" name="user_permission" value="1">
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <div class="row">
        <div class="col-md-6">
            @if(is_array(config('rights.standard_permissions')))
                <div class="alert-primary alert mb-2">Standard Permissions</div>
                @foreach(config('rights.standard_permissions') as $element => $permissions )
                    <div class="form-check">
                        <input class="form-check-input" name="standard_permissions[]" type="checkbox" value="{{$element}}" @if(!empty($rights) && !empty($rights['standard_permissions']) && in_array($element,$rights['standard_permissions'])) checked @endif />
                        <label class="form-check-label">{{ ucwords(str_replace(array('_'),' ',substr_index($element,'.',-1))) }}</label>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-6">
            @if(is_array(config('rights.administrative_permissions')))
                <div class="alert alert-primary mb-2">Administrative Permissions</div>
                @foreach(config('rights.administrative_permissions') as $primary_element => $primary_permission)
                    <div class="form-check">
                        <input class="form-check-input" name="administrative_permission[]" type="checkbox" value="{{$primary_element}}" @if(!empty($rights) && !empty($rights['administrative_permission']) && in_array($primary_element,$rights['administrative_permission'])) checked @endif>
                        <label class="form-check-label">{{ ucwords(str_replace(array('_'),' ',substr_index($primary_element,'.',-1))) }}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-primary me-2">Save</button>
        @if(!empty($next))<a href="{{$next}}" class="btn btn-secondary ml-2">Skip</a>@endif
    </div>
 </form>

 </div>
</div>