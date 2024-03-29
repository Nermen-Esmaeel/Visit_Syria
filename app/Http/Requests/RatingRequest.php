<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ApiResponse::sendResponse(422,'Validation errors',$validator->messages()->All());
        throw new ValidationException($validator,$response);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        if ($request->header('lan')=="en") {

            return[
               
                'Rating_value'=>'required|integer|between:0,5',
                'Service_rating_id'=>'required|exists:ratings,id',

            ];

        }

        elseif($request->header('lan')=="ar")
        {
            return[
               
                'Rating_value'=>'required|integer|between:0,5',
                'Service_rating_id'=>'required|exists:ratings,id',

            ];
        }
    }
}
