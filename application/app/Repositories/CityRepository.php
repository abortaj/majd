<?php

namespace App\Repositories;

use App\Interfaces\CityInterface;
use App\City;
use Illuminate\Support\Collection;

/**
 * Class CityRepository
 * @package App\Repositories
 */
class CityRepository implements CityInterface
{
    /**
     * @var City
     */
    public $city;

    /**
     * CityRepository constructor.
     * @param City $city
     */
    function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * @param $id
     * @return City
     */
    public function find($id)
    {
        return $this->city->findOrFail($id);
    }

    /**
     * @param $name
     * @return City
     */
    public function findByName($name)
    {
        return $this->city->where('name',$name)->firstOrFail();
    }

    /**
     * @param $country
     * @return Collection
     */
    public function findByCountry($country)
    {
        return $this->city->where('country_id',$country)->get();
    }

    /**
     * @param $column
     * @param $key
     * @return \Illuminate\Support\Collection
     */
    public function pluck($column,$key)
    {
        return $this->city->pluck($column,$key);
    }


}