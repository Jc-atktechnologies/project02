<option value="">Select Representative</option>
@foreach($representatives as $representative)
    <option value="{{$representative->id}}">{{ $representative->name}}</option>
@endforeach
