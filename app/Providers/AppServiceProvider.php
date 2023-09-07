<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function (Request $request, $data = null, $message = null, $code = 200, $startTime ,$total) {

            $meta = [
                'method' => $request->getMethod(),
                'endpoint' => $request->path(),
                'limit' => $request->limit ?? 0,
                'offset' => $request->offset ?? 0,
                'total' =>  $total,
            ];

            $responseData = [
                'success' => 1,
                'code' => $code,
                'meta' => $meta,
                'data' => $data,
                'message' => $message,
                'duration' => (float)sprintf("%.3f", (microtime(true) - $startTime)),
            ];

            return Response::json($responseData, $code);
        });


        Response::macro('error', function (Request $request, $data = null, $message = null, $code = 400, $startTime) {

            $meta = [
                'method' => $request->getMethod(),
                'endpoint' => $request->path(),
                'limit' => $request->limit ?? 0,
                'offset' => $request->offset ?? 0,
            ];

            $responseData = [
                'success' => 0,
                'code' => $code,
                'meta' => $meta,
                'data' => $data,
                'message' => $message,
                'duration' => (float)sprintf("%.3f", (microtime(true) - $startTime)),
            ];

            return Response::json($responseData, $code);
        });

        Response::macro('paginate', function (Request $request, $data = null, $message = null, $code = 200, $startTime, $total) {

            $isPaginated = $request->has('page') ? $request->input('page') : 1;

            $meta = [
                'method' => $request->getMethod(),
                'endpoint' => $request->path(),
                'limit' => $request->limit ?? 0,
                'offset' => $request->offset ?? 0,
                'total' =>  $total,
            ];

            $responseData = [
                'success' => 1,
                'code' => $code,
                'meta' => $meta,
                'data' => $data,
                'message' => $message,
                'duration' => (float)sprintf("%.3f", (microtime(true) - $startTime)),
            ];


            if ($isPaginated) {

                $paginator = $data;

                $responseData['data'] = $paginator->items();


                $meta = [
                    'current_page' => $paginator->currentPage(),

                    'last_page' => $paginator->lastPage(),
                    'path' => $paginator->path(),
                    'limit' => $paginator->perPage(),
                    'total' =>  $total,

                ];


                $links = [
                    'first' => $paginator->url(1),
                    'last' => $paginator->url($paginator->lastPage()),
                    'prev' => $paginator->previousPageUrl(),
                    'next' => $paginator->nextPageUrl(),
                ];

                $responseData['meta'] = $meta;
                $responseData['links'] = $links;
            }



            return Response::json($responseData, $code);
        });

    }
}
