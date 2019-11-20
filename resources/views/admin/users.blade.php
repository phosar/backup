@extends('layouts.admin')
@section('title')
Quality Health | Users
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Users
      <small>All users</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Users</li>
    </ol>
  </section>
<!-- Main content -->
<section class="content">
    
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Users at Quality Health</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone (Home)</th>
                        <th>Telephone (Work)</th>
                        <th>Address</th>
                        <th>Gender</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                          <td>{{$user->user_id}}</td>
                          <td>{{$user->user_name}}</td>
                          <td>{{$user->user_email}}</td>
                          <td>{{$user->user_tel_h}}</td>
                          <td>{{$user->user_tel_w}}</td>
                          <td>{{$user->user_addr}}</td>
                          <td>{{$user->user_gender}}</td>
                        </tr>
                      @endforeach
                      

                      </tbody>
                    
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row (main row) -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
@endsection
