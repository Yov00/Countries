<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {

        $title = "Home";
        $orderByValue = 'asc';
        $orderByKey = 'name';
        $check = 'not updated';
        // Sorting filters logic
        if (request('name')) {
            $orderByValue = request('name');
            $orderByKey = 'name';
        } else if (request('population')) {
            $orderByValue = request('population');
            $orderByKey = 'population';
        }

        $countries = Country::all();

        // updated comparison
        if (strtotime($countries->first()->updated) < strtotime('-2 minutes')) {
            $check = "updated";
        // Clear countries talbe in the DB
            Country::truncate();

            $client = new Client();
            $response = $client->get("https://restcountries.eu/rest/v2/all");
            $data = $response->getBody();
            $response = json_decode($data);

            foreach ($response as $res) {
                Country::create([
                    'name' => $res->name,
                    'flag' => $res->flag,
                    'population' => $res->population,
                    'capital' => $res->capital,
                    'updated' => date('Y-m-d H:i:s')

                ]);
            }
            // Loading up the countries
            $countries = Country::orderBy($orderByKey, $orderByValue)->get();
            return view('index')->with([
                'title' => $title,
                'countries' => $countries,
                'orderByValue' => $orderByValue,
                'orderByKey' =>  $orderByKey,
                'check' => $check
            ]);
        } else {
            $countries = Country::orderBy($orderByKey, $orderByValue)->get();
            return view('index')->with([
                'title' => $title,
                'countries' => $countries,
                'orderByValue' => $orderByValue,
                'orderByKey' =>  $orderByKey,
                'check' => $check = 'not updated'
            ]);
        }
    }



    public function show(Country $country)
    {
        $title = $country->name;
        return view('country_show')->with([
            'country' => $country,
            'title' => $title
        ]);
    }














    public function store()
    {
        $client = new Client();
        $response = $client->get("https://restcountries.eu/rest/v2/all");
        $data = $response->getBody();
        $response = json_decode($data);

        foreach ($response as $res) {
            Country::create([
                'name' => $res->name,
                'flag' => $res->flag,
                'population' => $res->population,
                'capital' => $res->capital,
                'updated' => date('Y-m-d H:i:s')

            ]);
        }

        return redirect()->action(
            'CountryController@index'
        );
    }

    public function search()
    {
        $countrySearch = request('countrySearch');
        $client = new Client();
        $response = $client->get("https://restcountries.eu/rest/v2/all");
        $data = $response->getBody();
        $response = json_decode($data); //--> Мога ли да ползвам в друг метод
        //-->  на контролера без да правя повторен get($url)
        $title = "Searching for " . $countrySearch;



        return view('search')->with([
            'countrySearch' => $countrySearch,
            'response' => $response,
            'title' => $title
        ]);
    }

    public function destroy()
    { }
}
