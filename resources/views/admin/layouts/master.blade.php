<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  

 <title>@yield('title')-online Grocery Store</title>
 <!-- Bootstrap toggle button for status -->
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <!-- jquery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('asset/admin_assets/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="{{asset('asset/admin_assets/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('asset/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/admin_assets/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
<div class="wrapper">
  @include('admin.layouts.header')
  @include('admin.layouts.sidebar')
  @yield('content')
  @include('admin.layouts.footer')

  </div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('asset/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('asset/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('asset/admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/admin_assets/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('asset/admin_assets/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('asset/admin_assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('asset/admin_assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('asset/admin_assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('asset/admin_assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('asset/admin_assets/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('asset/admin_assets/js/pages/dashboard2.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{asset('asset/admin_assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- Status toggle -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Data tables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  //update category status
             $(".CategoryStatus").change(function(){
              var id = $(this).attr('rel');
              if ($(this).prop("checked")==true) {
                $.ajax({
                  headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type : 'get',
                  url : '/admin/update-category-status',
                  data : {status:'1',id:id},
                  success : function(data){
                    $("#message_success").show();
                    setTimeout(function(){$("#message_success").fadeOut('slow');}, 2000);
                  },error:function(){
                    alert("error");
                  }
                });

              }else{
                $.ajax({
                  headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type : 'get',
                  url : '/admin/update-category-status',
                  data : {status:'0',id:id},
                  success : function(resp){
                    $("#message_error").show();
                    setTimeout(function(){$("#message_error").fadeOut('slow');}, 2000);
                  },error:function(){
                    alert("error");
                  }
                });
              }
            });
} );




$('body').on('change', '#ProductStatus', function(){
  var id = $(this).attr('data-id');
  if(this.checked){
    var status = 1;
  }else{
    var status = 0;
  }
 $.ajax({
  url : '/admin/update-product-status/'+id+'/'+status,
  method : 'get',
  success : function(result){
    console.log(result);
    alert('status updated sucessfully..!!');
  }
 })
});


// Add or Remove Fields dynamically
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="display:flex;"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 120px; margin-right:5px;margin-top: 5px;" /> <input type="text" name="price[]" id="price" placeholder="PRICE" class="form-control" style="width: 120px; margin-right:5px;margin-top: 5px;" /><input type="text" name="stock" id="stock" placeholder="STOCK" class="form-control" style="width: 120px; margin-right:5px;margin-top: 5px;" /><a href="javascript:void(0);" class="remove_button">REMOVE</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

</script>
@include('sweetalert::alert')


</body>
</html>
