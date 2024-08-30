@extends("Layout.Admin.master")

@section('title','Show Children Data')
@section('css')
<style>
    .cardImg{
    height:200px;
    width:230px;
    /* margin-right: 40px; */
    margin-left: 60px;
    margin-top: 10px;

  }
  .card{
      border:3px solid green;
      width:400px;
      margin-right: auto;
      margin-left: auto;
    }
    .con{
        margin-left:60px;
    }
</style>

@endsection
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
                                <img class="cardImg" src="{{URL::asset('assets/images/children/'.$data->image )}}" alt="Card image cap" height='100px' width='100px' style="border-radius: 110px">
                                    <br>
                                    <br>
                                    <div class="con">
                                        <p class="card-text"> <b>Child ID</b>: {{ $data->C_id }} </p>
                                        <p class="card-text"> <b>Child Name</b>: {{ $data->C_name }}</p>
                                        <p class="card-text"> <b>Child Birthdate</b>:{{ $data->birthDate }}</p>
                                        <p class="card-text"> <b>Child arrival Date</b>:{{ $data->arrivalDate }}</p>
                                        <p class="card-text"> <b>Child arrival Date</b>:{{ $data->arrivalDate }}</p>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->



</section>
 @endsection


