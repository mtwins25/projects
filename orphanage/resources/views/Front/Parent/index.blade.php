<style>

    .classes-item {
    transition: .5s;
    padding: 5px;
    width: 350px
}

.classes-item:hover {
    margin-top: -10px;
}

.items{

    display: flex;
    flex-wrap: wrap;
    justify-content: center;



}
.img-fluid{
    height: 220;
    widows: 220;
    object-fit: cover;
}
</style>

@extends('Layout.Parent.master')

@section('title','All Children for Parents')
 @section("content")




        <!-- Classes Start -->
    <div class="pcoded-content" style="background-image: url('https://marketplace.canva.com/EAFJebotzdY/1/0/1600w/canva-beige-floral-minimalist-linktree-background-Jr6vl3hxUDw.jpg');background-size: cover;background-attachment: fixed;background-position: center;">
        <div >
            <div class="container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">All children</h1>

                </div>
                <div class="row ">
                    <div data-wow-delay="0.1s">
                        <div class="items">
                            @foreach ($data as $value)
                            <div class="classes-item">
                                <div class="bg-light rounded-circle w-75 mx-auto p-3" style="border: double">
                                    <div class="d-flex justify-content-center align-items-center rounded-circle" style="width: 220px; height: 220px; overflow: hidden;">
                                        <img class="img-fluid" src="{{ asset('assets/images/children/'.$value->image) }}" alt="" style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="bg-light rounded p-4 pt-5 mt-n5"style="border: double">
                                    <p style="font-weight: 600;" class="d-block text-center h3 mt-3 mb-4" >{{ $value->C_name}}</p>


                                    <div class="row g-1">
                                        <div class="col-4">
                                            <div class="border-top border-3 border-primary pt-2">
                                                <h6 class="text-primary mb-1">Child ID:</h6>
                                                <p>{{ $value->C_id }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="border-top border-3 border-success pt-2">
                                                <h6 class="text-success mb-1" >Birth Date:</h6>
                                                <p name="birthDate">{{ $value->birthDate}}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="border-top border-3 border-warning pt-2">
                                                <h6 class="text-warning mb-1">Arrival Date:</h6>
                                                <p>{{ $value->arrivalDate }}</p>
                                            </div>
                                        </div>
                                        @auth

                                        @if (Auth::user()->isAdmin == 0)
                                        <form action="{{ route('parents.visit',$parent->P_id) }}" method="POST">
                                            @csrf
                                        <div style="display: flex" >
                                            <input type="hidden" name="C_id" value="{{ $value->C_id }}">
                                            <input type="hidden" name="arrivalDate" value="{{ $value->arrivalDate }}">
                                            <input type="submit" value="Request-visit" class="bg-success text-white rounded-pill py-2 px-3">
                                            <input  type="date" name="visitDate" class="btn  btn-outline-secondary" width="5px">
                                        </div>
                                    </form>

                                        @endif



                                        @endauth

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>


            <!-- [ stiped-table ] end -->

    </div>


 @endsection


