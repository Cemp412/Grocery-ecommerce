@extends('admin.layouts.master')
@section('title', 'Products Attributes')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <div class="nav-icon">
                  <i class="fa fa-users"></i>
             </div>
            <h1>Add Products Attributes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/add_product')}}">Add Products Attributes</li>
            </ol>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <div class="btn-group" id="buttonlist"> 
                 <a class="btn btn-add " href="{{url('/admin/view_products')}}"> 
                   <i class="fa fa-list"></i> View Products
                 </a>  
              </div>
              <div class="card-tools">

                
             
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                   <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="close">
                 <i class="fas fa-times"></i></button>
              </div>
              
            </div>
            <div class="card-body">
              <form class="form-group" action="{{url('/admin/add_attributes/'.$ProductDetails->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

              
              <div class="form-group">
                <label for="inputName">Product Name</label>{{$ProductDetails->name}}
                
              </div>

               <div class="form-group">
                <label for="inputCode">Product code</label>{{$ProductDetails->code}}
                
              </div>

              <div class="form-group">
                <label for="inputDescription">Product Description</label>
                {{$ProductDetails->description}}
              </div>

               <div class="form-group">
                 <div class="field_wrapper">
                   <div style="display: flex;">
                     <input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 120px; margin-right:5px; margin-top: 5px;" />
                      <input type="text" name="price[]" id="price" placeholder="PRICE" class="form-control" style="width: 120px; margin-right:5px;margin-top: 5px;" />
                       <input type="text" name="stock[]" id="stock" placeholder="STOCK" class="form-control" style="width: 120px; margin-right:5px;margin-top: 5px;" />
                       <a href="javascript:void(0);" class="add_button" title="Add field">ADD</a>
                     
                 </div>
               </div>
               <br>
              
                
             <div class="reset-button">
                <input type="submit" class="btn btn-success" value="Add Attributes" >
            </div>
            </div>
            <!-- /.card-body -->
            </form>
          </div>
          <!-- /.card -->
        </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection