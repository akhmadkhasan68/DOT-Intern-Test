<?php
namespace App\Repository;

use App\Models\Regency;

class RegencyRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new Regency();
    }

    /**
     * [Description for getAllRegency]
     *
     * @return Collection
     * 
     */
    public function getAllRegency()
    {
        try {
            return $this->model->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getByProvince(Int $province_id)
    {
        try {
            return $this->model->where("province_id", $province_id)->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}