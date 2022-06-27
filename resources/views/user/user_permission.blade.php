<form method="post" action="">
    @if(is_array(config('rights.standard_permissions')))
    <div class="alert-primary alert mb-2">Standard Permissions</div>
        @foreach(config('rights.standard_permissions') as $element => $permissions )
                <div class="form-check">
                    <input class="form-check-input" name="{{$element}}" type="checkbox" value="1" />
                    <label class="form-check-label">{{ ucwords(str_replace(array('_'),' ',substr_index($element,'.',-1))) }}</label>
                </div>
        @endforeach
    @endif
    @if(is_array(config('rights.administrative_permissions')))
        <div class="alert alert-primary mb-2 mt-2">Administrative Permissions</div>
        @foreach(config('rights.administrative_permissions') as $primary_element => $primary_permission)
            <div class="form-check">
                <input class="form-check-input" name="{{$primary_element}}" type="checkbox" value="1">
                <label class="form-check-label">{{ ucwords(str_replace(array('_'),' ',substr_index($primary_element,'.',-1))) }}</label>
            </div>
        @endforeach
    @endif
</form>
