<?php

namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Routing\Controller as BaseController;

class CatalogController extends BaseController
{
    public function trending(TmdbService $service)
    {
        return $service->getTrending();
    }

    public function movie($id, TmdbService $service)
    {
        try {
            $movie = $service->getMovie($id);
            return $movie;
        } catch (\Exception $exception) {
            return $exception->getCode();
        }
    }

    public function discover(TmdbService $service)
    {
        $genres = json_decode($service->getGenres());
        $arrListDiscover = [];

        foreach ($genres->genres as $genre) {

              $discover = json_decode($service->getDiscover($genre->id));

              if($discover->results > 0){
                  $arrListDiscover[] = [
                      'id' => $genre->id,
                      'name' => $genre->name,
                      'item' => $discover,
                  ];
              }
        }

        return $arrListDiscover;
    }

    public function genres(TmdbService $service)
    {
        return $service->getGenres();
    }
}
