@extends('admin.layouts.master')
@section('title', 'View Products')
@section('content')
  <!-- Content Wrapper. Contains page content -->
 

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/view_products')}}">Products Details</a> </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!--  Submission Message code -->
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
                <!-- Submission message  ends -->

                <!-- Update Status message  using ajax -->
                <div id="message_success" style="display: none;" class="alert alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="{{url('/admin/add_product')}}">Add Product</a></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <!-- <div class="card-body p-0"> -->
          <!-- <table class="table table-striped projects"> -->

            <div class="table-responsive">
                 <table id="table_id" class="table table-bordered table-striped table-hover">

                 <thead>
                  <tr>
                      
                      <th>
                        Id
                      </th>
                      <th>
                         Product Name
                      </th>
                      <th>
                        Category Id
                      </th>
                      <th>
                      	Product Image
                      </th>
                      <th>
                          Product Code
                      </th>
                      <th style="width:25%;" class="text-center">
                          Product Description
                      </th>
                      <th class="text-center">
                          Status
                      </th>
                      <th class="text-center">
                      	Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                   @foreach($product as $pro)
                  <tr class="text-center">
                  	
                      <td class="text-center">
                          {{$pro->id}}
                      </td>
                      <td class="text-center">
                          <a>
                              {{$pro->name}}
                          </a>
                          <br/>
                         <!--  <small>
                           Created 01.01.2019
                          </small> -->
                      </td>
                      <td>
                        {{$pro->category_id}}
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                              	@if(!empty($pro->image))
                                  <img alt="Avatar" class="table-avatar" src="{{asset('uploads/products/image/'.$pro->image)}}" style="width: 100px;">
                              </li>
                              @endif
                             
                          </ul>
                      </td>

                       <td class="text-center">
                      	{{$pro->code}}
                      </td>


                       <td class="text-center text-align-justify" >
                      	{{$pro->description}}
                      </td>
                      <!-- <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              </div>
                          </div>
                          <small>
                              57% Complete
                          </small>
                      </td> -->
                      <td class="project-state">
                         


                         <input type="checkbox" data-toggle ="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" id="ProductStatus" data-id="{{$pro->id}}" {{$pro->status == 1 ? 'checked':'' }} >
                      </td>



                     
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{url('/admin/add_attributes/'.$pro->id)}}">
                              <i class="fas fa-list">
                              </i>
                              Attributes
                          </a>
                          <a class="btn btn-info btn-sm" href="{{url('/admin/edit-product/'.$pro->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('/admin/delete-product/'.$pro->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>

                  </tr>
                   @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </section>
</div>

@endsection