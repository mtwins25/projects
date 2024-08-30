@extends("Layout.Admin.master")
@section('title','Create Parent')
@section("content")
<section class="pcoded-main-container">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Form Elements</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                        </ul>
                    </div>
                </div>
                </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <center>
        <div class="row">

            <!-- [ form-element ] start -->
            <div class="col-sm-6">
                <div class="card">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif

                    <div class="card-body">
                        <h5>Form controls</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('adoptions.store')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="parent">parent</label>
                                        <select class="form-control" name="P_id" id="parent">
                                                @foreach ($parents as $parent)
                                                <option value="{{ $parent['P_id'] }}">{{ $parent['P_name'] }} id:{{ $parent['P_id'] }}</option>
                                                @endforeach
                                        </select>
                                        @error('P_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                             </div>

                             <div class="form-group">
                                <label for="child">child</label>
                                    <select class="form-control" name="C_id" id="child">
                                            @foreach ($children as $child)
                                            <option value="{{ $child['C_id'] }}">{{ $child['C_name'] }} id:{{ $child['C_id'] }}</option>


                                            @endforeach
                                    </select>
                                    @error('C_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                         </div>
                                    <div class="form-group">
                                        <label for="adoptionDate">adoption Date</label>
                                        <input type="date" class="form-control" id="adoptionDate" placeholder="adoptionDate" name="adoptionDate">
                                    </div>
                                    <button type="submit" class="btn  btn-primary">Submit</button>
                                </form>
                            </div>

                        </div>


                            </div>

                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </center>
        <!-- [ Main Content ] end -->

    </div>
</section>
@endsection
