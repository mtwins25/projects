@extends('Layout.Admin.master')
@section('title','All Visitors')
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
                    @if(Session::has('msg'))
                    <div class="alert alert-danger">{{ Session::get('msg') }}</div>
                    @endif
                    @if(Session::has('msg2'))
                    <div class="alert alert-success">{{ Session::get('msg2') }}</div>
                    @endif
                    @if(Session::has('msg3'))
                    <div class="alert alert-warning">{{ Session::get('msg3') }}</div>
                    @endif
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>child id</th>
                                        <th>child name</th>
                                        <th>birth Date</th>
                                        {{-- <th>arrival  Date</th> --}}
                                        <th>parent id</th>
                                        <th>parent name</th>
                                        <th>parent phone number</th>
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
                                            <td>{{ $value->C_name}}</td>
                                            <td>{{ $value->birthDate}}</td>
                                            {{-- <td>{{ $value->arrivalDate }}</td> --}}
                                            <td>{{ $row->P_id }}</td>
                                            <td>{{ $row->P_name}}</td>
                                            <td>{{ $row->phoneNumber}}</td>
                                            <td>{{ $row->pivot->visitDate}}</td>
                                            {{-- <td>{{ $row->pivot->request }}</td> --}}
                                            <td>
                                                <div style="display: inline-flex; justify-content: space-evenly">
                                                    <div class="col-md-4" style="display: inline-block">
                                                        <form action="{{route('visits.update',$row->P_id)}}"method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" value="{{ $value->C_id }}" name="C_id">

                                                            <div style="display: inline-flex">
                                                                <input type="submit" value="accept" class="btn btn-success">

                                                            </div>
                                                        </form>
                                                    </div>

                                                        <div class="col-md-3" style="display: inline-block">
                                                        <form action="{{ route('visits.destroy',$row->P_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <input type="hidden" value="{{ $value->C_id }}" name="C_id">


                                                            <div style="display: inline-flex">
                                                                <input type="submit" value="cancel" class="btn btn-danger" onclick="if(!confirm('are you sure')){return false;}">

                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
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
            <!-- [ stiped-table ] end -->



</section>
 @endsection


