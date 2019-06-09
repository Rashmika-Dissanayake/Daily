@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 ">
        <h2 style="color:rebeccapurple;margin-left:130px"><b>Enter Details</b></h2>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row" style="margin-top:15px">
    <div class="col-md-2"></div>
    <div class="col-md-8">
<form method="POST" action="{{ action('AdminController@insert') }}">
        {{ csrf_field() }}
    <div style="border:5px solid #333;background-color:#A9A9A9;border-radius:2px;margin-left:3px">
        <div style="margin-left:4px;margin-right:2px!important">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName"><b style="color:black">Name</b></label>
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputNic"><b style="color:black">NIC</b></label>
        <input type="text" class="form-control" id="inputNic" name="inputNic" placeholder="NIC">
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress"><b style="color:black">Address</b></label>
      <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-row" style="border-bottom:black!important">
      <div class="form-group col-md-6">
        <label for="inputContact1"><b style="color:black">Line 1:</b></label>
        <input type="number" class="form-control" id="inputContact1" name="inputContact1" placeholder="0723212123">
      </div>
      <div class="form-group col-md-6">
        <label for="inputContact2"><b style="color:black">Line 2:</b></label>
        <input type="number" class="form-control" id="inputContact2" name="inputContact2" placeholder="0753452321">
     </div>
    </div>
    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important">
        <h5 style="color:darkslategrey"><b style="color:red">Guarantor 1 Details</b></h5>
         @if($message!="")
        <label for="error-message" style="color:red">{{$message}}</label>
        @endif
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="guarantor1Name"><b style="color:black">Name</b></label>
            <input type="text" class="form-control" id="guarantor1Name" name="guarantor1Name" placeholder="Guarantor1 Name">
        </div>
        <div class="form-group col-md-6">
            <label for="guarantor1Nic"><b style="color:black">NIC</b></label>
            <input type="text" class="form-control" id="guarantor1Nic" name="guarantor1Nic" placeholder="Guarantor1 NIC">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="guarantor1Contact1"><b style="color:black">Line 1:</b></label>
            <input type="number" class="form-control" id="guarantor1Contact1" name="guarantor1Contact1" placeholder="0712342321">
        </div>
        <div class="form-group col-md-6">
            <label for="guarantor1Contact2"><b style="color:black">Line 2:</b></label>
            <input type="number" class="form-control" id="guarantor1Contact2" name="guarantor1Contact2" placeholder="0712321212">
        </div>
    </div>
    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important">
        <h5 style="color:darkslategrey"><b style="color:red">Guarantor 2 Details</b></h5>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="guarantor2Name"><b style="color:black">Name</b></label>
            <input type="text" class="form-control" id="guarantor2Name" name="guarantor2Name" placeholder="Guarantor2 Name">
        </div>
        <div class="form-group col-md-6">
            <label for="guarantor2Nic"><b style="color:black">NIC</b></label>
            <input type="text" class="form-control" id="guarantor2Nic" name="guarantor2Nic" placeholder="Guarantor2 NIC">
            @if($message!="")
            <label for="error-message" style="color:red">{{$message}}</label>
            @endif
            </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="guarantor2Contact1"><b style="color:black">Line 1:</b></label>
            <input type="number" class="form-control" id="guarantor2Contact1" name="guarantor2Contact1" placeholder="0712342321">
        </div>
        <div class="form-group col-md-6">
            <label for="guarantor2Contact2"><b style="color:black">Line 2:</b></label>
            <input type="number" class="form-control" id="guarantor2Contact2" name="guarantor2Contact2" placeholder="0712321212">
        </div>
    </div>
    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important"> </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="amount-rupees"><b style="color:black">Amount</b></label>
            <div class="row">
            <div class="col-md-8">
                <input type="number" class="form-control" step="0.01" id="amount" name="amount" placeholder="$10000">
            </div>
            <div class="col-md-4" style="width:200px"></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="selection"><b style="color:black">Select</b></label>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-check">
                <input class="form-check-input" type="radio" id="radio" name="radio" value="option1" checked >
                <label class="form-check-label" for="radio"><b style="color:black">Weekly</b></label>
                    </div>
                </div>
                    <div class="form-check">
                <div class="col-md-6">
                <input class="form-check-input" type="radio" id="radio" name="radio" value="option2" >
                <label class="form-check-label" for="radio"><b style="color:black">Daily</b></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="installment"><b style="color:black">Installment</b></label>
            <div class="row">
                <div class="col-md-8">
                    <input type="number" class="form-control" step="0.01" id="installment" name="installment" placeholder="$10000">
                </div>
                <div class="col-md-4" style="width:200px"></div>
                </div>
        </div>
        <div class="form-group col-md-6">
            <label for="date_purchased"><b style="color:black">Date Purchased</b></label>
            <input type="date" class="form-control" id="date_purchased" name="date_purchased" placeholder="2019-10-10">
        </div>
    </div>
    {{-- <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" name="gridCheck">
        <label class="form-check-label" for="gridCheck"><b style="color:black">Check me out</b></label>
      </div>
    </div> --}}
    <div class="form-row">
    <button type="submit" class="btn btn-primary" name="submit-btn" style="margin-left:250px;width:100px;height:40px;font-size:20px;margin-bottom:10px"><b>Submit</b></button>
    </div>
        </div>
    </div>
  </form>
    </div>
    <div class="col-md-2"></div>
</div>

{{-- script for radio button--}}
<script>
$('#weekly').click(function(){
    $('#daily').prop('checked',false);
});

$('#daily').click(function(){
    $('#weekly').prop('checked',false);
})
</script>

{{-- styles --}}
<style>

.border-top{
    border-color:black!important;
}

</style>

@endsection