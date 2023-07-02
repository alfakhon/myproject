@extends('layaut')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
</div>
@endif
<form action="{{route('plusstore')}}" method="post">
    @csrf
    @method('POST')
    <input type="hidden" name="cat_id" value="{{$color->types->cats->id}}">
    <input type="hidden" name="type_id" value="{{$color->types->id}}">
    <input type="hidden" name="color_id" value="{{$color->id}}">

    <input type="number" name="amount"  id="" placeholder="amount" class="form-control">
    <input type="number" name="r_soni"  id="" class="form-control" placeholder="rulon soni">
    <input type="text" name="desc"  id="" class="form-control">
    <input type="hidden" name="status" value="1">
    <input type="date" name="vaqt" class="form-control" id="">
    <input type="submit" class="btn btn-info">
    <a href="">back</a>
</form>
@endsection()