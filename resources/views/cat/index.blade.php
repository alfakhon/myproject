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
            <a href="{{route('cat.create')}}">
                <i class="fas fa-2x fa-plus">

                </i>
            </a>
        </th>
    </tr>
  </thead>
  <tbody class="table table-premium">
        @foreach($cats as $cat)
    <tr>
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$cat->cat}}
            </td>
            <td>
                <a href="{{route('cat.edit', $cat->id)}}">
                    <i class="fas fa-2x fa-edit">
    
                    </i>
                </a>
            </td>
    </tr>
    @endforeach
 </tbody>
</table>
@endsection()