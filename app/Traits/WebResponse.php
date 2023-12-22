<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

trait WebResponse
{
    protected function getWebServiceResponse(
        string $status,
        int $code,
        string $message,
        array|Collection|Paginator $data = []
    ) {
        return [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
    }
}
