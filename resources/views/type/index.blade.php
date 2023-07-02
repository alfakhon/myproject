@extends('layaut')
@section('content')
<table class="table">
  <thead class="table table-info">
    <tr>
        <th>
                No
        </th>
        <th>
                Name
        </th>
        <th>
                Price
        </th>
        <th>
                Categorys
        </th>
        <th>
            <a href="{{route('type.create')}}">
                <i class="fas fa-2x fa-plus">
                    
                </i>
            </a>
        </th>
    </tr>
  </thead>
  <tbody class="table table-premium">
        @foreach($types as $type)
    <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$type->type}}
            </td>
            <td>
                {{$type->price}}
            </td>
            <td>
                {{$type->cats->cat}}
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