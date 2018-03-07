<?php

namespace App\Interfaces;

use App\City;
use Illuminate\Support\Collection;

interface CityInterface {
    /**
     * @param $id
     * @return City
     */
	public function find($id);

    /**
     * @param $name
     * @return City
     */
    public function findByName($name);

    /**
     * @param $name
     * @return Collection
     */
    public function findByCountry($name);

    /**
     * @param $name
     * @param $key
     * @return Collection
     */
    public function pluck($name, $key);

}