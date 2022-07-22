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
  <p class="text-center font-semibold text-lg md:text-xl lg:text-2xl">Search City</p>
</div>

<form action="">
  <div class="mt-5 flex justify-center">
    <input type="text" class="border border-black rounded-lg w-64 sm:w-96 h-12 p-2 focus:ring-2">
  </div>
  <div class="flex justify-center mt-5">
    <button class="bg-dark-blue px-8 py-2 rounded-full text-white hover:bg-hover-blue">SEARCH</button>
  </div>
</form>
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