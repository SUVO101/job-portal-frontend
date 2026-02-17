@extends('layout.index')
@section('content')
@section('title','Contact Page - '.env('WEBSITE_NAME'))
<!-- Contact Us Section -->
<section class="py-16 px-6 bg-yellow-200 
                border-t-4 border-black 
                shadow-[8px_8px_0px_#000]">

  <!-- ================= Heading ================= -->
  <div class="max-w-4xl mx-auto text-center mb-10">

    <h2 class="text-4xl font-black mb-3 text-black">
      Contact Us
    </h2>

    <p class="font-bold text-black">
      Have questions? We'd love to hear from you.
    </p>

  </div>


  <!-- ================= Form Card ================= -->
  <div class="max-w-4xl mx-auto 
              bg-white 
              border-4 border-black 
              shadow-[8px_8px_0px_#000] 
              p-8">

    <!-- Name + Email -->
    <div class="grid md:grid-cols-2 gap-6">

      <input type="text"
             placeholder="Your Name"
             class="w-full border-4 border-black 
                    bg-pink-200 
                    px-4 py-3 
                    font-bold 
                    focus:outline-none 
                    shadow-[4px_4px_0px_#000]">

      <input type="email"
             placeholder="Email Address"
             class="w-full border-4 border-black 
                    bg-cyan-200 
                    px-4 py-3 
                    font-bold 
                    focus:outline-none 
                    shadow-[4px_4px_0px_#000]">

    </div>

    <!-- Subject -->
    <input type="text"
           placeholder="Subject"
           class="w-full mt-6 border-4 border-black 
                  bg-yellow-200 
                  px-4 py-3 
                  font-bold 
                  focus:outline-none 
                  shadow-[4px_4px_0px_#000]">

    <!-- Message -->
    <textarea rows="5"
              placeholder="Your Message"
              class="w-full mt-6 border-4 border-black 
                     bg-lime-200 
                     px-4 py-3 
                     font-bold 
                     focus:outline-none 
                     shadow-[4px_4px_0px_#000]"></textarea>

    <!-- Button -->
    <div class="text-center mt-8">

      <button class="my-btn bg-green-500
                     font-black 
                     hover:translate-x-1 
                     hover:translate-y-1 
                     hover:shadow-none 
                     transition-all duration-150">

        Send Message

      </button>

    </div>

  </div>

</section>



@endsection