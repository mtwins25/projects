@extends("Layout.Admin.master")
@section('title','Create Children')
@section("content")
<style>
    .cardImg{
    height:200px;
    width:230px;
    /* margin-right: 40px; */
    margin-left: 60px;
    margin-top: 10px;

  }
  </style>
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

        <div class="row">

            <!-- [ form-element ] start -->
            <div class="col-sm-6">
                <div class="card">

                    <div class="card-body">
                        <h5>Form controls</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{route('children.update',$child['C_id'])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <img class="cardImg" name="image" src="{{ asset('assets/images/children/'.$child["image"]) }}" alt="" width="60" height="50">

                                    <div class="form-group">

                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control @error('C_name') is-invalid @enderror" id="Name" aria-describedby="emailHelp" placeholder="Enter Name" name="C_name" value='{{$child["C_name"]}}'>
                                        @error('C_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="birthDate">birth Date</label>
                                        <input type="date" class="form-control" id="birthDate" placeholder="birth date" name=birthDate value='{{$child["birthDate"]}}'>

                                    </div>
                                    <div class="form-group">
                                        <label for="arrivalDate">Arrival Date</label>
                                        <input type="date" class="form-control @error('arrivalDate') is-invalid @enderror" id="arrivalDate" placeholder="arrivale date" name=arrivalDate value='{{$child["arrivalDate"]}}'>
                                        @error('arrivalDate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">picture</label>

                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="arrivale date" name=image  value='{{$child["image"]}}'>

                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="supervisor">supervisor</label>
                                            <select class="form-control" name="S_id" id="supervisor">
                                                    @foreach ($supervisors as $supervisor)

                                                    <option  value="{{ $supervisor['S_id'] }}" @if($supervisor->S_id==$cs_id) selected  @endif>{{ $supervisor['S_name'] }} id:{{ $supervisor['S_id'] }}</option>
                                                    @endforeach
                                            </select>
                                            <input type="hidden" name="cs_id" value={{$cs_id}}>
                                 </div>
                                    <button type="submit" class="btn  btn-primary" name="submit">Submit</button>
                                </form>
                            </div>

                        </div>


                            </div>
                        </div>



                        <!-- <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script> -->





                        </div>
                    </div>
                </div>
                <!-- Input group -->


            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
@endsection
