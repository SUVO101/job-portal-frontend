<!-- Responsive Navbar -->
<div class="navbar bg-error text-white px-4">

  <!-- Mobile menu button -->
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        ☰
      </label>

      <!-- Mobile Menu -->
      <ul tabindex="0"
          class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-error rounded-box w-52">

        <li><a href="{{ route('home') }}">Home</a></li>
        <!-- <li><a>Jobs</a></li> -->
        <li><a href="">Companies</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>

    <a class="text-xl font-bold ml-2">
      JobPortal
    </a>
  </div>

  <!-- Desktop menu -->
  <div class="navbar-end hidden lg:flex">
    <ul class="menu menu-horizontal px-1 gap-4">
      <li><a href="{{ route('home') }}">Home</a></li>
      <!-- <li><a>Jobs</a></li> -->
      <li><a href="">Companies</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
  </div>

  <!-- Right buttons -->
  <!-- <div class="navbar-end gap-2">
    <button class="btn btn-success btn-sm">Sign in</button>
    <button class="btn btn-warning btn-sm">Register</button>
  </div> -->

</div>

