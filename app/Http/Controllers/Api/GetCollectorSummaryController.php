<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Collector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetCollectorSummaryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request, Collector $collector)
    {
        return $collector->recently_added_books;
    }
}
