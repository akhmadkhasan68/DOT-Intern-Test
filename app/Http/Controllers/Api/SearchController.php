<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Repository\SearchRepository;

class SearchController extends Controller
{
    protected $repository;

    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(SearchRequest $request)
    {
        try {
            $data = $this->repository->search($request);

            return response()->success($data, "Success while loading data");
        } catch (\Exception $e) {
            report($e);
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
    
    public function students(SearchRequest $request)
    {
        try {
            $data = $this->repository->students($request);

            return response()->success($data, "Success while loading data");
        } catch (\Exception $e) {
            report($e);
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
    
    public function majors(SearchRequest $request)
    {
        try {
            $data = $this->repository->majors($request);

            return response()->success($data, "Success while loading data");
        } catch (\Exception $e) {
            report($e);
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
