<style>
    .home{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        min-width: 100%;
        min-height: 100vh;
        background: #1abc9c;
        background-image: url(assets/images/auth/gall_pic1.jpg);
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        text-align: center
    }
    .hww{
        margin-top: 0px;
        margin-bottom: 30px;
        font-family: 'Libre Franklin', sans-serif;
        color: #fff;
        font-size: 72px;
        line-height: 78px;
        font-weight: 800;
        letter-spacing: -1px;
    }
</style>
@extends('Layout.Parent.master')

@section('title','Home')
 @section("content")

 <div class="home">

        <div class="header-content">
            <h1 class="hww" style="font-weight: 800;">Welcome to our orphanage</h1>
            <p  class="paragraph">We help orphans find a family and discover what real family values and happiness are.</p>
            <a href="{{ route('parents.index') }}" class="button w-button" style="background-color: rosybrown">See Children</a>
        </div>

 </div>


        @auth
        {{-- <a href="#" class="enroll">{{ Auth::user()->name }}</a> --}}
        @endauth

@endsection



