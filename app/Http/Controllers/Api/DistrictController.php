<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\DistrictRepository;

class DistrictController extends Controller
{
    protected $repository;

    public function __construct(DistrictRepository $repository)
    {
        $this->repository = $repository;    
    }

    public function index()
    {
        try {
            $data = $this->repository->getAllDistrict();

            return response()->success($data, "Success while load data");
        } catch (\Exception $e) {
            report($e);
            return response()->error("Error while load data", $e->getCode());
        }
    }

    public function getByRegency($district_id)
    {
        try {
            $data = $this->repository->getByRegency($district_id);

            return response()->success($data, "Success while load data");
        } catch (\Exception $e) {
            report($e);
            return response()->error("Error while load data", $e->getCode());
        }
    }
}
