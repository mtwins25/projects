<style>
    .useremail{

        list-style: none;
        font-family: 'Libre Franklin', sans-serif;
        color: rosybrown;
        font-size: 16px;
        line-height: 24px;
        font-weight: 600;
        border-style: double;
        margin-top: 10%;
        background-color: #fff;


    }
    .top{

        border-radius: 20px;
        background-color: red;
        display: flex;

    }
</style>
<div class="navigation-container">
    <a href="/" aria-current="page" class="logo w-inline-block w--current">
        <img src="{{URL::asset('assets/images/gu2ckDPBCoJohceDKXCQaO38dVn.png')}}" type="image/x-icon" width="100px" style="1px border #2c3e50" alt="" class="logo">

    </a>

    <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="{{ route('/') }}" class="nav-link w-nav-link">Home</a>
        <a href="{{ route('about') }}" class="nav-link w-nav-link">About</a>
        @guest
        <a href="{{ route('register') }}" class="nav-link w-nav-link">Register</a>
        <a href="{{ route('signin') }}" class="nav-link w-nav-link">Log-in</a>
        @endguest
        @auth
        <a href="{{ route('logout') }}" class="nav-link w-nav-link">Logout</a>
        @endauth
        <div >
            <ul>

                @auth
                <li  class="useremail  rounded-pill py-2 px-3" >{{ Auth::user()->email }}</li>
                @endauth
                {{-- <li>01099999999</li> --}}
            </ul>
        </div>


    </nav>
    <div class="menu-button w-nav-button">
        <div class="icon-2 w-icon-nav-menu"></div>

    </div>
</div>
</div>
