@extends('layouts.main')

@section('container')
{{-- Navbar section --}}
<nav class="bg-dark-blue h-28 sm:h-32 md:h-36 lg:h-40">
  <div class="text-center">
    <div class="pt-6">
      <p class="text-white text-xs sm:text-sm md:text-md lg:text-lg">Weather Data & Forecast</p>
    </div>
    <div class="mt-4">
      <p class="text-white text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">CHECK WEATHER REPORT</p>
    </div>
  </div>
</nav>
{{-- End of navbar section --}}

{{-- Search section --}}
<div class="mt-10 md:mt-12">
  <p class="text-center font-semibold text-lg md:text-xl lg:text-2xl">Search City or Regency</p>
</div>

<form action="/weather" method="GET">
  <div class="mt-5 flex justify-center">
    <label class="relative block sm:w-96">
      <input
      class="w-full text-md bg-white placeholder:font-italitc border border-slate-300 rounded-full py-2 pl-4 pr-12 focus:outline-none"
      placeholder="Search here" type="text" name="city"/>
      <span class="absolute inset-y-0 right-0 flex items-center pr-3">
        <button type="submit">
          <svg class="h-5 w-5 fill-black" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30"
              height="30" viewBox="0 0 30 30">
              <path
                  d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
              </path>
          </svg>
        </button>
      </span>
    </label>
  </div>
</form>

<div>
  <p class="text-center text-sm text-slate-400">(e.g : Surabaya, Indonesia)</p>
</div>
{{-- End of search section --}}

{{-- We serve you data of section --}}
<div class="mt-10 mb-4 md:mb-6 lg:mb-8">
  <p class="text-center text-lg md:text-xl lg:text-2xl font-semibold">We serve you data of</p>
</div>

<div class="flex flex-wrap h-auto justify-center mb-8">
  <div>
    <div class="bg-dark-blue w-36 h-36 sm:h-44 sm:w-44 mx-3 my-3 lg:mx-7 rounded-3xl flex">
      <div class="m-auto">
        <img src="./assets/icon/temperature.svg" alt="" width="80">
      </div>
    </div>
    <div class="flex justify-center">
      <p>Temperature</p>
    </div>
  </div>
  <div>
    <div class="bg-dark-blue w-36 h-36 sm:h-44 sm:w-44 mx-3 my-3 lg:mx-7 rounded-3xl flex">
      <div class="m-auto">
        <img src="./assets/icon/weather.svg" alt="" width="80">
      </div>
    </div>
    <div class="flex justify-center">
      <p>Weather</p>
    </div>
  </div>
  <div>
    <div class="bg-dark-blue w-36 h-36 sm:h-44 sm:w-44 mx-3 my-3 lg:mx-7 rounded-3xl flex">
      <div class="m-auto">
        <img src="./assets/icon/wind.svg" alt="" width="80">
      </div>
    </div>
    <div class="flex justify-center">
      <p>Wind</p>
    </div>
  </div>
  <div>
    <div class="bg-dark-blue w-36 h-36 sm:h-44 sm:w-44 mx-3 my-3 lg:mx-7 rounded-3xl flex">
      <div class="m-auto">
        <img src="./assets/icon/humidity.svg" alt="" width="80">
      </div>
    </div>
    <div class="flex justify-center">
      <p>Humidity</p>
    </div>
  </div>
</div>
{{-- End of We serve you data of section--}}

@endsection