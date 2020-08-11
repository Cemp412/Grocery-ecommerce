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
            <h1>Edit Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admindashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/edit_product/'.$ProductDetails->id)}}">Edit Products</li>
            </ol>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>


     @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif


                @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" area-label="close">
                        <span area-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif

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
              <form class="form-group" action="{{url('/admin/edit-product/'.$ProductDetails->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}<div class="form-group">
                <label for="inputName">Under Category</label>
                <select class="form-control custom-select" name="category_id" id="category_id">
                 <?php echo $categories_dropdown; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" value="{{$ProductDetails->name}}"  name="name" class="form-control">
              </div>

               <div class="form-group">
                <label for="inputCode">Product code</label>
                <input type="text" value="{{$ProductDetails->code}}"  name="code" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Product Description</label>
                <textarea  name="description"  class="form-control" rows="4">{{$ProductDetails->description}}</textarea>
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
                <input type="text"  name="price" value="{{$ProductDetails->price}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputOldPrice">Product Old Price</label>
                <input type="text"  name="old_price" value="{{$ProductDetails->old_price}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputImage">Product Image</label>
                <input type="file"  name="image" class="form-control">
                <input type="hidden" name="current_image"  class="form-control" value="{{$ProductDetails->image}}">
                @if(!empty($ProductDetails->image))
                <img src="{{asset('uploads/products/image/'.$ProductDetails->image)}}" style="width: 100px; margin-top: 10px;">
                @endif
              </div>
            

            <div class="reset-button">
               <input type="submit" class="btn btn-success" value="Edit Product" >
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