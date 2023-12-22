<?php

namespace App\Traits;

use App\Enums\ResponseStatus;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

trait ApiFailedValidationTrait
{
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'status' => ResponseStatus::ERROR,
            'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => __('validation.unprocessable_entity'),
        ];
        throw new HttpResponseException(response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
