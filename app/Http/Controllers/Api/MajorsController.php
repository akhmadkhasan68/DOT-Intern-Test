<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorsRequest;
use App\Repository\MajorsRepository;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    protected $repository;

    /**
     * @param MajorsRepository $repository
     * 
     */
    public function __construct(MajorsRepository $repository)
    {
        $this->repository = $repository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = $this->repository->getAllMajors();

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MajorsRequest $request)
    {
        try {
            $data = $this->repository->createMajor($request);

            return response()->json([
                "error" => false,
                "data" => $data,
                "message" => "Success while creating data"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error while creating data"
            ], $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = $this->repository->getDetailMajor($id);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MajorsRequest $request, $id)
    {
        try {
            $data = $this->repository->updateMajor($request, $id);

            return response()->json([
                "error" => false,
                "data" => $data,
                "message" => "Success while updating data"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error while updating data"
            ], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = $this->repository->deleteMajor($id);

            return response()->json([
                "error" => false,
                "data" => $data,
                "message" => "Success while deleting data"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error while deleting data"
            ], $e->getCode());
        }
    }
}
