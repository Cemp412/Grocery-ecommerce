@extends('admin.layouts.master')
@section('title', 'Edit Banner' )
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
            <h1>Edit Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/add_banner')}}">Edit Banner</li>
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
              <form class="form-group" action="{{url('/admin/edit_banner/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

             
              <div class="form-group">
                <label for="inputName"> Name</label>
                <input type="text" id="inputName" name="banner_name" value="{{$edit->name}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputspancontent"> Span Content</label>
                <input type="text" id="inputName" name="span_content" value="{{$edit->span_content}}" class="form-control">
              </div>

               <div class="form-group">
                <label for="inputCode">Text Style</label>
                <input type="text" id="inputCode" name="text_style" value="{{$edit->text_style}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Content</label>
                <textarea id="inputDescription" name="content" class="form-control" rows="4">{{$edit->content}}</textarea>
              </div>
              
             
              <div class="form-group">
                <label for="inputPrice">Link</label>
                <input type="text" id="inputPrice" name="link" value="{{$edit->link}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputOldPrice">Sort Order</label>
                <input type="text" id="inputOldPrice" name="sort_order" value="{{$edit->sort_order}}" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputImage">Image</label>
                <input type="file" id="inputImage" name="image" class="form-control">
                <input type="hidden" name="current_image"  class="form-control" value="{{$edit_banner->image}}">
                @if(!empty($edit->image))
                <img src="{{asset('uploads/banners/'.$edit->image)}}" style="width: 100px; margin-top: 10px;">
                @endif
              </div>
            

            <div class="reset-button">
               <input type="submit" class="btn btn-success" value="Edit Banner" >
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