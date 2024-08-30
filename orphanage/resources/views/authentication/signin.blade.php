<!DOCTYPE html>
<html lang="en">

<head>

	<title>Login Page</title>
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
<body class="signin">


<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ URL::asset('assets/images/gu2ckDPBCoJohceDKXCQaO38dVn.png')}}"width="130px" alt="" class="img-fluid mb-4">
        <form action="{{route('handleLogin')}}" method="post">
            @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @csrf
            <div class="card borderless">
                <div class="row align-items-center ">

                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="submit" value="Signin" class="btn btn-block btn-primary mb-4">
                            <hr>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="{{route('register')}}" class="f-w-400">Signup</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </form>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ URL::asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/plugins/bootstrap.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pcoded.min.js')}}"></script>



</body>

</html>
