@extends('Layout.Admin.master')
@section('title','Supervises')
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
                                        <th>arrival  Date</th>
                                        <th>supervisor id</th>
                                        <th>supervisor name</th>
                                        <th>supervisor phone number</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($data as $value)
                                    @foreach ($value->supervises as $row )


                                    <tr>
                                        <td>{{ $row->C_id }}</td>
                                        <td>{{ $row->C_name}}</td>
                                        <td>{{ $row->birthDate}}</td>
                                        <td>{{ $row->arrivalDate }}</td>
                                        <td>{{ $value->S_id}}</td>
                                        <td>{{ $value->S_name}}</td>
                                        <td>{{ $value->phoneNumber}}</td>


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


