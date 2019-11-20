@extends('layouts.admin')
@section('title')
Quality Health | Products
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Supplement
    <small>Supplement control</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Supplement</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Supplement</h3>
        </div>
        <!-- /.box-header -->
        @include('includes.message')
        <!-- form start -->
        <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('addProduct')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="supName">Supplement Name</label>
              <input type="text" class="form-control" id="supName" name="supName" placeholder="Supplement Name">
            </div>
            <div class="form-group">
              <label for="supPrice">Supplement Price</label>
              <div class="input-group">
                <span class="input-group-addon">R</span>
                <input type="text" class="form-control" name="supPrice">
                <span class="input-group-addon">.00</span>
              </div>
            </div>
            <div class="form-group">
              <label for="supDesc">Supplement Description</label>
              <!--<textarea class="form-control" name="supplement-desc" id="supplement-desc" cols="30" rows="10" placeholder="Description.."></textarea>-->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Supplement features
                    <small>Describe the supplement</small>
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                      title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <textarea id="editor1" name="supDesc" rows="10" cols="80" placeholder="Describe.."></textarea>
                </div>
              </div>
              <!-- /.box -->
            </div>
            <div class="form-group">
              <label for="supPic">Supplement Picture</label>
              <input type="file" id="supPic" name="supPic" class="form-control-file">
              <p class="help-block">Allowed files png, jpg and jpeg.</p>
            </div>
            <div class="form-group">
              <label for="supCategory">Supplement Category</label>
              <select name="supCategory" id="supCategory" class="form-control">
                <?php $categories = App\SupplementCategory::all();  ?>
                @foreach ($categories as $cat)
                <option value="{{ $cat->supplement_category_id}}">{{ $cat->supplement_category_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="supSupplier">Supplement Supplier</label>
              <select name="supSupplier" id="supSupplier" class="form-control">
                <?php $categories = App\SupplementSupplier::all();  ?>
                @foreach ($categories as $cat)
                <option value="{{ $cat->supplier_id}}">{{ $cat->supplier_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Supplement</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add Supplement Category</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form">
          <div class="box-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Supplement Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Supplement Category Name">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!--<button type="submit" class="btn btn-default">Cancel</button>-->
            <button type="submit" class="btn btn-info pull-right">Add Supplement Category</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Add Supplement Supplier</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <div class="box-body">

              <div class="form-group">
                <label for="exampleInputEmail1">Supplement Supplier Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Supplement Supplier Name">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Supplement Supplier Phone</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Supplement Supplier Phone">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Supplement Supplier Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Supplement Supplier Email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Supplement Supplier Address</label>
                <textarea name="supAddr" id="supAddr" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!--<button type="submit" class="btn btn-default">Cancel</button>-->
              <button type="submit" class="btn btn-info pull-right">Add Supplement Supplier</button>
            </div>

          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row (main row) -->

  <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Supplements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($sups as $sup)
                  <tr>
                      <td>{{$sup->supplement_name}}</td>
                      <td>{{$sup->supplement_price}}</td>
                      <td>{!!$sup->supplement_description!!}</td>
                      <td><img src="/src/images/{{$sup->supplement_pic}}" class="img-responsive" width="30" height="30"></td>
                      <td><button class="btn btn-primary">Update</button></td>
                      <td><a href="{{ route('deleteProduct', ['id' => $sup->supplement_id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                  
                 
                </tbody>
                <!--<tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
</section>
<!-- /.content -->
@endsection