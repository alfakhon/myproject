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
<form action="{{route('income.update',['income'=>$income->id])}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="cat_id" value="{{$income->cat_id}}">
    <input type="hidden" name="type_id" value="{{$income->type_id}}">
    <input type="hidden" name="color_id" value="{{$income->color_id}}">

    <input type="hidden" name="oldamount"  id="" value="{{$income->amount}}" class="form-control">
    <input type="number" name="amount"  id="" value="{{$income->amount}}" class="form-control">
   
    <input type="hidden" name="oldr_soni"  id="" class="form-control" value="{{$income->r_soni}}">
    <input type="number" name="r_soni"  id="" class="form-control" value="{{$income->r_soni}}">
    
    <input type="text" name="desc"  id="" class="form-control" value="{{$income->desc}}">
    <input type="hidden" name="status" value="{{$income->status}}">
    <input type="date" name="vaqt" class="form-control" id="" value="{{$income->vaqt}}">
    <input type="submit" class="btn btn-info">
    <a href="{{route('income.index')}}" class="btn btn-info">back</a>
</form>
@endsection()