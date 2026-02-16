@extends('layout.index')
@section('content')
@section('title','about Page')
<!-- About Us Section -->
<section class="py-12 px-6 bg-base-200">

  <div class="max-w-5xl mx-auto text-center ">
    <h2 class="text-3xl mb-4 text-blue-500 font-black">About Us</h2>
    <div class="divider"></div>
    <p class="mb-8 text-lg">
      We connect talented people with great companies.
      Our job portal helps job seekers find opportunities
      and employers hire the right candidates quickly.
    </p>
  </div>

  <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">

    <div class="card rounded-none bg-green-500">
      <div class="card-body text-center">
        <h2 class="text-3xl card-title justify-center font-black">Our Mission</h2>
        <p class="text-xl mt-3 text-center">Helping people find meaningful careers easily.</p>
      </div>
    </div>

    <div class="card rounded-none bg-yellow-300">
      <div class="card-body text-center">
        <h2 class="text-3xl card-title justify-center font-black">Our Vision</h2>
        <p class="text-xl mt-3 text-center">To be the most trusted job platform worldwide.</p>
      </div>
    </div>

    <div class="card rounded-none bg-blue-500">
      <div class="card-body text-center">
        <h2 class="text-3xl card-title justify-center font-black">Our Values</h2>
        <p class="text-xl mt-3 text-center">Transparency, growth, and innovation.</p>
      </div>
    </div>

    
  </div>
  <p class="mt-8 text-center text-xl">I will keep posting more important posts on my Website for all of you. Please give your support and love.</p>
  <p class="mt-4 text-center text-3xl font-black text-blue-500">Thanks For Visiting Our Site</p>
  <p class="mt-4 text-center text-xl">Have a nice day!</p>

</section>


@endsection