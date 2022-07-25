<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    public function getData(Request $request)
    {
        $city = urlencode($request->city);

        for ($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', strtotime(' +' . $i . ' day'));

            $url[$i] = "http://api.weatherapi.com/v1/forecast.json?key=88d1b5ce876049b899232737222207&q=$city&dt=$date";
            $response[$i] = file_get_contents($url[$i]);
            $newData[$i] = json_decode($response[$i]);
        }

        if (intval($newData[0]->current->uv) < 3) {
            $uv_index_status = 'Low';
        } else if (intval($newData[0]->current->uv) < 6) {
            $uv_index_status = 'Moderate';
        } else if (intval($newData[0]->current->uv) < 8) {
            $uv_index_status = 'High';
        } else if (intval($newData[0]->current->uv) < 11) {
            $uv_index_status = 'Very High';
        } else if (intval($newData[0]->current->uv) >= 11) {
            $uv_index_status = 'Extreme';
        }

        if (intval($newData[0]->current->humidity) < 25) {
            $humidity_status = 'Too Dry';
        } else if (intval($newData[0]->current->humidity) < 30) {
            $humidity_status = 'Fair';
        } else if (intval($newData[0]->current->humidity) < 60) {
            $humidity_status = 'Comfortable';
        } else if (intval($newData[0]->current->humidity) < 70) {
            $humidity_status = 'Fair';
        } else if (intval($newData[0]->current->humidity) <= 100) {
            $humidity_status = 'Too Humid';
        }

        if ($newData[0]->current->vis_km < 0.05) {
            $vis_status = 'Dense Fog';
        } else if ($newData[0]->current->vis_km < 0.2) {
            $vis_status = 'Thick Fog';
        } else if ($newData[0]->current->vis_km < 0.5) {
            $vis_status = 'Moderate Fog';
        } else if ($newData[0]->current->vis_km < 1.0) {
            $vis_status = 'Light Fog';
        } else if ($newData[0]->current->vis_km < 2.0) {
            $vis_status = 'Thin Fog';
        } else if ($newData[0]->current->vis_km < 4.0) {
            $vis_status = 'Haze';
        } else if ($newData[0]->current->vis_km < 10.0) {
            $vis_status = 'Light Haze';
        } else if ($newData[0]->current->vis_km < 20.0) {
            $vis_status = 'Clear';
        } else if ($newData[0]->current->vis_km < 50.0) {
            $vis_status = 'Very Clear';
        } else if ($newData[0]->current->vis_km >= 50.0) {
            $vis_status = 'Exceptionally Clear';
        }


        // dd(date('H', strtotime($newData[0]->forecast->forecastday[0]->hour[0]->time)));
        // dd($newData[0]->forecast->forecastday[0]->hour[2]);

        $x = 0;
        for ($i = 0; $i < 23; $i++) {
            if (date('H', strtotime($newData[0]->location->localtime)) < date('H', strtotime($newData[0]->forecast->forecastday[0]->hour[$i]->time))) {
                $dayForecast[$x] = $newData[0]->forecast->forecastday[0]->hour[$i];
                $x++;
            }
        }
        $y = 0;
        while (count($dayForecast) < 23) {
            $dayForecast[$x] = $newData[1]->forecast->forecastday[0]->hour[$y];
            $x++;
            $y++;
        }

        return view('weather', [
            'weatherData' => $newData,
            'uv_index' => $uv_index_status,
            'humidity_status' => $humidity_status,
            'vis_status' => $vis_status,
            'dayForecast' => $dayForecast
        ]);
    }
}
