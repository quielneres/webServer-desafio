<?php

namespace App\Services;


use Facade\FlareClient\Http\Client;

class TmdbService
{
    private $client;
    private $url_base;
    private $api_key;
    private $language;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->url_base = 'https://api.themoviedb.org/3';
        $this->api_key = 'api_key=4061191b8a16b48dba6a51a6733d53f6';
        $this->language = '&language=pt-BR';
    }

    public function getGenres()
    {
        $genres = $this->baseRequest('/genre/movie/list?');
         return $genres->getBody();
    }

    public function getDiscover($idGenre)
    {
        $discover = $this->baseRequest("/discover/movie?with_genres={$idGenre}&");
       return $discover->getBody();
    }

    public function getTrending()
    {
        $trending = $this->baseRequest("/trending/movie/day?");
        return $trending->getBody();
    }

    public function getMovie($id)
    {
        $movie = $this->baseRequest("/movie/{$id}?");
        return $movie->getBody();
    }

    private function baseRequest($route)
    {
        return $this->client->request(
            'GET',
            "{$this->url_base}{$route}{$this->api_key}{$this->language}"
        );
    }
}
