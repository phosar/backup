@extends('layouts.admin')
@section('title')
Quality Health | Orders
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Orders
    <small>All customer orders</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Orders</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">All Orders</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Cart Items</th>
                <th>Address</th>
                <th>Name</th>
                <th>Total Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $or)
                  <tr>
                  <td>{{$or->order_id}}</td>
                  <td>
                    @foreach ($or->cart->items as $item)
                    <?php $name = DB::table('supplements')->where('supplement_id', $item['item']['supplement_id'])->value('supplement_name'); ?>
                        <p>{{ $name }}</p>
                    @endforeach
                  </td>
                  <td>{{$or->address}}</td>
                  <td>{{$or->name}}</td>
                  <td>R{{$or->totalPrice}}.00</td>
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
</section>
<!-- /.content -->
@endsection