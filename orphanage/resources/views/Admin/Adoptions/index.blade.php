@extends('Layout.Admin.master')
@section('title','Adoption')
 @section("content")


        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>
                            <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- [ stiped-table ] start -->
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>child id</th>
                                        <th>child name</th>
                                        <th>birth Date</th>
                                        <th>arrival Date</th>
                                        <th>parent id</th>
                                        <th>parent name</th>
                                        <th>parent phone number</th>
                                        <th>adoption Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($data as $value)
                                    @foreach ($value->adoptsChildren as $row )


                                    <tr>
                                        <td>{{ $row->C_id }}</td>
                                        <td>{{ $row->C_name}}</td>
                                        <td>{{ $row->birthDate}}</td>
                                        <td>{{ $row->arrivalDate }}</td>
                                        <td>{{ $value->P_id}}</td>
                                        <td>{{ $value->P_name}}</td>
                                        <td>{{ $value->phoneNumber}}</td>
                                        <td>{{ $row->pivot->adoptionDate }}</td>


                                    </tr>
                                    @endforeach
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ stiped-table ] end -->



</section>
 @endsection


