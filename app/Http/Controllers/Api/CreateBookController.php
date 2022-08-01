<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewBookRequest;
use App\Models\Collector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateBookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(CreateNewBookRequest $request)
    {
        return Collector::findOrFail($request->input('collector_id'))
            ->books()
            ->create([
                'title' => $request->validated('title'),
                'category' => $request->validated('category'),
            ]);
    }
}
