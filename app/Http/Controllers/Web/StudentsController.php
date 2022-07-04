<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentsRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Repository\MajorsRepository;
use App\Repository\StudentsRepository;

class StudentsController extends Controller
{
    protected $studentsRepository;
    protected $majorsRepository;

    public function __construct(StudentsRepository $studentsRepository, MajorsRepository $majorsRepository)
    {
        $this->studentsRepository = $studentsRepository;
        $this->majorsRepository = $majorsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->studentsRepository->getAllStudents(false);

        return view("students.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $majors = $this->majorsRepository->getAllMajors(false);

        return view("students.create", compact("provinces", "regencies", "districts", "majors"));
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
            $this->studentsRepository->createStudent($request);

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
            $data = $this->studentsRepository->getDetailStudent($id);

            return view("students.detail", compact("data"));
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
            $provinces = Province::all();
            $regencies = Regency::all();
            $districts = District::all();
            $majors = $this->majorsRepository->getAllMajors(false);
            $data = $this->studentsRepository->getDetailStudent($id);

            return view("students.edit", compact("provinces", "regencies", "districts", "majors", "data"));
        } catch (\Exception $e) {
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
    public function update(StudentsRequest $request, $id)
    {
        try {
            $this->studentsRepository->updateStudent($request, $id);
    
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
            $this->studentsRepository->deleteStudent($id);
    
            return back();
        } catch (\Exception $e) {
            report($e);
        }
    }
}
