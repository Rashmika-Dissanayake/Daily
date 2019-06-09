@extends('layouts.app')

@section('content')
@if($selection=='weekly')
<table class="table table-bordered">
        <tbody>
         @php  $temp=0; @endphp
        @for($i=0;$i<2;$i++)
          <tr>
        @for($j=0;$j<5;$j++)
            <td>  
                <form method="POST" id="myForm" action="{{action('AdminController@weekly_save')}}">
                        {{ csrf_field() }}
                     @if($temp<$count)
                    @if($success=='Paid' && $customerPayment[$temp]['row_id']==$i && $customerPayment[$temp]['col_id']==$j)
                    @php echo $temp; @endphp
                    <div class="form-group">
                        <label for="pay_date">Date</label>
                        <input type="date" class="form-control" id="pay_date" name="pay_date" value='{{$customerPayment[$temp]['date_pay']}}'>
                    </div>
                    <div class="form-group">
                        <label for="pay_amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="{{$customerPayment[$temp]['amount']}}">
                    </div>
                    <div class="form-group form-check">
                        @if($customerPayment[$temp]['isPaid']==0)
                        <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                        <label class="form-check-label" for="check">Paid</label>
                        <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                        @else
                        <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                        <label class="form-check-label" for="check">Paid</label>
                        @endif
                    </div>
                    @if($customerPayment[$temp]['isPaid']==1)
                    <span class="success" style="color:green" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">{{$success}}</span>
                    @else
                    <span class="success" style="color:red" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">Not Paid</span>
                    @endif

                    @elseif($success=='Error Inserting' &&  $customerPayment[$temp]['row_id']==$i && $customerPayment[$temp]['col_id']==$j)
                    <div class="form-group">
                        <label for="pay_date">Date</label>
                        <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{$customerPayment[$j]['date_pay']}}">
                    </div>
                    <div class="form-group">
                        <label for="pay_amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="{{$customerPayment[$j]['amount']}}">
                    </div>
                    <div class="form-group form-check">
                        @if($customerPayment[$temp]['isPaid']==0)
                        <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                        <label class="form-check-label" for="check">Paid</label>
                        <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                        @else
                        <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                        <label class="form-check-label" for="check">Paid</label>
                        @endif
                    </div>
                    <span class="success" style="color:green" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">{{$success}}</span>

                    @else
                    @php echo $temp; @endphp
                    <div class="form-group">
                        <label for="pay_date">Date</label>
                        <input type="date" class="form-control" id="pay_date" name="pay_date" value="">
                    </div>
                    <div class="form-group">
                        <label for="pay_amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="">
                    </div>
                    <div class="form-group form-check">
                            @if($customerPayment[$temp]['isPaid']==0)
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                            <label class="form-check-label" for="check">Paid</label>
                            <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                            @else
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                            <label class="form-check-label" for="check">Paid</label>
                            @endif
                    </div>
                    @endif
                    
                   @elseif($temp>=$count)
                   @php echo $temp; @endphp
                    <div class="form-group">
                        <label for="pay_date">Date</label>
                        <input type="date" class="form-control" id="pay_date" name="pay_date" value="">
                    </div>
                    <div class="form-group">
                        <label for="pay_amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                        <label class="form-check-label" for="check">Paid</label>
                    </div>
                    @endif
                    <input type="hidden" id="custId" name="custId" value="{{$nic}}">
                    <input type="hidden" id="row" name="row" value="{{$i}}">
                    <input type="hidden" id="col" name="col" value="{{$j}}">
                    <button type="submit" class="btn btn-primary sub" id="sub" name="sub">Submit</button>
                </form>
            </td>
            @php $temp+=1;  @endphp
        @endfor
          </tr>

        @endfor
        </tbody>
      </table>

@elseif($selection=='daily')
<table class="table table-bordered">
        <tbody>
            @php  $temp=0; @endphp
            @for($i=0;$i<12;$i++)
                <tr>
            @for($j=0;$j<5;$j++)
            <td>  
                    <form method="POST" id="myForm" action="{{action('AdminController@weekly_save')}}">
                            {{ csrf_field() }}
                         @if($temp<$count)
                        @if($success=='Paid' && $customerPayment[$temp]['row_id']==$i && $customerPayment[$temp]['col_id']==$j)
                        @php echo $temp; @endphp
                        <div class="form-group">
                            <label for="pay_date">Date</label>
                            <input type="date" class="form-control" id="pay_date" name="pay_date" value='{{$customerPayment[$temp]['date_pay']}}'>
                        </div>
                        <div class="form-group">
                            <label for="pay_amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="{{$customerPayment[$temp]['amount']}}">
                        </div>
                        <div class="form-group form-check">
                            @if($customerPayment[$temp]['isPaid']==0)
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                            <label class="form-check-label" for="check">Paid</label>
                            <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                            @else
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                            <label class="form-check-label" for="check">Paid</label>
                            @endif
                        </div>
                        @if($customerPayment[$j]['isPaid']==1)
                        <span class="success" style="color:green" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">{{$success}}</span>
                        @else
                        <span class="success" style="color:red" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">Not Paid</span>
                        @endif
    
                        @elseif($success=='Error Inserting' &&  $customerPayment[$temp]['row_id']==$i && $customerPayment[$temp]['col_id']==$j)
                        <div class="form-group">
                            <label for="pay_date">Date</label>
                            <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{$customerPayment[$j]['date_pay']}}">
                        </div>
                        <div class="form-group">
                            <label for="pay_amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="{{$customerPayment[$j]['amount']}}">
                        </div>
                        <div class="form-group form-check">
                            @if($customerPayment[$temp]['isPaid']==0)
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                            <label class="form-check-label" for="check">Paid</label>
                            <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                            @else
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                            <label class="form-check-label" for="check">Paid</label>
                            @endif
                        </div>
                        <span class="success" style="color:green" id="{{$i}}.{{$j}}" name="{{$i}}.{{$j}}">{{$success}}</span>
    
                        @else
                        @php echo $temp; @endphp
                        <div class="form-group">
                            <label for="pay_date">Date</label>
                            <input type="date" class="form-control" id="pay_date" name="pay_date" value="">
                        </div>
                        <div class="form-group">
                            <label for="pay_amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="">
                        </div>
                        <div class="form-group form-check">
                            @if($customerPayment[$temp]['isPaid']==0)
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                            <label class="form-check-label" for="check">Paid</label>
                            <label class="form-check-label" for=""><b>| Interest:</b> <b style="color: red">{{$interest}}</b></label>
                            @else
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check" checked>
                            <label class="form-check-label" for="check">Paid</label>
                            @endif
                        </div>
                        @endif
                        
                       @elseif($temp>=$count)
                       @php echo $temp; @endphp
                        <div class="form-group">
                            <label for="pay_date">Date</label>
                            <input type="date" class="form-control" id="pay_date" name="pay_date" value="">
                        </div>
                        <div class="form-group">
                            <label for="pay_amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="pay_amount" name="pay_amount" value="">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="check" name="check" class="check">
                            <label class="form-check-label" for="check">Check me out</label>
                        </div>
                        @endif
                        <input type="hidden" id="custId" name="custId" value="{{$nic}}">
                        <input type="hidden" id="row" name="row" value="{{$i}}">
                        <input type="hidden" id="col" name="col" value="{{$j}}">
                        <button type="submit" class="btn btn-primary sub" id="sub" name="sub">Submit</button>
                    </form>
                </td>
                @php $temp+=1;  @endphp
            @endfor
                </tr>
            @endfor
        </tbody>
</table>
@endif
<script>

// document.getElementById('myForm').addEventListener('click', function (e) {
//     if (e.target.type === 'checkbox') {
//         alert('jnj')
//         $.post($("#myForm").attr('action'),$('#myForm :input').serializeArray(),function(info){
//             alert('ki')
//             $('.success').html(info);
//         });
//     }
// });


// $.ajaxSetup({
//     headers:{
//         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content');
//     }
// });

// $(document).ready(function(){

//     $('#myForm').submit(function(){
//         var pay_date=$('#pay_date').val();
//         var amount=$('#pay_amount').val();
//         var check=true;
//         var id=$('#custId').val();
//         $.post('register',{pay_date:pay_date,amount:amount,check:check,id:id},function(data){
//             console.log(data);
//         })

//     })

// });


</script> 

@endsection