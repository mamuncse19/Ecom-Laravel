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
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{-- {{route('admin.dashboard')}} --}}">Admin Panel</a></div>
    <div class="sl-sideleft">
    
      <div class="sl-sideleft-menu">
        <a href="{{-- {{route('admin.dashboard')}} --}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('categories')}}" class="nav-link">Add Category</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('brands')}}" class="nav-link">Add Brand</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-product-hunt tx-20"></i>
            <span class="menu-item-label">Product</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('products')}}" class="nav-link">Add product</a></li>
          
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Forms</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
          <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
          <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
          <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
          <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">UI Elements</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
          <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
          <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
          <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
          <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
          <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
          <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
          <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
          <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
          <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
          <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
          <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Tables</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
          <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
            <span class="menu-item-label">Maps</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
          <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
        </ul>
        <a href="mailbox.html" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Mailbox</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Pages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
          <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
          <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
          <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
        </ul>
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
              <span class="logged-name"><span class="hidden-md-down">{{-- {{Auth::guard('admin')->user()->name}} --}}</span></span>
              <img src="{{-- {{asset('admin_css_js/img/image1.jpg')}} --}}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href="{{-- {{route('admin.logout')}} --}}"><i class="icon ion-power"></i> Sign Out</a></li>
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
<div class="sl-mainpanel">
      <!--Footer Area-->
      <footer class="sl-footer">
        <div class="footer-left">
          <div class="mg-b-2">&copy; {{date('Y')}}. Mamun Hossain. All Rights Reserved.</div>
        </div>
        
      </footer>
    </div><!-- sl-mainpanel -->
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
