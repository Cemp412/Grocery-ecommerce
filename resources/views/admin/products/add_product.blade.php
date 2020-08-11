@extends('admin.layouts.master')

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
            <h1>Add Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/add_product')}}">Add Products</li>
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
              <form class="form-group" action="{{url('/admin/add_product')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

              <div class="form-group">
                <label for="inputName">Under Category</label>
                <select class="form-control custom-select" name="category_id" id="category_id">
                 <?php echo $categories_dropdown; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" id="inputName" name="name" class="form-control">
              </div>

               <div class="form-group">
                <label for="inputCode">Product code</label>
                <input type="text" id="inputCode" name="code" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Product Description</label>
                <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
              </div>
              <!-- <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div> -->
             
              <div class="form-group">
                <label for="inputPrice">Product Price</label>
                <input type="text" id="inputPrice" name="price" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputOldPrice">Product Old Price</label>
                <input type="text" id="inputOldPrice" name="old_price" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputImage">Product Image</label>
                <input type="file" id="inputImage" name="image" class="form-control">
              </div>
            

            <div class="reset-button">
               <input type="submit" class="btn btn-success" value="Add Product" >
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