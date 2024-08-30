<!DOCTYPE html>
<html lang="en">

<head>

@include('Layout.Parent.head')
@yield('css')
</head>
<body class="">

	<!-- [ Header ] start -->
    <div class="navigation "></div>
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-out" data-easing2="ease-out" role="banner" class="navigation w-nav" style="background-color: rosybrown" >
        <div class="navigation-container">
	@include('Layout.Parent.header')
        </div>
    </div>

	<!-- [ Header ] end -->



<!-- [ Main Content ] start -->


        <!-- [ breadcrumb ] start -->
	      @yield("content")


        <!-- [ Main Content ] end -->
    </div>
</div>

</div>
    <!-- Required Js -->
@include('Layout.Parent.footer')

<!-- Apex Chart -->
<script src="{{URL::asset('assets/js/plugins/apexcharts.min.js')}}"></script>

@include('Layout.Admin.script')
<!-- custom-chart js -->
<script src="{{URL::asset('assets/js/pages/dashboard-main.js')}}"></script>

</body>

</html>
