<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\ProvinceRepository;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $repository;

    public function __construct(ProvinceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        try {
            $data = $this->repository->getAllProvince();

            return response()->success($data, "Success while load data");
        } catch (\Exception $e) {
            report($e);
            return response()->error("Error while load data", $e->getCode());
        }
    }
}
