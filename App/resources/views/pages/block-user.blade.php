@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><b style="color:red">Add Block User</b></h5>
        <form method="POST" action="{{action('AdminController@add_block_user')}}">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="name"><b>Name</b></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="nic"><b>NIC</b></label>
                <input type="text" class="form-control" id="nic" name="nic" placeholder="NIC">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
    </div>
    <div class="col-md-6">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b style="color:red">Block Users</b></h5>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">NIC</th>
                        <th scope="col">Name</th>
                    </thead>
                    <tbody>
                      @foreach($block_users as $block_users)
                        <tr>
                        <th scope="row">{{$block_users->id}}</th>
                        <td>{{$block_users->name}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection