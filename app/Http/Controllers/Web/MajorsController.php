<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorsRequest;
use App\Repository\MajorsRepository;

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
        $data = $this->repository->getAllMajors(false);
        
        return view("majors.index", compact("data"));
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
            $this->repository->createMajor($request);

            return back();
        } catch (\Exception $e) {
            report($e);
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
            // abort(404, 'Oops...Not found!');
            report($e);
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
            $this->repository->updateMajor($request, $id);
    
            return back();
        } catch (\Exception $e) {
            report($e);
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
            $this->repository->deleteMajor($id);
    
            return back();
        } catch (\Exception $e) {
            report($e);
        }
    }
}
