@extends('layouts.app')

@section('content')
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">NIC</th>
                <th scope="col">Date Purchased</th>
                <th scope="col">Installment</th>
                <th scope="col">Selection</th>
                <th scope="col">Amount</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="tbody">
              @foreach ($customers as $c_data)  
              <tr>
                <th scope="row">{{$c_data->name}}</th>
                <td>{{$c_data->address}}</td>
                <td>{{$c_data->nic}}</td>
                <td>{{$c_data->date_purchased}}</td>
                <td>{{$c_data->installment}}</td>
                <td>{{$c_data->selection}}</td>
                <td>{{$c_data->amount}}</td>
                <td> <a href="#" id="view_msg" class="view" name="view_msg" title="view guarantors" data-toggle="modal" data-target="#exampleModalCenter" data-guarantor1_name="{{$c_data->guarantor1_name}}" data-guarantor1_nic="{{$c_data->guarantor1_nic}}" data-guarantor1_contact1="{{$c_data->guarantor1_contact1}}" data-guarantor1_contact2="{{$c_data->guarantor1_contact2}}" 
                  data-guarantor2_name="{{$c_data->guarantor2_name}}" data-guarantor2_nic="{{$c_data->guarantor2_nic}}" data-guarantor2_contact1="{{$c_data->guarantor2_contact1}}" data-guarantor2_contact2="{{$c_data->guarantor2_contact2}}"> <i class="material-icons">list</i> </a> </td>
                
                <td> <a href="#" id="edit_msg" class="edit" title="edit" data-toggle="modal" data-target="#exampleModalCenter1" data-guarantor1_name="{{$c_data->guarantor1_name}}" data-guarantor1_nic="{{$c_data->guarantor1_nic}}" data-guarantor1_contact1="{{$c_data->guarantor1_contact1}}" data-guarantor1_contact2="{{$c_data->guarantor1_contact2}}" 
                data-guarantor2_name="{{$c_data->guarantor2_name}}" data-guarantor2_nic="{{$c_data->guarantor2_nic}}" data-guarantor2_contact1="{{$c_data->guarantor2_contact1}}" data-guarantor2_contact2="{{$c_data->guarantor2_contact2}}" data-name="{{$c_data->name}}" data-nic="{{$c_data->nic}}"
                  data-address="{{$c_data->address}}" data-contact1="{{$c_data->contact1}}" data-contact2="{{$c_data->contact2}}" data-amount="{{$c_data->amount}}" data-installment="{{$c_data->installment}}" data-selection="{{$c_data->selection}}" data-date="{{$c_data->date_purchased}}"> <i class="material-icons">create</i> </a> </td>
                
                <td> <a href="#" id="delete_msg" class="delete" name="delete_msg" title="delete" data-toggle="modal" data-target="#exampleModalCenter2" data-id="{{$c_data->nic}}"> <i class="material-icons">delete</i> </a> </td>
              </tr> 
              @endforeach 
            </tbody>
        </table>
      
  {{-- end of card --}}

      <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style="background-color:gray!important">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle"><b  style="color:black!important">VIEW DETAILS</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h4>Guarantor1 Details</h4>    
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="guarantor1Name"><b style="color:black">Name</b></label>
                                <input type="text" class="form-control" id="guarantor1Name" placeholder="Guarantor1 Name" value="abcd" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guarantor1Nic"><b style="color:black">NIC</b></label>
                                <input type="text" class="form-control" id="guarantor1Nic" placeholder="Guarantor1 NIC" value="971212321v" disabled>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="guarantor1Contact1"><b style="color:black">Line 1:</b></label>
                                <input type="number" class="form-control" id="guarantor1Contact1" placeholder="0094712342321" value="0094712342321" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guarantor1Contact2"><b style="color:black">Line 2:</b></label>
                                <input type="number" class="form-control" id="guarantor1Contact2" placeholder="0094712321212" value="0094712342123" disabled>
                            </div>
                        </div>
                    </form>  
                           <h4>Guarantor2 Details</h4>    
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="guarantor2Name"><b style="color:black">Name</b></label>
                                <input type="text" class="form-control" id="guarantor2Name" placeholder="Guarantor2 Name" value="abcde" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guarantor2Nic"><b style="color:black">NIC</b></label>
                                <input type="text" class="form-control" id="guarantor2Nic" placeholder="Guarantor2 NIC" value="973321234v" disabled>
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="guarantor2Contact1"><b style="color:black">Line 1:</b></label>
                                <input type="number" class="form-control" id="guarantor2Contact1" placeholder="0094712342321" value="0094712343212" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guarantor2Contact2"><b style="color:black">Line 2:</b></label>
                                <input type="number" class="form-control" id="guarantor2Contact2" placeholder="0094712321212" value="0094712343212" disabled>
                            </div>
                        </div>
                    </form>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          {{-- modal 2 --}}

          <div class="modal" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style="background-color:gray!important">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle"><b  style="color:black!important">EDIT DETAILS</b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" #form action="{{ action('AdminController@update_data') }}">
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
                                        <input type="number" class="form-control" id="inputContact1" name="inputContact1" placeholder="0094723212123">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputContact2"><b style="color:black">Line 2:</b></label>
                                        <input type="number" class="form-control" id="inputContact2" name="inputContact2" placeholder="0094753452321">
                                     </div>
                                    </div>
                                    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important">
                                        <h5 style="color:darkslategrey"><b style="color:red">Guarantor 1 Details</b></h5>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor1Name"><b style="color:black">Name</b></label>
                                            <input type="text" class="form-control" id="form_guarantor1Name" name="form_guarantor1Name" placeholder="Guarantor1 Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor1Nic"><b style="color:black">NIC</b></label>
                                            <input type="text" class="form-control" id="form_guarantor1Nic" name="form_guarantor1Nic" placeholder="Guarantor1 NIC">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor1Contact1"><b style="color:black">Line 1:</b></label>
                                            <input type="number" class="form-control" id="form_guarantor1Contact1" name="form_guarantor1Contact1" placeholder="0094712342321">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor1Contact2"><b style="color:black">Line 2:</b></label>
                                            <input type="number" class="form-control" id="form_guarantor1Contact2" name="form_guarantor1Contact2" placeholder="0094712321212">
                                        </div>
                                    </div>
                                    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important">
                                        <h5 style="color:darkslategrey"><b style="color:red">Guarantor 2 Details</b></h5>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor2Name"><b style="color:black">Name</b></label>
                                            <input type="text" class="form-control" id="form_guarantor2Name" name="form_guarantor2Name" placeholder="Guarantor2 Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor2Nic"><b style="color:black">NIC</b></label>
                                            <input type="text" class="form-control" id="form_guarantor2Nic" name="form_guarantor2Nic" placeholder="Guarantor2 NIC">
                                            </div>
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor2Contact1"><b style="color:black">Line 1:</b></label>
                                            <input type="number" class="form-control" id="form_guarantor2Contact1" name="form_guarantor2Contact1" placeholder="0094712342321">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form_guarantor2Contact2"><b style="color:black">Line 2:</b></label>
                                            <input type="number" class="form-control" id="form_guarantor2Contact2" name="form_guarantor2Contact2" placeholder="0094712321212">
                                        </div>
                                    </div>
                                    <div class="form-row border-top" id="border-tops" style="margin-left:4px!important"> </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="amount"><b style="color:black">Amount</b></label>
                                            <div class="row">
                                            <div class="col-md-8">
                                            <input type="number" class="form-control" step="0.01" id="amount" name="amount" placeholder="$1000">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="selection"><b style="color:black">Select</b></label>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                <input class="form-check-input" type="radio" id="weekly" name="radio" value="weekly" checked >
                                                <label class="form-check-label" for="weekly"><b style="color:black">Weekly</b></label>
                                                    </div>
                                                </div>
                                                    <div class="form-check">
                                                <div class="col-md-6">
                                                <input class="form-check-input" type="radio" id="daily" name="radio" value="daily" >
                                                <label class="form-check-label" for="daily"><b style="color:black">Daily</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="installment"><b style="color:black">Installment</b></label>
                                            <input type="number" class="form-control" id="installment" name="installment" step="0.01" placeholder="$10000">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date_purchased"><b style="color:black">Date Purchased</b></label>
                                            <input type="date" class="form-control" id="date_purchased" name="date_purchased" placeholder="2019-10-10">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                     <div class="modal-footer">
                                      <button type="submit" class="btn btn-danger" onclick="form.submit()">Save</button>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>
                  </div>
                </div>
              </div>

              {{-- modal 3 --}}

              <div class="modal" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content" style="background-color:gray!important">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle"><b  style="color:black!important">CONFIRM DELETION</b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <h4>Are You Sure?</h4>    
                            <form method="POST" #form1 action="{{action('AdminController@delete')}}">
                                    {{ csrf_field() }}
                                <input type="hidden" name="deleteId" id="deleteId" value="">
                                <div class="form-row">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" onclick="form1.submit()">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>


    {{-- scripts --}}
    <script>
       
        $('.delete').click(function(e){
           e.preventDefault();
        //  $('#submitDel').click();
        //   $(this).closest('tr').remove();
          document.getElementById('deleteId').value=$(this).data('id');
        });

        $('.view').on('click',function(e){
            e.preventDefault();
        document.getElementById('guarantor1Name').value=$(this).data('guarantor1_name');
        document.getElementById('guarantor1Nic').value=$(this).data('guarantor1_nic');
        document.getElementById('guarantor1Contact1').value=$(this).data('guarantor1_contact1');
        document.getElementById('guarantor1Contact2').value=$(this).data('guarantor1_contact2');
        document.getElementById('guarantor2Name').value=$(this).data('guarantor2_name');
        document.getElementById('guarantor2Nic').value=$(this).data('guarantor2_nic');
        document.getElementById('guarantor2Contact1').value=$(this).data('guarantor2_contact1');
        document.getElementById('guarantor2Contact2').value=$(this).data('guarantor2_contact2');

        });

           //load data to the modal
        // $('#view_msg').click(function(e){
        // e.preventDefault();
        // document.getElementById('guarantor1Name').value=$(this).data('guarantor1_name');
        // document.getElementById('guarantor1Nic').value=$(this).data('guarantor1_nic');
        // document.getElementById('guarantor1Contact1').value=$(this).data('guarantor1_contact1');
        // document.getElementById('guarantor1Contact2').value=$(this).data('guarantor1_contact2');
        // document.getElementById('guarantor2Name').value=$(this).data('guarantor2_name');
        // document.getElementById('guarantor2Nic').value=$(this).data('guarantor2_nic');
        // document.getElementById('guarantor2Contact1').value=$(this).data('guarantor2_contact1');
        // document.getElementById('guarantor2Contact2').value=$(this).data('guarantor2_contact2');
      
        // });

        $('.edit').click(function(e){
        e.preventDefault();
        var guarantor1_name=document.getElementById('form_guarantor1Name').value=$(this).data('guarantor1_name');
        var guarantor1_nic=document.getElementById('form_guarantor1Nic').value=$(this).data('guarantor1_nic');
        var guarantor1_contact1=document.getElementById('form_guarantor1Contact1').value=$(this).data('guarantor1_contact1');
        var guarantor1_contact2=document.getElementById('form_guarantor1Contact2').value=$(this).data('guarantor1_contact2');
        var guarantor2_name=document.getElementById('form_guarantor2Name').value=$(this).data('guarantor2_name');
        var guarantor2_nic=document.getElementById('form_guarantor2Nic').value=$(this).data('guarantor2_nic');
        var guarantor2_contact1=document.getElementById('form_guarantor2Contact1').value=$(this).data('guarantor2_contact1');
        var guarantor2_contact2=document.getElementById('form_guarantor2Contact2').value=$(this).data('guarantor2_contact2');
        var name=document.getElementById('inputName').value=$(this).data('name');
        var name=document.getElementById('inputNic').value=$(this).data('nic');
        var address=document.getElementById('inputAddress').value=$(this).data('address');
        var contact1=document.getElementById('inputContact1').value=$(this).data('contact1');
        var contact2=document.getElementById('inputContact2').value=$(this).data('contact2');
        var amount=document.getElementById('amount').value=$(this).data('amount');
        var installment=document.getElementById('installment').value=$(this).data('installment');
        var date=document.getElementById('date_purchased').value=$(this).data('date');
        var selection=$(this).data('selection');
        if(selection=='weekly')
        $("#weekly").prop("checked", true);

        else if(selection=='daily')
        $("#daily").prop("checked", true);
        
        });




    </script>

@endsection