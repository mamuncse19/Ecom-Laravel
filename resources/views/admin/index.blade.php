<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <!-- vendor css -->
    <link href="{{asset('admin_css_js/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('admin_css_js/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('admin_css_js/css/starlight.css')}}">
    <style>
      html{
        height: 100%;
      }
      body{
        position: relative;
        min-height: 100%;
      }
    </style>
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{url('admin')}}">Admin Panel</a></div>
    <div class="sl-sideleft">
    
      <div class="sl-sideleft-menu">
        <a href="{{url('admin')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('orders')}}" class="nav-link">Orders</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('categories')}}" class="nav-link">Add Category</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('brands')}}" class="nav-link">Add Brand</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-product-hunt tx-20"></i>
            <span class="menu-item-label">Manage Product</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('products')}}" class="nav-link">Add product</a></li>
          
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Division</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('divisions')}}" class="nav-link">Add Division</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage District</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('districts')}}" class="nav-link">Add District</a></li>
        </ul> 
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Manage Slider</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('sliders')}}" class="nav-link">Add Slider</a></li>
        </ul>
        <a href="{{url('/')}}" target="_blank" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="fa fa-link"></i>
            <span class="menu-item-label">Main Site</span>
          </div><!-- menu-item -->
        </a>
        
        <!-- menu-item -->
        
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><span class="hidden-md-down">{{Auth::guard('admin')->user()->name}}</span></span>
              <img src="{{asset('admin_css_js/img/image1.jpg')}}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                 <form method="post" action="{{route('admin.logout')}}">
                 @csrf
                <li><i class="icon ion-power ml-2"></i><input type="submit" value="Sign Out" style="cursor:pointer; background-color: #2F3844; border: none; color: white;"></li>
              </form>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (1)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (1)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Notification</a>
          </div>
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      @yield('head-nav')

      <div class="sl-pagebody">

        @yield('MainContent')

      </div><!-- sl-pagebody -->
  </div>

      <!--Footer Area-->
      <footer class="sl-footer" style="background-color: #2B333E; padding-bottom: 20px; padding-top: 20px; position: absolute; bottom: 0; left: 0; right: 0;">
        <div class="container" style="text-align: center;">
          <div class="mg-b-2" style="display: inline-block;">&copy; {{date('Y')}} Mamun Hossain. All Rights Reserved</div>
        </div>
        
      </footer>
    
    <!-- ########## END: MAIN PANEL ########## -->


    <script src="{{asset('admin_css_js/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/d3/d3.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('admin_css_js/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('admin_css_js/js/starlight.js')}}"></script>
        <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
    <script src="{{asset('admin_css_js/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('admin_css_js/js/dashboard.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>
    <script>
     @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
         case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif

    $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr('href');
      const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    window.location.href=link;
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
    });
  
</script>
   
  </body>
</html>
