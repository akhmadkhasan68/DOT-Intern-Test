<?php 
namespace App\Repository;

use App\Http\Requests\SearchRequest;
use App\Models\Major;
use App\Models\Student;

class SearchRepository{
    protected $studentModel;
    protected $majorModel;

    public function __construct()
    {
        $this->studentModel = new Student();
        $this->majorModel = new Major();
    }

    public function search(SearchRequest $request)
    {
        try {
            $query = $request->input("query");

            $students = $this->getStudents($query);
            $majors = $this->getMajors($query);

            return [
                "students" => $students,
                "majors" => $majors,
            ];
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function students(SearchRequest $request)
    {
        try {
            $query = $request->input("query");
            $data = $this->getStudents($query);

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function majors(SearchRequest $request)
    {
        try {
            $query = $request->input("query");
            $data = $this->getMajors($query);

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function getStudents($query)
    {
        try {
            $data = $this->studentModel
            ->where("name", "LIKE", "%$query%")
            ->orWhere("nim", "LIKE", "%$query%")
            ->orWhere("email", "LIKE", "%$query%")
            ->orWhere("phone", "LIKE", "%$query%")
            ->orWhere("address", "LIKE", "%$query%")
            ->get();

            if($data){
                $resultData = $data->map(function($item){
                    $data = collect($item);
                    $data->put("link", route("api.students.show", $item->id));

                    return $data;
                });

                return collect([
                    "message" => $resultData->count()." total data found",
                    "data" => $resultData
                ]);
            }

            return collect([
                "message" => "0 total data found",
                "data" => [],
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function getMajors($query)
    {
        $data = $this->majorModel
        ->where("name", "LIKE", "%$query%")
        ->get();

        if($data){
            $resultData = $data->map(function($item){
                $data = collect($item);
                $data->put("link", route("api.majors.show", $item->id));

                return $data;
            });

            return collect([
                "message" => $resultData->count()." total data found",
                "data" => $resultData
            ]);
        }

        return collect([
            "message" => "0 total data found",
            "data" => [],
        ]);
    }
}