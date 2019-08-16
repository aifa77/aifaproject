<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;

if(!function_exists('movie'))
{
    function movie($url)
    {
        $base_url = 'https://api.themoviedb.org/3/';
        $client = new Client();
        $promise = $client->getAsync($base_url . $url)->then(
            function($response) {
                return $response->getBody();
            },
            function($exception) {
                return $exception->getMessage();
            }
        );
        $response = $promise->wait();
        $movies = json_decode($response, true);
        return $movies;
    }
}