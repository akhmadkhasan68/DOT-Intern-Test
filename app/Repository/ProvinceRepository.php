<?php
namespace App\Repository;

use App\Models\Province;

class ProvinceRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new Province();
    }

    /**
     * [Description for getAllProvince]
     *
     * @return Collection
     * 
     */
    public function getAllProvince()
    {
        try {
            return $this->model->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}