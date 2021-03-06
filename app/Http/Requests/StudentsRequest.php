<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $student = $this->route("student");

        return [
            "name" => "required",
            "email" => [
                "required",
                "email:rfc,dns",
                Rule::unique("students")->when($student != null, function($sub) use($student){
                    $sub->ignore($student);
                })
            ],
            "nim" => [
                "required",
                Rule::unique("students")->when($student != null, function($sub) use($student){
                    $sub->ignore($student);
                })
            ],
            "phone" => [
                "required",
                Rule::unique("students")->when($student != null, function($sub) use($student){
                    $sub->ignore($student);
                })
            ],
            "gender" => [
                "required",
                Rule::in(["MEN", "WOMEN"])
            ],
            "major_id" => "required|exists:majors,id",
            "province_id" => "required|exists:provinces,id",
            "regency_id" => "required|exists:regencies,id",
            "district_id" => "required|exists:districts,id",
            "address" => "required"
        ];
    }
}
