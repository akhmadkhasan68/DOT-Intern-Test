<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\RegencyRepository;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    protected $repository;

    public function __construct(RegencyRepository $repository)
    {
        $this->repository = $repository;    
    }

    public function index()
    {
        try {
            $data = $this->repository->getAllRegency();

            return response()->json([
                "error" => false,
                "data" => $data,
                "message" => "Success while load data"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error while load data"
            ], $e->getCode());
        }
    }

    public function getByProvince($province_id)
    {
        try {
            $data = $this->repository->getByProvince($province_id);

            return response()->json([
                "error" => false,
                "data" => $data,
                "message" => "Success while load data"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error while load data"
            ], $e->getCode());
        }
    }
}
