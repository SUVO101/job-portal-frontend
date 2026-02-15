@extends('layout.index')
@section('content')
@section('title','contact Page')
<!-- Contact Us Section -->
<section class="py-12 px-6">

  <div class="max-w-4xl mx-auto text-center mb-8">
    <h2 class="text-3xl font-bold mb-2">Contact Us</h2>
    <p>Have questions? We'd love to hear from you.</p>
  </div>

  <div class="max-w-4xl mx-auto card bg-base-200 shadow">
    <div class="card-body">

      <div class="grid md:grid-cols-2 gap-4">

        <input type="text"
               placeholder="Your Name"
               class="input input-bordered w-full">

        <input type="email"
               placeholder="Email Address"
               class="input input-bordered w-full">

      </div>

      <input type="text"
             placeholder="Subject"
             class="input input-bordered w-full mt-4">

      <textarea class="textarea textarea-bordered mt-4"
                placeholder="Your Message"></textarea>

      <div class="text-center mt-6">
        <button class="btn btn-error px-8">
          Send Message
        </button>
      </div>

    </div>
  </div>

</section>


@endsection