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
                                        <th>actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($data as $value)
                                    @foreach ($value->visitsparents as $row )

                                        @if ($row->pivot->request=='accepted')
                                        <tr>
                                            <td>{{ $value->C_id }}</td>
                                            <td>{{ $value->C_name}}</td>
                                            <td>{{ $value->birthDate}}</td>
                                            {{-- <td>{{ $value->arrivalDate }}</td> --}}
                                            <td>{{ $row->P_id }}</td>
                                            <td>{{ $row->P_name}}</td>
                                            <td>{{ $row->phoneNumber}}</td>
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
                                            </div>
                                        </td>
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
            <!-- [ stiped-table ] end -->



</section>
 @endsection


