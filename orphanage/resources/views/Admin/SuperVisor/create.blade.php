@extends("Layout.Admin.master")
@section('title','Create SuperVisor')
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
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <center>
        <div class="row">

            <!-- [ form-element ] start -->
            <div class="col-sm-6">
                <div class="card">
                    @if(Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                    @endif
                    <div class="card-body">
                        <h5>Form controls</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{route('supervisors.store')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control @error('S_name') is-invalid @enderror" id="Name" aria-describedby="emailHelp" placeholder="Enter Name" name="S_name">
                                        @error('S_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">phone number</label>
                                        <input type="text" class="form-control @error('S_name') is-invalid @enderror" id="arrivalDate" placeholder="phone number" name=phoneNumber>
                                        @error('phoneNumber')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>


                                    <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
                                </form>
                            </div>

                        </div>


                            </div>

                        </div>







                        </div>
                    </div>
                </div>
                <!-- Input group -->


            <!-- [ form-element ] end -->
        </div>
    </center>
        <!-- [ Main Content ] end -->

    </div>
</section>
@endsection
