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
                    @if(Session::has('msg'))
                    <div class="alert alert-danger">{{ Session::get('msg') }}</div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Supervisor id</th>
                                        <th>Supervisor Name</th>
                                        <th>Supervisor phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value )
                                    <tr>
                                        <td>{{ $value->S_id }}</td>
                                        <td>{{ $value->S_name }}</td>
                                        <td>{{ $value->phoneNumber }}</td>

                                        <td style="display: flex; justify-content: space-evenly;">
                                            <a href="{{ route('supervisors.show',$value->S_id) }}" class="btn btn-success">Show</a>
                                            <a href="{{ route('supervisors.edit',$value->S_id) }}" class="btn btn-primary">edit</a>
                                            <form action="{{ route('supervisors.destroy',$value['S_id']) }}" method="POST" style="display: flex">
                                                @csrf
                                                @method('DELETE')

                                                <div style="display: inline-flex">
                                                    <input type="submit" value="Delete" class="btn btn-danger" onclick="if(!confirm('are you sure')){return false;}">

                                                </div>
                                                <select name="id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($supervisors as $supervisor)
                                                    @if($value->S_id!=$supervisor['S_id']){
                                                        <option  value="{{ $supervisor['S_id'] }}">{{ $supervisor['S_name'] }} id:{{ $supervisor['S_id'] }}</option>

                                                    }
                                                    @endif
                                                    @endforeach
                                                </select>


                                            </form>
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


