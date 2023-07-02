@extends('layaut')
@section('content')
<form action="{{route('type.store')}}" method="POST">
    @csrf
    @method('POST')
    <select name="cat_id" class="form-control">
    <option value="1">---</option>
        @foreach($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->cat}}</option>
        @endforeach
    </select>
    <input type="number" name="price" class="form-control" placeholder="price">
    <input type="text" name="type" class="form-control" placeholder="type"><br>
    <input type="submit" value="submit" class="btn btn-info">
    <a href="{{route('type.index')}}" class="btn btn-dark">prew</a>
    
</form>
@endsection()