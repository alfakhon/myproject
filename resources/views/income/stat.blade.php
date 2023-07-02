@extends('layaut')
@section('content')
<meta name="_token" content="{{csrf_token()}}" />
<div class="table table-hover" style="display: flex; flex-direction: row; ">
<form action="" method="get" style="display: flex; flex-direction: row;">
    <select  class="form-control cat_sel" style="width: 140px;">
        <option value="0">all item</option>
        @foreach($cats as $cat)<option value="{{$cat->id}}">{{$cat->cat}}</option>@endforeach
        </select>
        <select name="" id="" class="form-control type_sel" style="width: 170px;">
            <option value="0">--</option>
        </select>
        <select name="" id="" class="form-control status">
            <option value="1">Kirim</option>
            <option value="0">Chiqim</option>
        </select>
        <input type="date"  class="form-control sana">
        <input type="month"  class="form-control oy">
</form>
        <a href="" class="btn btn-facebook" style="height: 45px; margin-left: 1000px;" onclick="window.print()">Print</a>
    </div><br>
    <?
    $sum=0;
    $amount=0;
    $rsoni=0;
    ?>
    <style>
        @media print {
            .tdtd{
                display: none;
            }
            .sa{
                display: none;
            }
        }
    </style>
<table class="table">
  <thead class="table table-info">
        <th>No</th>
        <th width="150px">Category</th>
        <th width="180px">Type</th>
        <th>Colors</th>
        <th>Miqdor</th>
        <th>Rulonlar soni</th>
        <th>Full price</th>
        <th class="sa">Plus/Minus/eye</th>
    </tr>
  </thead>
  <tbody class="catbody">
       </tbody>
</table>
<h1 class="alert alert-info sum">Summa: {{number_format($sum)}}</h1>
<h1 class="alert alert-info amount">Miqdor: {{number_format($amount)}}</h1>
<h1 class="alert alert-info rsoni">Rulon soni: {{number_format($rsoni)}}</h1>
@endsection()
<br>
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    var sum = 0;
    var rsoni = 0;
    var amount = 0;
    var ursoni = 0;
    var uamount = 0;
    // $(function(){
                                //     $('.cat_sel').change(function(){
                                //         $.ajaxSetup({
                                //               headers: {
                                //                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                //               }
                                //           });
                                //            $.ajax({
                                //                type: 'GET',
                                //               url: "{{ route('catsel') }}",
                                //               dataType: 'json',
                                //               data: {
                                //                  cat: $('.cat_sel').val(),
                                //               },

                                //               success: function(result){
                                //                 result.colors.forEach(mf
                                //                 function (item, index){
                                //                     $('#catbody').html($('#catbody').html()+"<tr><td>"+item.type+"</td></tr>")
                                //                 })
                                //               }});
                                //     })
    // })

        $(function() {
            function number_format(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");
            }
            
            // ajax sartirovka qilish UP
            // ajax qidiruv option da
            $('.sana').change(function() {
              
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ route('catsel') }}",
                  method: 'get',
                  data: {
                     cat: $('.cat_sel').val(),
                    //  type: jQuery('#type').val(),
                    //  price: jQuery('#price').val()

                  },
                  success: function(result){
                      $('.catbody').empty();
                      $('.type_sel').empty();
                    result.types.forEach(mfe);
                    function mfe(item, index) {

                        $(".type_sel").html($(".type_sel").html()+"<option value="+item.id+">"+item.type+"</option>")
                    }
                    $('.sum').html('Umumiy summa: '+sum )
                    $('.amount').html('Miqdori: '+amount )
                    $('.rsoni').html('Rulon soni: '+rsoni )
                    sum = 0;
                    rsoni = 0;
                    amount = 0;
                  }});
            })
            $('.oy').change(function() {
              
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ route('sanaajax') }}",
                  method: 'get',
                  data: {
                     cat: $('.cat_sel').val(),
                     status: $('status').val,
                     sana: $('sana').val(),
                    //  type: jQuery('#type').val(),
                    //  price: jQuery('#price').val()

                  },
                  success: function(result){
                      $('.catbody').empty();
                      $('.type_sel').empty();
                    result.colors.forEach(mf);

                    function mf(item, index) 
                    {
                        rsoni=parseInt(rsoni)+parseInt(item.cr_soni);
                        amount=parseInt(amount)+parseInt(item.c_amount);
                        sum=sum*1+item.c_amount*item.price;
                        $('.catbody').html($('.catbody').html()+"<tr><td>"+(index*1+1)+
                            "</td><td>"+item.cat+"</td><td>"+item.type+"</td><td>"+item.color+
                                "</td><td>"+item.c_amount+"</td><td>"+item.cr_soni+
                                    "</td><td>"+item.c_amount*item.price+"</td><td><a href='plus/"+item.cid+"' class='btn btn-outline-info'><i class='fas fa-plus'></i></a> <a href='minus/"+item.cid+"' class='btn btn-outline-danger'><i class='fas fa-minus'></i></a> <a href='full/"+item.cid+"' class='btn btn-outline-primary'><i class='fas fa-eye'></i></a></td></tr>"
                                    )
                    }
                    result.types.forEach(mfe);
                    function mfe(item, index) {

                        $(".type_sel").html($(".type_sel").html()+"<option value="+item.id+">"+item.type+"</option>")
                    }
                    $('.sum').html('Umumiy summa: '+sum )
                    $('.amount').html('Miqdori: '+amount )
                    $('.rsoni').html('Rulon soni: '+rsoni )
                    sum = 0;
                    rsoni = 0;
                    amount = 0;
                  }});
            })
        })
</script>
