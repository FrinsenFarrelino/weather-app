@extends('layouts.main')

@section('container')

<div class="md:flex h-full">
  <div class="bg-dark-blue pb-10 px-7 text-white md:w-1/3 flex flex-col justify-between">
    <div class="pt-5">
      <p class="text-center font-semibold text-lg md:text-xl lg:text-2xl">Search City</p>
    </div>
    
    <form action="/weather" method="GET">
      <div class="mt-5 flex justify-center text-black">
        <label class="relative block sm:w-96">
          <input
          class="w-full text-md bg-white placeholder:font-italitc border border-slate-300 rounded-full py-2 pl-4 pr-12 focus:outline-none"
          placeholder="Search here" type="text" name="city" value="{{ $weatherData[0]->location->name }}, {{ $weatherData[0]->location->region }}, {{ $weatherData[0]->location->country }}"/>
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
  
    <div class="mt-4 flex justify-center">
      <img src="{{ $weatherData[0]->current->condition->icon }}" width="80" alt="">
    </div>
  
    <div class="flex -mt-4 justify-center">
      <p>{{ $weatherData[0]->current->condition->text }}</p>
    </div>

    <div class="mt-8">
      <div class="flex justify-center">
        <p class="font-bold text-lg">Current Temperature</p>
      </div>
      <div class="flex justify-center">
        <p class="text-8xl font-semibold">{{ intval($weatherData[0]->current->temp_c) }}°C</p>
      </div>
    </div>
  
    <div class="mt-10">
      <div class="flex justify-center mb-3">
        <p class="font-bold text-lg">Local Time</p>
      </div>
      <div class="flex justify-between">
        <div>
          <p class="text-base font-semibold">Date</p>
          <p>{{ date('F d, Y', strtotime($weatherData[0]->location->localtime)) }}</p>
        </div>
        <div>
          <p class="text-base font-semibold text-end">Time</p>
          <p class="text-end">{{ date('h:i A', strtotime($weatherData[0]->location->localtime)) }}</p>
        </div>
      </div>
    </div>
  
    <div class="mt-10">
      <div class="flex justify-center mb-3">
        <p class="font-bold text-lg">Position</p>
      </div>
      <div class="flex justify-between">
        <div>
          <p class="text-base font-semibold">Lattitude</p>
          <p>{{ $weatherData[0]->location->lat }}</p>
        </div>
        <div>
          <p class="text-base font-semibold text-end">Longitude</p>
          <p class="text-end">{{ $weatherData[0]->location->lon }}</p>
        </div>
      </div>
    </div>
  
    <div class="flex justify-center text-black font-semibold">
      <div class="mt-8 w-72 h-24 px-3 py-3 bg-white rounded-2xl flex flex-col justify-center">
        <div class="flex justify-center">
          <p>{{ $weatherData[0]->location->name }}</p>
        </div>
        <div class="flex justify-center text-center">
          <p>{{ $weatherData[0]->location->region }}, </p>
          <p>{{ $weatherData[0]->location->country }}</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="h-full md:w-2/3">
    <div class="h-full pt-4 pb-2">
      <p class="font-bold text-center mb-2">Today Status</p>
      <div class="flex flex-wrap justify-center items text-center">
        <div class="bg-white border-[3px] border-green-500 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">Humidity</p>
            </div>
            <div class="flex items-end justify-center">
              <p class="text-5xl font-semibold">{{ intval($weatherData[0]->current->humidity) }}</p>
              <p>%</p>
            </div>
            <div>
              <p class="text-xs">{{ $humidity_status }}</p>
            </div>
          </div>
        </div>
        <div class="bg-white border-[3px] border-violet-500 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">UV Index</p>
            </div>
            <div>
              <p class="text-5xl font-semibold">{{ intval($weatherData[0]->current->uv) }}</p>
            </div>
            <div>
              <p class="text-xs">{{ $uv_index }}</p>
            </div>
          </div>
        </div>
        <div class="bg-white border-[3px] border-cyan-400 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">Wind Status</p>
            </div>
            <div class="flex justify-center items-end">
              <p class="text-5xl font-semibold">{{ intval($weatherData[0]->current->wind_kph) }}</p>
              <p>km/h</p>
            </div>
            <div class="flex justify-center">
              <img src="./assets/icon/direction.svg" alt="" class="mr-2">
              <p>{{ $weatherData[0]->current->wind_dir }}</p>
            </div>
          </div>
        </div>
        <div class="bg-white border-[3px] border-yellow-200 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">Feels Like</p>
            </div>
            <div class="flex items-end justify-center">
              <p class="text-7xl font-semibold">{{ intval($weatherData[0]->current->feelslike_c) }}</p>
              <p>°C</p>
            </div>
          </div>
        </div>
        <div class="bg-white border-[3px] border-slate-200 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">Visibility</p>
            </div>
            <div class="flex items-end justify-center">
              <p class="text-5xl font-semibold">{{ intval($weatherData[0]->current->vis_km) }}</p>
              <p>km</p>
            </div>
            <div>
              <p class="text-xs">{{ $vis_status }}</p>
            </div>
          </div>
        </div>
        <div class="bg-white border-[3px] border-orange-500 w-36 h-36 md:w-[135px] md:h-[135px] lg:w-36 lg:h-36 mx-3 my-3 lg:mx-7 rounded-2xl flex py-4 px-4 md:py-3 md:px-3 lg:py-4 lg:px-4">
          <div class="text-center w-full flex flex-col justify-between">
            <div>
              <p class="font-semibold">Sunrise & Sunset</p>
            </div>
            <div class="flex items-end justify-between">
              <div>
                <img src="./assets/icon/sunrise.svg" alt="" class="mb-2">
                <img src="./assets/icon/sunset.svg" alt="">
              </div>
              <div>
                <p class="mb-2">{{ $weatherData[0]->forecast->forecastday[0]->astro->sunrise }}</p>
                <p>{{ $weatherData[0]->forecast->forecastday[0]->astro->sunset }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="h-full pt-4 pb-2 px-7">
      <p class="font-bold text-center mb-2">24-Hour Forecast</p>
      <div class="flex overflow-x-auto scrolling-touch">
        @for ($i = 0; $i < count($dayForecast); $i++)
          <div class="flex-none w-20 h-40 bg-slate-200 rounded-lg mr-3 my-3 px-1 py-1">
            <div class="w-full h-full text-center flex flex-col justify-between">
                <p class="text-sm -mb-1">{{ date('h:i A', strtotime($dayForecast[$i]->time)) }}</p>
                <img src="{{ $dayForecast[$i]->condition->icon }}" width="55" alt="" class="-mb-1 mx-auto">
                <p class="text-xs">{{ $dayForecast[$i]->condition->text }}</p>
                <p class="font-semibold">{{ intval($dayForecast[$i]->temp_c) }}°C</p>
            </div>
          </div>
        @endfor
      </div>
    </div>

    <p class="pt-4 font-bold text-center mb-2">One-Week Forecast</p>
    <div class="h-full pb-2 px-7 flex justify-center">
      <div class="flex overflow-x-auto scrolling-touch">
        @for ($i = 0; $i < count($weatherData); $i++)
          <div class="flex-none w-20 h-44 bg-slate-200 rounded-lg mr-3 my-3 px-1 py-1">
            <div class="w-full h-full text-center flex flex-col justify-between">
              @if ($i == 0)
                <p class="text-sm -mb-1">Today</p>
                <img src="{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->icon }}" width="55" alt="" class="-mb-1 mx-auto">
                <p class="text-xs">{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->text }}</p>
                <p class="font-semibold">{{ intval($weatherData[$i]->forecast->forecastday[0]->day->maxtemp_c) }} / {{ intval($weatherData[$i]->forecast->forecastday[0]->day->mintemp_c) }}°C</p>
                <p>{{ intval($weatherData[$i]->forecast->forecastday[0]->day->avghumidity) }}%</p>
              @elseif ($i == 1)
                <p class="text-sm -mb-1">Tomorrow</p>
                <img src="{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->icon }}" width="55" alt="" class="-mb-1 mx-auto">
                <p class="text-xs">{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->text }}</p>
                <p class="font-semibold">{{ intval($weatherData[$i]->forecast->forecastday[0]->day->maxtemp_c) }} / {{ intval($weatherData[$i]->forecast->forecastday[0]->day->mintemp_c) }}°C</p>
                <p>{{ intval($weatherData[$i]->forecast->forecastday[0]->day->avghumidity) }}%</p>
              @else 
                <p class="text-sm -mb-1">{{ date('F d', strtotime($weatherData[$i]->forecast->forecastday[0]->date)) }}</p>
                <img src="{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->icon }}" width="55" alt="" class="-mb-1 mx-auto">
                <p class="text-xs">{{ $weatherData[$i]->forecast->forecastday[0]->day->condition->text }}</p>
                <p class="font-semibold">{{ intval($weatherData[$i]->forecast->forecastday[0]->day->maxtemp_c) }} / {{ intval($weatherData[$i]->forecast->forecastday[0]->day->mintemp_c) }}°C</p>
                <p>{{ intval($weatherData[$i]->forecast->forecastday[0]->day->avghumidity) }}%</p>
              @endif
            </div>
          </div>
        @endfor
      </div>
    </div>
    
    <div class="mt-4 mb-10 flex justify-center">
      <a href="/"><button class="border px-7 py-2 rounded-full border-dark-blue text-dark-blue hover:bg-dark-blue hover:text-white">Back to Home</button></a>
    </div>
  </div>
</div>

@endsection