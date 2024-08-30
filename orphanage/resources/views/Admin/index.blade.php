@extends('Layout.Admin.master')
 @section("content")
 <style>
    .table-container{
        overflow-y: auto;
        overflow-x: hidden;
        height: 300px;
    }
    .table-container2{
        overflow-y: auto;
        overflow-x: hidden;
        height: 190px;
    }
 </style>
 <div class="row" >
    {{-- <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div align='center'class="col-12">
                        <h3 >PARENTS</h3>
                        <H3>{{ $parents_C }}</H3>
                    </div>
                    <div class="col-6">
                        <div  ></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

        {{-- ---------------------------------------visits requests table--------------------------------------------- --}}

        <div class="col-md-8 col-xl-4" >
            <div class="card"style="border-top:0px ">
            <div class="card-body table-border-style col-md-12 col-xl-12 " style="padding:0px ">
                <div  class="table-container">
                    <label for="t1"style=" margin-bottom:0px;text-align:center;width:100%;background-color:#2ecc71;"><h3 style="color: white">visits requests</h3></label>
                    <table id="t1" class="table table-striped col-md-12 col-xl-12 "height=20px>
                        <thead>
                            <tr>
                                <th>child id</th>
                                <th>parent id</th>
                                <th>visit Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($data as $value)
                            @foreach ($value->visitsparents as $row )

                                @if ($row->pivot->request=='requested')
                                <tr>
                                    <td>{{ $value->C_id }}</td>

                                    {{-- <td>{{ $value->arrivalDate }}</td> --}}
                                    <td>{{ $row->P_id }}</td>

                                    <td>{{ $row->pivot->visitDate}}</td>
                                    {{-- <td>{{ $row->pivot->request }}</td> --}}
                                    <td>

                                        <form  style="margin-bottom:5%"action="{{route('visits.update',$row->P_id)}}"method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" value="{{ $value->C_id }}" name="C_id">


                                            <div style="display: inline-flex " >
                                                <input type="submit" value="accept" class="btn btn-success" >

                                            </div>
                                        </form>



                                        <form action="{{ route('visits.destroy',$row->P_id) }}" method="POST" style="display: inline-flex">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" value="{{ $value->C_id }}" name="C_id">

                                            <div style="display: inline-flex">
                                                <input type="submit" value="cancel" class="btn btn-danger" onclick="if(!confirm('are you sure')){return false;}">
                                            </div>
                                        </form>

                                    </td>

                                </tr>
                                @endif

                            @endforeach
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- -----------------------------------children table--------------------------------------------- --}}
<div class="col-md-8 col-xl-4" >
    <div class="card"style="border-top:0px ">
    <div class="card-body table-border-style col-md-12 col-xl-12 " style="padding:0px ">
        <div  class="table-container">
            <label for="t1"style=" margin-bottom:0px;text-align:center;width:100%;background-color:#2ecc71;"><h3 style="color: white">Children</h3></label>
            <table id="t1" class="table table-striped col-md-12 col-xl-12 "height=20px>
                    <thead>
                        <tr>
                            <th>Child ID</th>
                            <th>Child Name</th>
                            <th>Child Arrival Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($children_R as $valueR)
                        <tr>
                            <td>{{ $valueR->C_id }}</td>
                            <td>{{ $valueR->C_name}}</td>
                            <td>{{ $valueR->arrivalDate }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    {{-- ------------------------------------visits table-------------------------------------------------- --}}
    <div class="col-md-8 col-xl-4" >
        <div class="card"style="border-top:0px ">
        <div class="card-body table-border-style col-md-12 col-xl-12 " style="padding:0px ">
            <div  class="table-container">
                <label for="t1"style=" margin-bottom:0px;text-align:center;width:100%;background-color:#2ecc71;"><h3 style="color: white">visits</h3></label>
                <table id="t1" class="table table-striped col-md-12 col-xl-12 "height=20px>
                    <thead>
                        <tr >
                            <th>child id</th>
                            <th>parent id</th>
                            <th>visit Date</th>
                            <th>actions</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($data as $value)
                        @foreach ($value->visitsparents as $row )

                            @if ($row->pivot->request=='accepted')
                            <tr>
                                <td>{{ $value->C_id }}</td>

                                {{-- <td>{{ $value->arrivalDate }}</td> --}}
                                <td>{{ $row->P_id }}</td>

                                <td>{{ $row->pivot->visitDate}}</td>
                                <td>                      <div class="col-md-3" style="display: inline-block">
                                    <form action="{{ route('AcVisits.destroy',$row->P_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" value="{{ $value->C_id }}" name="C_id">


                                        <div style="display: inline-flex">
                                            <input type="submit" value="cancel" class="btn btn-danger" onclick="if(!confirm('are you sure')){return false;}">

                                        </div>
                                    </form>
                                </div></td>
                                {{-- <td>{{ $row->pivot->request }}</td> --}}


                            </tr>
                            @endif

                        @endforeach
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
{{-- -----------------------cards----------------------- --}}
<div class="col-md-12 col-xl-4">
    <a href="{{route('Aparents.index')}}" target="_self">
<div class="card flat-card widget-purple-card col-xl-12 col-md-12">
    <div class="row-table">

            <img  src="{{URL::asset('assets/images/icons/parents.png')}}" alt="User-Profile-Image"  width="40px" length="40px" style="margin-right:5%; ">

        <div class="col-sm-9">
            <h4>{{ $parents_C}}</h4>
            <h4>parents</h4>
        </div>
    </div>
</div></a>
</div>

<div class="col-md-12 col-xl-4">
    <a href="{{route('supervisors.index')}}" target="_self">
<div class="card flat-card widget-primary-card col-xl-12 col-md-12">
    <div class="row-table">

            <img  src="{{URL::asset('assets/images/icons/supervisors.png')}}" alt="User-Profile-Image"  width="60px" length="60px" style="margin-right:1%; ">

        <div class="col-sm-9">
            <h4>{{ $supervisors_C}}</h4>
            <h4>supervisors</h4>
        </div>
    </div>
</div></a>
</div>

<div class="col-md-12 col-xl-4">
    <a href="{{route('children.index')}}" target="_self">
        <div class="card flat-card widget-purple-card col-xl-12 col-md-12">
            <div class="row-table">

                    <img  src="{{URL::asset('assets/images/icons/children.png')}}" alt="User-Profile-Image"  width="40px" length="40px" style="margin-right:5%; ">

                <div class="col-sm-9">
                    <h4>{{ $children_C}}</h4>
                    <h4>children</h4>
                </div>
            </div>
        </div></a>
</div>


<div class="col-md-12 col-xl-4">
    <a href="{{route('ACVisitors')}}" target="_self">
        <div class="card flat-card widget-purple-card col-xl-12 col-md-12">
            <div class="row-table">

                    <img  src="{{URL::asset('assets/images/icons/visits.png')}}" alt="User-Profile-Image"  width="40px" length="40px" style="margin-right:5% ">

                <div class="col-sm-9">
                    <h4>{{ $visits_C}}</h4>
                    <h4>visits</h4>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-md-12 col-xl-4">
        <a href="{{route('adoptions.index')}}" target="_self">
        <div class="card flat-card widget-primary-card col-xl-12 col-md-12">
            <div class="row-table">

                    <img  src="{{URL::asset('assets/images/icons/adoption.png')}}" alt="User-Profile-Image" width="40px" length="40px" style="margin-right:5%; ">

                <div class="col-sm-9">
                    <h4>{{ $adoptions_C}}</h4>
                    <h4>adoptions</h4>
                </div>
            </div>
        </div></a>
    </div>

    {{-- -----------------------------------Supervisions table--------------------------------------------- --}}
<div class="col-md-8 col-xl-4" >
    <div class="card"style="border-top:0px ">
    <div class="card-body table-border-style col-md-12 col-xl-12 " style="padding:0px ">
        <div  class="table-container2">
            <label for="t1"style=" margin-bottom:0px;text-align:center;width:100%;background-color:#2ecc71;"><h3 style="color: white">Supervisions</h3></label>
            <table id="t1" class="table table-striped col-md-12 col-xl-12 "height=20px>
                    <thead>
                        <tr>
                            <th>Supervisor name </th>
                            <th>Child Name</th>
                        </tr>
                    </thead>
                    <tbody>

                      @foreach ( $qsupervisors as $valueS )
                             @foreach ($valueS->supervises as $row )


                                    <tr>
                                        <td>{{ $valueS->S_name}}</td>
                                        <td>{{ $row->C_name}}</td>
                                    </tr>
                                    @endforeach
                      @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    {{-- -----------------camouflage div ---------------}}
    <div class="col-md-12 col-xl-4"></div>


</div>
 @endsection


