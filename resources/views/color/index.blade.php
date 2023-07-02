@extends('layaut')
@section('content')
<table class="table">
  <thead class="table table-info">
    <tr>
        <th>
                No
        </th>
        <th>
                Categorys
        </th>
        <th>
                Types
        </th>
        <th>
                Colors
        </th>
        <th>
            <a href="{{route('color.create')}}">
                <i class="fas fa-2x fa-plus">

                </i>
            </a>
        </th>
    </tr>
  </thead>
  <tbody class="table table-premium">
        @foreach($colors as $color)
    <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$color->types->cats->cat}}
            </td>
            <td>
                {{$color->types->type}}
            </td>
            <td>
                {{$color->color}}
            </td>
            <td>
                <a href="">
                    <i class="fas fa-2x fa-edit">
    
                    </i>
                </a>
            </td>
    </tr>
    @endforeach
 </tbody>
</table>
@endsection()