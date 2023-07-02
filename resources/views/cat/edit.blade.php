@extends('layaut')
@section('content')
<form action="{{ route('cat.update',['cat'=>$cats->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="cat" id="" value="{{ $cats->cat}}" class="form-control"><br>
    <button type="submit" name="s" class="btn btn-primary">send</button>
    <a href="{{route('cat.index')}}" class="btn btn-dark">back</a>
</form>
@endsection()