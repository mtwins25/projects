<!DOCTYPE html>
<html lang="en">

<head>

	<title>Parent Registration</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
    <link rel="icon" href="{{ URL::asset('assets/images/OIP.jpeg') }}"  type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">





</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ URL::asset('assets/images/gu2ckDPBCoJohceDKXCQaO38dVn.png')}}"width="130px" alt="" class="img-fluid mb-4">
        <form action="{{route('handleRegister')}}" method="post">
            @csrf
		<div class="card borderless" >
			<div class="row align-items-center text-center" >

				<div class="col-md-12">
					<div class="card-body" >
                        {{-- <input type="hidden" name="R" value="dumbvalue"> --}}
						<h4 class="f-w-400">Sign up</h4>
						<hr>
						<div class="form-group mb-3">
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="Username" placeholder="Name" >
                            @error('name')
                               <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
						</div>
                        <div class="form-group mb-3">
							<input type="text"  name="phone"class="form-control @error('phone') is-invalid @enderror " id="Username" placeholder="Phone Number">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
						<div class="form-group mb-3">
							<input type="text" name="email" class="form-control @error('email') is-invalid @enderror " id="Email" placeholder="Email address">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
						</div>
						<div class="form-group mb-4">
							<input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="Password" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
						</div>


                        <input type="submit" value="Signup" class="btn btn-block btn-primary mb-4">
						<hr>
						<p class="mb-2">Already have an account? <a href="{{ route('signin') }}" class="f-w-400">Signin</a></p>
					</div>
				</div>
			</div>
		</div>
       </form>

	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="{{ URL::asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/plugins/bootstrap.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pcoded.min.js')}}"></script>



</body>

</html>
