<form class="d-inline" method="post" action="{{$delete_url}}">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger"><i class="fa fa-trash" data-feather="trash" ></i> </button>
</form>