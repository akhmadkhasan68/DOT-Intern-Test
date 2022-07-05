<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentsRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Repository\DistrictRepository;
use App\Repository\MajorsRepository;
use App\Repository\ProvinceRepository;
use App\Repository\RegencyRepository;
use App\Repository\StudentsRepository;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $studentsRepository;
    protected $majorsRepository;
    protected $provinceRepository;
    protected $regencyRepository;
    protected $districtRepository;

    public function __construct(StudentsRepository $studentsRepository, MajorsRepository $majorsRepository, ProvinceRepository $provinceRepository, RegencyRepository $regencyRepository, DistrictRepository $districtRepository)
    {
        $this->studentsRepository = $studentsRepository;
        $this->majorsRepository = $majorsRepository;
        $this->provinceRepository = $provinceRepository;
        $this->regencyRepository = $regencyRepository;
        $this->districtRepository = $districtRepository;
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
     * [Description for datatable]
     *
     * @param Request $reques
     * 
     * @return [type]
     * 
     */
    public function datatable(Request $request)
    {
        return $this->studentsRepository->datatables();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = $this->provinceRepository->getAllProvince();
        $regencies = $this->regencyRepository->getAllRegency();
        $districts = $this->districtRepository->getAllDistrict();
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
            $data = $this->studentsRepository->createStudent($request);

            return response()->json([
                "error" => false,
                "message" => "Success create data",
                "redirect" => route("students.index"),
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
            $data = $this->studentsRepository->getDetailStudent($id);
            
            return view("students.detail", compact("data"));
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
            $provinces = Province::all();
            $regencies = Regency::all();
            $districts = District::all();
            $majors = $this->majorsRepository->getAllMajors(false);
            $data = $this->studentsRepository->getDetailStudent($id);

            return view("students.edit", compact("provinces", "regencies", "districts", "majors", "data"));
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
    public function update(StudentsRequest $request, $id)
    {
        try {
            $data = $this->studentsRepository->updateStudent($request, $id);
    
            return response()->json([
                "error" => false,
                "message" => "Success create data",
                "redirect" => route("students.index"),
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
            abort($e->getCode());
        }
    }
}
