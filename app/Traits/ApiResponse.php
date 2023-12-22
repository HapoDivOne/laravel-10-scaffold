<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

trait ApiResponse
{
    protected function getJsonResponse(string $status, int $code, string $message, array|Paginator $data = [])
    {
        $response = [
            'status' => $status,
            'status_code' => $code,
            'message' => $message,
        ];
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $response['data'] = $data->getCollection()->toArray();
            $response['paginate'] = [
                'limit' => $data->perPage(),
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'size' => $data->getCollection()->count(),
                'total_page' => $data->lastPage(),
            ];
        } else {
            $response['data'] = $data;
        }
        return response()->json($response)->setStatusCode($code);
    }

    protected function getServiceResponse(
        string $status,
        int $code,
        string $message,
        array|Collection|Paginator $data = []
    ) {
        $response = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        return $response;
    }
}
