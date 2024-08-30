@extends('Layout.Admin.master')
@section('title','All Children')
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
                                        <th>Child ID</th>
                                        <th>Child Name</th>
                                        <th>Child Birthdate</th>
                                        <th>Child Arrival Date</th>
                                        <th>Child Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $value->C_id }}</td>
                                        <td>{{ $value->C_name}}</td>
                                        <td>{{ $value->birthDate}}</td>
                                        <td>{{ $value->arrivalDate }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/children/'.$value->image) }}" alt="" width="80" height="70"style="border-radius: 110px">
                                        </td>
                                        <td>
                                            <a href="{{ route('children.show',$value->C_id) }}" class="btn btn-success">show</a>
                                            <a href="{{ route('children.edit',$value->C_id) }}" class="btn btn-primary">edit</a>
                                        </td>
                                    </tr>
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


