@extends('layaut')
@section('content')
<form action="{{route('cat.store')}}" method="POST">
    @csrf
    @method('POST')
<input type="text" name="cat" class="form-control" placeholder="category"><br>
<input type="submit"  value="Save" class="btn btn-primary">
<a href="{{route('cat.index')}}" class="btn btn-dark">back</a>
</form>
@endsection()