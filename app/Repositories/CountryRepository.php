<?php

namespace App\Repositories;

use App\Country;
use App\Interfaces\CountryInterface;

/**
 * Class CountryRepository
 * @package App\Repositories
 */
class CountryRepository implements CountryInterface
{
    /**
     * @var Country
     */
    public $country;

    /**
     * CountryRepository constructor.
     * @param Country $country
     */
    function __construct(Country $country)
    {
        $this->country = $country;
    }

    /**
     * @param $id
     * @return Country
     */
    public function find($id)
    {
        return $this->country->findOrFail($id);
    }

    /**
     * @param $column
     * @param $key
     * @return \Illuminate\Support\Collection
     */
    public function pluck($column,$key)
    {
        return $this->country->pluck($column,$key);
    }

}