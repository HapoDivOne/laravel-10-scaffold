<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="Laravel 10 Api",
 *      version="1.0.0",
 * ),
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 *
 * @OA\Parameter(
 *  parameter="accept--language",
 *  name="localization",
 *  in="header",
 *      @OA\Schema(
 *          type="string"
 *      )
 *  ),
 *
 * @OA\Parameter(
 *  parameter="asset--limit",
 *  in="query",
 *  name="limit",
 *  description="Number of item is get up at each page",
 *  @OA\Schema(
 *      type="integer",
 *      default=12,
 *  )
 * )
 *
 * @OA\Parameter(
 *  parameter="general--page",
 *  in="query",
 *  name="page",
 *  description="The current page for the result set, defaults to *1*",
 *  @OA\Schema(
 *      type="integer",
 *      default=1,
 *  )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
