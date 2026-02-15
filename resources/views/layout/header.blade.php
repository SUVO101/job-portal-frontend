<!-- Responsive Navbar -->
<!-- <div class="navbar bg-error text-white px-4"> -->

  <!-- Mobile menu button -->
  <!-- <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        ☰
      </label> -->

      <!-- Mobile Menu -->
      <!-- <ul tabindex="0"
          class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-error rounded-box w-52">

        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="">Companies</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>

    <a class="text-xl font-bold ml-2">
      JobPortal
    </a>
  </div> -->

  <!-- Desktop menu -->
  <!-- <div class="navbar-end hidden lg:flex">
    <ul class="menu menu-horizontal px-1 gap-4">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="">Companies</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
  </div> -->

  <!-- Right buttons -->
  <!-- <div class="navbar-end gap-2">
    <button class="btn btn-success btn-sm">Sign in</button>
    <button class="btn btn-warning btn-sm">Register</button>
  </div> -->

<!-- </div> -->

<div class="navbar bg-pink-500 text-black 
            border-b-4 border-black 
            shadow-[0px_0px_0px_#000] 
            px-6 py-3">

  <!-- ================= Mobile Menu ================= -->
  <div class="navbar-start">

    <div class="dropdown">
      <label tabindex="0"
             class="btn bg-yellow-300 text-black lg:hidden px-4">
        ☰
      </label>

      <!-- Mobile Dropdown -->
      <ul tabindex="0"
          class="menu menu-sm dropdown-content 
                 mt-4 p-3 w-56 
                 bg-white text-black 
                 border-4 border-black 
                 shadow-[6px_6px_0px_#000]">

        <li class="border-4 border-black"><a class="font-bold hover:translate-x-1 transition-all"
               href="{{ route('home') }}">Home</a></li>

        <li><a class="font-bold hover:translate-x-1 transition-all"
               href="">Companies</a></li>

        <li><a class="font-bold hover:translate-x-1 transition-all"
               href="{{ route('about') }}">About</a></li>

        <li><a class="font-bold hover:translate-x-1 transition-all"
               href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>

    <!-- Logo -->
    <a href="{{ route('home') }}"
       class="text-2xl font-black ml-3 tracking-wide">
      JobPortal
    </a>

  </div>

  <!-- ================= Desktop Menu ================= -->
  <div class="navbar-end hidden lg:flex">

    <ul class="menu menu-horizontal gap-6 text-lg font-bold">

      <li>
        <a class="hover:translate-x-1 transition-all"
           href="{{ route('home') }}">
          Home
        </a>
      </li>

      <li>
        <a class="hover:translate-x-1 transition-all"
           href="">
          Companies
        </a>
      </li>

      <li>
        <a class="hover:translate-x-1 transition-all"
           href="{{ route('about') }}">
          About
        </a>
      </li>

      <li>
        <a class="hover:translate-x-1 transition-all"
           href="{{ route('contact') }}">
          Contact
        </a>
      </li>

    </ul>

  </div>

</div>
