@extends('layout.index')
@section('content')
@section('title','about Page')
<!-- About Us Section -->
<section class="py-12 px-6 bg-base-200">

  <div class="max-w-5xl mx-auto text-center ">
    <h2 class="text-3xl font-bold mb-4">About Us</h2>
    <p class="mb-8 text-lg">
      We connect talented people with great companies.
      Our job portal helps job seekers find opportunities
      and employers hire the right candidates quickly.
    </p>
  </div>

  <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">

    <div class="card bg-base-100 shadow bg-success">
      <div class="card-body text-center">
        <h3 class="card-title justify-center text-white">Our Mission</h3>
        <p class="text-white">Helping people find meaningful careers easily.</p>
      </div>
    </div>

    <div class="card shadow bg-warning">
      <div class="card-body text-center">
        <h3 class="card-title justify-center text-white">Our Vision</h3>
        <p class="text-white">To be the most trusted job platform worldwide.</p>
      </div>
    </div>

    <div class="card shadow bg-[#1A77F2]">
      <div class="card-body text-center">
        <h3 class="card-title justify-center text-white">Our Values</h3>
        <p class="text-white">Transparency, growth, and innovation.</p>
      </div>
    </div>

  </div>

</section>


@endsection