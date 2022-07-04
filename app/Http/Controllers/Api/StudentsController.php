<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentsRequest;
use App\Repository\StudentsRepository;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $repository;

    /**
     * @param StudentsRepository $repository
     * 
     */
    public function __construct(StudentsRepository $repository)
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
            $data = $this->repository->getAllStudents();

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
    public function store(StudentsRequest $request)
    {
        try {
            $data = $this->repository->createStudent($request);

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
            $data = $this->repository->getDetailStudent($id);

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
    public function update(Request $request, $id)
    {
        try {
            $data = $this->repository->updateStudent($request, $id);

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
            $data = $this->repository->deleteStudent($id);

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
