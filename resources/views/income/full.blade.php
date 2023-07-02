@extends('layaut')
@section('content')
<table class="table">
  <thead class="">
    <tr>
        <th>
                No
        </th>
        <th>
                Amount
        </th>
        <th>
                Rulon
        </th>
       
        <th>
            Status
        </th>
        <th>
           Deskription
        </th>
        <th>
            edit/trash
        </th>
        
    </tr>
  </thead>
  <tbody class="table table-premium">
        @foreach($colors as $color)
        @if($color->status==1)

    <tr class="table table-info">
            <td>
                {{$loop->iteration}}
            </td>
            <td>
                {{$color->amount}}
            </td>
            <td>
                {{$color->r_soni}}
            </td>
            <td>
                @if($color->status==1)
                qoshildi
                @else
                olindi
                @endif

            </td>
            <td>{{$color->desc}}</td>
            
            
             <td>
                <a href="{{route('income.edit',['income'=>$color->id])}}">
                    <i class="fas fa-2x fa-edit">
    
                    </i>
                </a>
                <form action="{{route('delincome')}}" method="POST">
                    @csrf
                    <input type="hidden" name="color_id" value="{{$color->color_id}}">
                    <input type="hidden" name="id" value="{{$color->id}}">
                    <input type="hidden" name="status" value="{{$color->status}}">
                    <input type="submit" class="delsub" style="display: none;">

                </form>
                
                <a href="{{$color->id}}" class="del">
                    <i class="fas fa-2x fa-trash">
    
                    </i>
                </a>
            </td> 
    </tr>
    @else
    <tr class="table table-danger">
        <td>
            {{$loop->iteration}}
        </td>
        <td>
            {{$color->amount}}
        </td>
        <td>
            {{$color->r_soni}}
        </td>
        <td>
            @if($color->status==1)
            qoshildi
            @else
            olindi
            @endif

        </td>
        <td>{{$color->desc}}</td>
        
        
        <td>
            <a href="{{route('income.edit',['income'=>$color->id])}}">
                <i class="fas fa-2x fa-edit">

                </i>
            </a>
            <form action="{{route('delincome')}}" method="POST">
                @csrf
                <input type="hidden" name="color_id" value="{{$color->color_id}}">
                <input type="hidden" name="id" value="{{$color->id}}">
                <input type="hidden" name="status" value="{{$color->status}}">
                <input type="submit" class="delsub" style="display: none;">

            </form>
            
            <a href="{{$color->id}}" class="del">
                <i class="fas fa-2x fa-trash">

                </i>
            </a>
        </td> 
</tr>
@endif
    @endforeach
 </tbody>
</table>
@endsection()
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(function () {
      $('.del').click(function(e) {
          e.preventDefault();
          var id=$(this).attr('href');
          var qiy=confirm('Ochirilsinmi');
          if (qiy==true) {
              $('.delsub').click();
          }
      })
    })
</script>