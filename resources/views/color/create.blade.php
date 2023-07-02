@extends('layaut')
@section('content')
<form action="{{route('color.store')}}" method="POST">
    @csrf
    @method('POST')
    <select name="cat_id" class="form-control">
    <option value="0">---</option>
        @foreach($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->cat}}</option>
        @endforeach
    </select>
    <select name="type_id" class="form-control">
        <option value="1">---</option>
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>
        <input type="text" name="color" class="form-control" placeholder="color">
        <input type="hidden" name="c_amount" class="form-control">
        <input type="hidden" name="cr_soni" class="form-control">
        <input type="hidden" name="c_price" class="form-control">
    <input type="submit" value="submit" class="btn btn-info">
    <a href="{{route('color.index')}}" class="btn btn-dark">prew</a>
   
    
</form>
@endsection()