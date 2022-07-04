<?php
namespace App\Repository;

use App\Http\Requests\MajorsRequest;
use App\Models\Major;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MajorsRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new Major();
    }

    /**
     * method for get all majors
     *
     * @return Collection
     * 
     */
    public function getAllMajors(Bool $paginate = true)
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

    /**
     * method for get detail data major
     *
     * @param Int $id
     * 
     * @return Collection
     * 
     */
    public function getDetailMajor(Int $id)
    {
        try {
            return $this->model->firstOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function createMajor(MajorsRequest $request)
    {
        try {
            return $this->model->create($request->toArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateMajor(MajorsRequest $request, Int $id)
    {
        try {
            return $this->model->firstOrFail($id)->update($request->toArray());
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteMajor(Int $id)
    {
        try {
            return $this->model->firstOrFail($id)->delete($id);
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }
}