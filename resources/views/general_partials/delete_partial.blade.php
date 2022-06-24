<form class="d-inline" method="post" action="{{$delete_url}}">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
</form>