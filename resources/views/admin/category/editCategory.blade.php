@extends('admin.layouts.master')
@section('title', 'Edit Category')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


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
  
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <div class="nav-icon">
                  <i class="fa fa-pencil"></i>
             </div>
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/edit-category/'.$CategoryDetails->id)}}">Edit Category</li>
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
                 <a class="btn btn-add " href="{{url('/admin/view_Categories')}}"> 
                   <i class="fa fa-eye"></i> View Categories
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
              <form class="form-group" action="{{url('/admin/edit-category/'.$CategoryDetails->id)}}" method="post">
                {{csrf_field()}}
              <div class="form-group">
                <label for="inputName">Category Name</label>
                <input type="text" id="inputName" name="name" value="{{$CategoryDetails->name}}" required class="form-control">
              </div>

               <div class="form-group">
                <label for="inputParent_id">Parent Category </label>
                <select class="form-control custom-select" name="parent_id"  id="parent_id">
                  <option selected disabled>Select one</option>
                  <option value="0">Parent_id</option>
                  @foreach($levels as $val)
                  <option value="{{$val->id}}" @if($val->id==$CategoryDetails->parent_id) selected @endif>{{$val->name}}</option>
                  @endforeach
                </select>
              </div>

               <div class="form-group">
                <label for="inputCode">Category url</label>
                <input type="text" id="inputCode" name="url" value="{{$CategoryDetails->url}}" required class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Category Description</label>
                <textarea id="inputDescription" name="description" required class="form-control" rows="4">{{$CategoryDetails->description}}</textarea>
              </div>

              
             
             
            <div class="reset-button">
               <input type="submit" class="btn btn-success" value="Edit Category" >
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