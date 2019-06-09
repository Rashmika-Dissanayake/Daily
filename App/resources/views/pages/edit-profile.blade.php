@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="color:red">Reset Password</h5>
            <form method="POST" action="{{action('UserController@reset_password')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                  </div>
                <div class="form-group">
                  <label for="oldPassword"><b>Old Password</b></label>
                  <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="password"><b>Password</b></label>
                  <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-4"></div>
</div>


@endsection