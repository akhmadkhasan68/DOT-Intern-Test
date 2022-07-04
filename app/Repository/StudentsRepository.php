<?php
namespace App\Repository;

use App\Http\Requests\StudentsRequest;
use App\Models\Student;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Datatables;

class StudentsRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new Student();
    }

    /**
     * method for get all students
     *
     * @return Collection
     * 
     */
    public function getAllStudents(Bool $paginate = true)
    {
        if($paginate)
        {
            $data = $this->model->paginate(10);
        }
        else
        {
            $data = $this->model->get();
        }

        return $data;
    }

    public function datatables()
    {
        $data = $this->model->query();

        return Datatables::eloquent($data)->make(true);
    }

    /**
     * method for get detail data student
     *
     * @param Int $id
     * 
     * @return Collection
     * 
     */
    public function getDetailStudent(Int $id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new Exception("Data not found!", 404);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createStudent(StudentsRequest $request)
    {
        try {
            return $this->model->create($request->toArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateStudent(StudentsRequest $request, Int $id)
    {
        try {
            return $this->model->findOrFail($id)->update($request->toArray());
        } catch (ModelNotFoundException $e) {
            throw new Exception("Data not found!", 404);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteStudent(Int $id)
    {
        try {
            return $this->model->findOrFail($id)->delete($id);
        } catch (ModelNotFoundException $e) {
            throw new Exception("Data not found!", 404);
        } catch (Exception $e) {
            throw $e;
        }
    }
}