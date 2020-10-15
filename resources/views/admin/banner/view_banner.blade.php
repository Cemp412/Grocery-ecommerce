@extends('admin.layouts.master')
@section('title', 'View Banners')
@section('content')
  <!-- Content Wrapper. Contains page content -->
 

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <i class="fa fa-eye"></i>
            <h1>View Banners</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin_dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin/add_banners')}}"> Add Banner</a> </li>
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
          <h3 class="card-title">
            <i class="fa fa-plus"></i>
            <a href="{{url('/admin/add_banners')}}">Add Banner</a></h3>
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
                         Name
                      </th>
                      
                        
                      </th>
                      <th>
                        Sort order
                      </th>
                      <th>
                        Content
                      </th>
                       
                     
                      <th>
                        Image
                      </th>
                      <th class="text-center">
                      	Action
                      </th>
                  </tr>
              </thead>
               @foreach($banner as $ban)
              <tbody>
                   
                  <tr class="text-center">
                  	
                      <td class="text-center">
                          {{$ban->id}}
                      </td>
                      <td class="text-center">
                          <a>
                           {{$ban->name}}
                          </a>
                          <br/>
                         <!--  <small>
                           Created 01.01.2019
                          </small> -->
                      </td>
                      <td class="text-center">
                        {{$ban->sort_order}}
                      </td>
                      <td>
                        {{$ban->content}}
                      </td>   
                    
                       <td class="text-center text-align-justify" >
                        @if(!empty($ban->image))
                                  <img alt="Avatar" class="table-avatar" src="{{asset('uploads/banners/'.$ban->image)}}" style="width: 300px; height: 200px">
                            
                              @endif
                             
                      </td>
                     


                     
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{url('/admin/banners/'.$ban->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{url('/admin/edit-banner/'.$ban->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('/delete/'.$ban->id)}}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>

                  </tr>
                 
                  </tbody>
                  @endforeach
              </table>
          </div>
      </div>
  </section>
</div>

@endsection