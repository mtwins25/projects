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
                                        <th>Parent id</th>
                                        <th>Parent Name</th>
                                        <th>Parent phone</th>
                                        <th>email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value )
                                    <tr>
                                        <td>{{ $value['P_id'] }}</td>
                                        <td>{{ $value['P_name'] }}</td>
                                        <td>{{ $value['phoneNumber'] }}</td>
                                        <td>{{$value->account->email  }}</td>
                                        <td>
                                            <a href="{{ route('Aparents.show',$value['P_id'] ) }}" class="btn btn-success">Show</a>
                                            <a href="{{ route('Aparents.edit',$value['P_id']) }}" class="btn btn-primary">edit</a>

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


