@extends('admin.layouts.master')
@section('title', 'Add Banner' )
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
            <h1>Add Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/add_banner')}}">Add Banner</li>
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
                 <a class="btn btn-add " href="{{url('/admin/banners')}}"> 
                   <i class="fa fa-list"></i> View Banners
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
              <form class="form-group" action="{{url('/admin/add_banners')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

             
              <div class="form-group">
                <label for="inputName"> Name</label>
                <input type="text" id="inputName" name="banner_name" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputspancontent"> Span Content</label>
                <input type="text" id="inputName" name="span_content" class="form-control">
              </div>

               <div class="form-group">
                <label for="inputtextstyle">Text Style</label>
                <input type="text" id="inputtextstyle" name="text_style" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputcontent">Content</label>
                <textarea id="inputcontent" name="content" class="form-control" rows="4"></textarea>
              </div>
              
             
              <div class="form-group">
                <label for="inputLink">Link</label>
                <input type="text" id="inputLink" name="link" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputsortorder">Sort Order</label>
                <input type="text" id="inputsortorder" name="sort_order" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" id="inputImage" name="image" class="form-control">
              </div>
            

            <div class="reset-button">
               <input type="submit" class="btn btn-success" value="Add Banner" >
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