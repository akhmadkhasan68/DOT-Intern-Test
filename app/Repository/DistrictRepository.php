<?php
namespace App\Repository;

use App\Models\District;

class DistrictRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new District();
    }

    /**
     * [Description for getAllDistrict]
     *
     * @return Collection
     * 
     */
    public function getAllDistrict()
    {
        try {
            return $this->model->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getByRegency(Int $regency_id)
    {
        try {
            return $this->model->where("regency_id", $regency_id)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}