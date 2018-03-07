<?php

namespace App\Interfaces;

use App\Country;
use Illuminate\Support\Collection;

interface CountryInterface {
    /**
     * @param $id
     * @return Country
     */
    public function find($id);

    /**
     * @param $name
     * @param $key
     * @return Collection
     */
    public function pluck($name, $key);

}