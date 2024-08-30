@extends("Layout.Admin.master")
@section('title','Create Children')
@section("content")
<section class="pcoded-main-container">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Form Elements</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="row">

            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <h5>Form controls</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            <form action="{{route('Aparents.update',$Aparent['P_id'])}}" method="post">
                                @csrf
                                @method('put')
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text"  class="form-control  @error('P_name') is-invalid @enderror" id="Name" aria-describedby="emailHelp" placeholder="Enter Name" name="P_name" value='{{$Aparent["P_name"]}}'>
                                        @error('P_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>
                                    <input type="hidden" name="P_id" value='{{$Aparent["P_id"]}}'>

                                    <div class="form-group">
                                        <label for="phoneNumber">phone number</label>
                                        <input type="text" class="form-control  @error('phoneNumber') is-invalid @enderror" id="phoneNumber" placeholder="phoneNumber" name=phoneNumber value='{{$Aparent["phoneNumber"]}}'>
                                        @error('phoneNumber')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" name=email value='{{$Aparent->account->email}}'>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>

                                    <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
                                </form>
                            </div>

                        </div>


                            </div>
                        </div>



                        <!-- <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script> -->





                        </div>
                    </div>
                </div>
                <!-- Input group -->


            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
@endsection
