@extends('layout.index')

@section('title', trim($jobpost->title))

@section('meta_description', $jobpost->description)

@section('meta_keywords', $jobpost->keywords)

@section('content')
  <section class="bg-base-200 p-6 md:p-10">

    <!-- Breadcrumb -->
    <!-- <div class="text-sm breadcrumbs mb-6">
        <ul>
          <li>Home</li>
          <li>Jobs</li>
          <li>Software Engineer</li>
        </ul>
      </div> -->

    <!-- Job Header -->
    <div class="card bg-yellow-300 rounded-none mb-8">
      <div class="card-body md:flex-row justify-between items-center">
        <div class="flex items-center gap-4">
          <div class="avatar placeholder">
            <div class="bg-error text-white rounded-lg w-14">
              <img
                src="{{ $jobpost->companyDetail->logo ? asset('storage/' . $jobpost->companyDetail->logo) : 'https://d2jhcfgvzjqsa8.cloudfront.net/storage/2022/04/download.png' }}"
                alt="">
            </div>
          </div>
          <div>
            <h1 class="text-2xl font-bold">{{ $jobpost->post_title }}</h1>
            <p>{{ $jobpost->companyDetail->name }}</p>
          </div>
        </div>

        <a href="{{ $jobpost->apply_link }}" target="_blank" class="my-btn bg-blue-400 text-white mt-4 md:mt-0">
          Apply Now
        </a>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="grid lg:grid-cols-12 gap-6">

      <!-- LEFT CONTENT -->
      <div class="lg:col-span-8 space-y-6">

        <!-- Job Overview -->
        <div class="card rounded-none">
          <h3 class="font-bold text-lg mb-3 text-white  bg-pink-500 p-3">
            Job Overview
          </h3>
          <div class="card-body">

            <ul class="space-y-2">
              <li><b>Job Title:</b> {{ $jobpost->post_title }}</li>
              <li><b>Company:</b> {{ $jobpost->companyDetail->name }}</li>
              <li><b>Location:</b> {{ $jobpost->location }}</li>
              <!-- <li><b>Job Type:</b> </li> -->
              <!-- <li><b>Experience:</b> {{ $jobpost->experience }}</li> -->
              <li><b>Salary:</b> {{ $jobpost->salary }}</li>
            </ul>
          </div>
        </div>

        <!-- Description -->
        <div class="card rounded-none">
          <h3 class="font-bold text-lg mb-3 text-white bg-blue-500 p-3 ">
            Job Description
          </h3>
          <div class="card-body">
            <div class="mb-3">
              <img
                src="{{ $jobpost->cover_photo ? asset('storage/' . $jobpost->cover_photo) : 'https://placehold.co/600x300/000000/FFFFFF/png?text=Poster Image' }}"
                alt="{{ $jobpost->post_title }}">
            </div>

            {!! $jobpost->content !!}

            <div class="overflow-x-auto rounded-none shadow-[8px_8px_0px_#000] border-2 border-black bg-base-100 mt-3">
              <table class="table">
                <!-- head -->
                <thead class="bg-blue-500 text-white">
                  <tr>
                    <th>Name</th>
                    <th>Link</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->

                  @foreach ($jobpost->media as $media)
                    <tr>
                      <td>{{ $media->file_name }}</td>
                      <td><a href="{{ $media->file_path }}" target="_blank" class="underline text-blue-600 font-black">Click
                          here..</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="flex justify-center mt-6">
              <a href="{{ $jobpost->apply_link }}" target="_blank" class="my-btn pl-8 pr-8 bg-green-500 font-black">
                Apply Now
              </a>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR -->
      <aside class="lg:col-span-4 space-y-6">

        <!-- Job Summary -->
        <div class="card rounded-none">
          <h3 class="font-bold bg-blue-500 p-3 text-white">Job Summary</h3>
          <div class="card-body">
            <p>📍 {{ $jobpost->location }}</p>
            <!-- <p>💼 Full Time</p> -->
            <!-- <p>⭐ 2–4 Years</p> -->
            <p>💰 {{ $jobpost->salary }}</p>
            <p>
              @foreach ($jobpost->types as $jobType)
                <a class="underline text-blue-600"
                  href="{{ route('link', ['type' => 'type', 'slug' => $jobType->slug]) }}"><i
                    class="fa-solid fa-hashtag me-1"></i>{{ $jobType->name }}</a>
              @endforeach
            </p>
          </div>
        </div>

        <!-- Company Info -->
        <div class="card bg-base-100 rounded-none">

          <div class="bg-pink-500 text-white p-4 ">
            <h3 class="text-lg font-bold text-center">Company Info</h3>
          </div>

          <div class="card-body text-center">

            {{-- Company Name --}}
            <h2 class="text-xl font-semibold">
              {{ $jobpost->companyDetail->name }}
            </h2>

            {{-- Description --}}
            <p class="text-sm text-gray-500 mb-3">
              {{ $jobpost->companyDetail->description }}
            </p>

            {{-- Toggle Button --}}
            <button onclick="toggleCompanyInfo()" class="my-btn bg-green-500 mt-2">
              View Company Profile
            </button>

            {{-- Hidden Section --}}
            <div id="companyExtraInfo" class="hidden mt-5 space-y-4 text-sm">

              {{-- Website --}}
              <div class="flex items-center justify-center gap-2 p-3 bg-base-200 rounded-lg shadow-sm">
                <i class="fa-solid fa-globe text-primary"></i>
                <a href="{{ $jobpost->companyDetail->website }}" target="_blank" class="link link-primary break-all">
                  {{ $jobpost->companyDetail->website }}
                </a>
              </div>

              {{-- Email --}}
              <div class="flex items-center justify-center gap-2 p-3 bg-base-200 rounded-lg shadow-sm">
                <i class="fa-solid fa-envelope text-secondary"></i>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $jobpost->companyDetail->email }}"
                  target="_blank" class="link link-secondary break-all">
                  {{ $jobpost->companyDetail->email }}
                </a>
              </div>

              {{-- Phone --}}
              <div class="flex items-center justify-center gap-2 p-3 bg-base-200 rounded-lg shadow-sm">
                <i class="fa-solid fa-phone text-accent"></i>
                <a href="tel:{{ $jobpost->companyDetail->phone }}" class="link link-accent">
                  {{ $jobpost->companyDetail->phone }}
                </a>
              </div>

            </div>
          </div>
        </div>

        <!-- Share -->
        <div class="card rounded-none">
          <h3 class="font-bold bg-[#1A77F2] p-3 text-white ">Share Job</h3>
          <div class="card-body text-center">
            <div class="flex justify-center gap-4 text-xl">


              {{-- check korchilam --}}
              <!-- <a href="{{ request()->fullUrl() }}"
                     target="_blank"
                     class="btn btn-circle bg-blue-600 text-white">
                      <i class="fa-brands fa-facebook-f"></i>
                  </a> -->

              {{-- Facebook --}}
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
                class="btn btn-circle bg-blue-600 text-white">
                <i class="fa-brands fa-facebook-f"></i>
              </a>

              {{-- whatsapp--}}
              <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" target="_blank"
                class="btn btn-circle bg-green-500 text-white">
                <i class="fa-brands fa-whatsapp"></i>
              </a>

              {{-- Twitter --}}
              <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($jobpost->post_title) }}"
                target="_blank" class="btn btn-circle bg-black text-white">
                <i class="fa-brands fa-x-twitter"></i>
              </a>

              {{-- LinkedIn --}}
              <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                target="_blank" class="btn btn-circle bg-blue-800 text-white">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>

            </div>
          </div>
        </div>

        <!-- Save Job -->
        <!-- <div class="card shadow-md">
            <h3 class="font-bold bg-warning p-3 text-white">Save Job</h3>
            <div class="card-body text-center">
              <button class="btn btn-success btn-sm">
                Save Job
              </button>
            </div>
          </div> -->

      </aside>

    </div>

  </section>


@endsection