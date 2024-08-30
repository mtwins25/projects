<!DOCTYPE html>
<html lang="en">

<head>

@include('Layout.Admin.head')
@yield('css')
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	@include('Layout.Admin.aside')
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->

	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	@include('Layout.Admin.header')

	<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
	      @yield("content")


        <!-- [ Main Content ] end -->
    </div>
</div>
 <div class="row">
 @yield("row-data")
 </div>

    <!-- Required Js -->


<!-- Apex Chart -->
<script src="{{URL::asset('assets/js/plugins/apexcharts.min.js')}}"></script>

@include('Layout.Admin.script')
<!-- custom-chart js -->
<script src="{{URL::asset('assets/js/pages/dashboard-main.js')}}"></script>
</body>

</html>
