<!-- extends the main layout -->
@extends('layout.index')

@section('title', 'All Jobs Page')
<!-- dynamic content -->
@section('content')

  <section class="pt-12 pb-8 px-6 md:px-8 bg-base-200">

    <!-- ROW 3 : POSTS 8 | 4 -->
    <div class="mb-8">

        <!-- HEADING -->
    <h2 class="text-4xl font-black">
      @if(isset($filterType) && isset($filterName))

          @if($filterType === 'category')
              Jobs in <a class="underline text-blue-600"><i class="fa-solid fa-tag"></i>{{ $filterName }}</a> Category

          @elseif($filterType === 'subcategory')
              <a class="underline text-blue-600"><i class="fa-solid fa-tags"></i>{{ $filterName }}</a> Jobs Available

          @elseif($filterType === 'type')
              <a class="underline text-blue-600"><i class="fa-solid fa-hashtag"></i>{{ $filterName }}</a> Type Jobs

          @elseif($filterType === 'state')
              Jobs in <a class="underline text-blue-600"><i class="fa-solid fa-location-dot"></i>{{ $filterName }}</a>

          @elseif($filterType === 'urgent')
              All Urgent Jobs
          @elseif($filterType === 'featured')
              All Featured Jobs
          @else
              All Jobs

          @endif

      @else
          All Jobs
      @endif
  </h2>

  <div class="divider"></div>

    @forelse ($jobposts as $jobpost)
      <!-- Job Card -->
      <div class="card bg-base-100 rounded-none mt-3 mb-3">
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

          <a class="my-btn bg-yellow-400 btn-sm h-10" href="{{ route('post_link', ['slug' => $jobpost->slug]) }}">
            View Details →
          </a>

        </div>
      </div>
    @empty
      <section class="bg-red-400 
                    border-4 border-black 
                    shadow-[8px_8px_0px_#000] 
                    p-10 text-center my-10">

        <h2 class="text-3xl font-black mb-4">
            🚫 No Jobs Found
        </h2>

        <p class="font-semibold text-lg mb-6">
            Sorry! We couldn’t find any job posts matching your search.
        </p>

        <a href="{{ route('home') }}"
           class="inline-block bg-yellow-500 
                  border-4 border-black 
                  px-6 py-3 
                  font-black 
                  shadow-[4px_4px_0px_#000] 
                  hover:shadow-none 
                  hover:translate-x-1 
                  hover:translate-y-1 
                  transition-all duration-150">
            🔎 Back to All Jobs
        </a>

    </section>
    @endforelse

    <div class="mt-4">
      {{ $jobposts->links() }}
    </div>


      </div>

  </section>


@endsection
<!-- dynamic content end here -->