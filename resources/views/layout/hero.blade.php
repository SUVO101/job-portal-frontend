<!-- Hero Section -->
<!-- <section class="bg-success text-white py-12 text-center">
  <h1 class="text-4xl font-bold mb-3">
    Find Your Dream Job!
  </h1>
  <p class="mb-6">Search the best job opportunities</p>

  <div class="flex flex-wrap justify-center gap-3">
    <input type="text" placeholder="Job title"
           class="input input-bordered w-52 text-black">

    <input type="text" placeholder="Location"
           class="input input-bordered w-52 text-black">

    <button class="btn btn-error">
      Search Jobs
    </button>
  </div>
</section> -->
<section class="bg-yellow-300 border-b-4 border-black 
                shadow-[6px_4px_0px_#000] 
                py-16 text-center mb-3 px-3">

  <h1 class="text-5xl font-black mb-4 text-black">
    Find Your Dream Job!
  </h1>

  <p class="mb-8 text-lg font-semibold text-black">
    Search the best job opportunities
  </p>

  <!-- Search Box Container -->
  <div class="inline-block bg-white border-4 border-black 
              shadow-[6px_6px_0px_#000] 
              p-6">

              <form action="{{ route('search') }}" method="GET">
    <div class="flex flex-wrap justify-center gap-4">

        <!-- Job Title -->
        <input type="text" name="search"
               placeholder="Job title"
               class="input w-56 bg-white text-black">

        <!-- Location -->
        <select class="select w-48 text-black" name="location">
          <option disabled selected>Select State</option>
          @foreach($states as $state)
            <option value="{{ $state->slug }}"> {{ $state->short_name }} </option>
          @endforeach
        </select>

        <!-- Button -->
        <button class="my-btn bg-green-500 font-black px-6" type="submit">
          Search Jobs
        </button>
        
      </div>
    </form>

  </div>

</section>

