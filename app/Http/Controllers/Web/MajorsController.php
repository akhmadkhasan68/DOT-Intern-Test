<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorsRequest;
use App\Repository\MajorsRepository;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    protected $repository;
    
    public function __construct(MajorsRepository $repository)
    {
        $this->repository = $repository;    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view("majors.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("majors.create");
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
                "message" => "Success create data",
                "redirect" => route("majors.index"),
                "data" => $data
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error create data"
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

            return view("majors.detail", compact("data"));
        } catch (\Exception $e) {
            report($e);
            abort($e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->repository->getDetailMajor($id);
    
            return view("majors.edit", compact("data"));
        } catch (\Exception $e) {
            report($e);
            abort($e->getCode());
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
                "message" => "Success create data",
                "redirect" => route("majors.index"),
                "data" => $data
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error udpate data"
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
                "message" => "Success delete data",
                "data" => $data
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "data" => [],
                "message" => "Error delete data"
            ], $e->getCode());
        }
    }
}
