<!-- extends the main layout -->
@extends('layout.index')

@section('title', 'homePage')
<!-- dynamic content -->
@section('content')

    @include('layout.hero')

    <section class="pt-12 pb-8 px-6 md:px-8 bg-base-200">

    <div class="flex w-full flex-col lg:flex-row gap-6">

    <!-- ===================== STATES ===================== -->
    <div class="card bg-base-200 rounded-none w-full lg:w-2/3 p-5">

        <div class="flex items-center mb-4">
            <div class="w-1 h-6 bg-error rounded mr-3"></div>
            <h3 class="font-bold text-lg">States</h3>
        </div>

        <div class="flex flex-wrap gap-2 max-h-32 overflow-y-auto pr-2">

            @foreach ($states as $state)
                <a 
                    href="{{ route('link', ['type' => 'state', 'slug' => $state->slug]) }}"
                    class="btn btn-secondary btn-outline btn-xs hover:btn-error transition-all duration-200">
                    <i class="fa-solid fa-location-dot mr-1"></i>
                    {{ $state->short_name }}
                </a>
            @endforeach

        </div>
    </div>


    <!-- ===================== CATEGORIES ===================== -->
    <div class="card bg-base-200 rounded-none w-full lg:w-1/3 p-5">

        <div class="flex items-center mb-4">
            <div class="w-1 h-6 bg-success rounded mr-3"></div>
            <h3 class="font-bold text-lg">Categories</h3>
        </div>

        <div class="flex flex-wrap gap-2">

            @foreach ($categories as $category)
                <a 
                    href="{{ route('link', ['type' => 'category', 'slug' => $category->slug]) }}"
                    class="btn btn-success btn-sm hover:scale-105 transition-all duration-200">
                    {{ $category->name }}
                </a>
            @endforeach

        </div>
    </div>

</div>



    <div class="divider"></div>

      <div class="flex w-full flex-col lg:flex-row gap-6">

        <!-- LEFT SIDE (8 COL STYLE) -->
        <div class="flex-1 space-y-6">

          <h2 class="text-2xl font-bold">
            Latest Job Listings
          </h2>

          @foreach ($jobposts as $jobpost)
          <!-- Job Card -->
          <!-- <div class="card bg-base-100 shadow border"> -->
            <div class="card bg-base-100 rounded-none">
            <div class="card-body flex flex-col md:flex-row justify-between gap-4">

              <div class="flex gap-4 flex-1">
                <div class="avatar">
                  <div class="w-12 rounded">
                    <img src="{{ asset('storage' . $jobpost->companyDetail->logo) }}">
                  </div>
                </div>

                <div>
                  <h3 class="font-bold text-lg line-clamp-1 md:line-clamp-2">{{ $jobpost->post_title }}</h3>
                  <p class="text-sm text-gray-500">
                    {{ $jobpost->companyDetail->name }} • {{ $jobpost->location }}
                  </p>

                  <p class="font-semibold mt-1">
                    {{ $jobpost->salary }} <i class="fa-solid fa-eye ms-3"></i> {{ $jobpost->counter->view_count }}
                  </p>

                  <div class="flex flex-wrap gap-2 mt-2">
                    @foreach ($jobpost->types as $type)
                    <span class="badge badge-outline">{{ $type->name }}</span>
                    @endforeach
                  </div>
                </div>
              </div>

              <a class="btn btn-warning btn-sm w-full md:w-auto" href="{{ route('post_link',['slug'=>$jobpost->slug]) }}">
                View Details →
  </a>

            </div>
          </div>
          @endforeach

          <div class="flex justify-center">
            <a class="btn btn-primary mx-auto" href="{{ route('link', ['type' => 'all', 'slug' => 'all']) }}">more jobs</a>
          </div>

        </div>


      <!-- DIVIDER -->
      <div class="divider lg:divider-horizontal"></div>


      <!-- RIGHT SIDE (Recent Jobs Better Style) -->
      <aside class="lg:w-80 space-y-6">

        <h2 class="text-2xl font-bold">
          Recent Job Listings
        </h2>

        @foreach ($recent_jobposts as $recent_jobpost)
          <!-- Recent Job Card -->
          <div class="card bg-base-100 rounded-none">
            <div class="card-body p-4">
              <h3 class="font-semibold">
                {{ $recent_jobpost->post_title }}
              </h3>
              <p class="text-sm text-gray-500">
                {{ $recent_jobpost->location }}
              </p>
              <p class="text-sm text-gray-500">
                {{ $recent_jobpost->salary }}
              </p>
              <a class="btn btn-sm mt-2 btn-success" href="">
                View Job
              </a>
            </div>
          </div>
        @endforeach

      </aside>

    </div>


        <div class="divider"></div>


    <div class="flex w-full flex-col lg:flex-row">
      <div class="card rounded-none rounded-box grid grow place-items-start p-3">
        <div class="flex mb-3">
          <div class="w-1 h-6 bg-error rounded me-3"></div>
          <h3 class="font-bold mb-3">Urgent Post</h3>
        </div>
        <ul>
          @foreach ($urgent_jobposts as $urgent_jobpost)
          <li><i class="fa-regular fa-hand-point-right me-2 text-red-700"></i><a href="" class="text-red-500">{{ $urgent_jobpost->post_title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="divider lg:divider-horizontal"></div>
      <div class="card rounded-none rounded-box grid grow place-items-start p-3">
        <div class="flex mb-3">
          <div class="w-1 h-6 bg-error rounded me-3"></div>
          <h3 class="font-bold mb-3">Featured Post</h3>
        </div>
        <ul>
          @foreach ($featured_jobposts as $featured_jobpost)
          <li><i class="fa-regular fa-hand-point-right text-blue-700 me-2"></i><a href="" class="text-blue-500">{{ $featured_jobpost->post_title }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

      <div class="divider"></div>


      <div class="flex w-full flex-col lg:flex-row gap-4">

      <!-- STATES -->
      <div class="card rounded-none bg-base-200 max-h-48 overflow-y-auto rounded-box grow p-4">
        <div class="flex mb-3">
          <div class="w-1 h-6 bg-error rounded me-3"></div>
          <h3 class="font-bold mb-3">Subcategory</h3>
        </div>

        <div class="flex flex-wrap gap-2">
          @foreach ($subcategories as $subcategory)
          <a class="btn btn-primary btn-outline btn-sm" href="{{ route('link', ['type' => 'subcategory', 'slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
          @endforeach
        </div>
      </div>

      <!-- CATEGORIES -->
      <div class="card rounded-none bg-base-200 rounded-box grow p-4">
        <div class="flex mb-3">
          <div class="w-1 h-6 bg-error rounded me-3"></div>
          <h3 class="font-bold mb-3">Types</h3>
        </div>

        <div class="flex flex-wrap gap-2">
          @foreach ($types as $type)
          <a class="btn btn-success btn-sm" href="{{ route('link', ['type' => 'type', 'slug' => $type->slug]) }}"><i class="fa-solid fa-hashtag"></i>{{ $type->name }}</a>
          @endforeach
        </div>
      </div>

    </div>

    </section>


@endsection
<!-- dynamic content end here -->