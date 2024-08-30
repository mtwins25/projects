@extends("Layout.Admin.master")

@section('title','Show Parent Data')

@section("content")


        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Bootstrap Card</a></li>
                            <li class="breadcrumb-item"><a href="#!">Basic Card</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card" style="width: 400px">

                    <div class="card-body table-border-style" >
                        <div class="table-responsive">
                            <div class="table table-striped"  >
                                <p class="card-text"> <b>Parent ID</b>: {{ $data->P_id }} </p>
                                <p class="card-text"> <b>Parent Name</b>: {{ $data->P_name }}</p>
                                <p class="card-text"> <b>Parent Phone</b>:{{ $data->phoneNumber }}</p>
                                <p class="card-text"> <b>Parent email</b>:{{ $data->account->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->



</section>
 @endsection


