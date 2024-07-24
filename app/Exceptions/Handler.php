<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        
    }

    private function isApiRequest($request): bool
    {
        return $request->is('api/*') || $request->expectsJson();
    }

    private function handleApiException($request, Throwable $exception): JsonResponse
    {
        $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;

        $response = [
            'success' => false,
            'message' => $exception->getMessage(),
        ];

        //TODO: set debugger false in env for production
        if (config('app.debug')) {
            $response['exception'] = get_class($exception);
            $response['trace'] = $exception->getTrace();
        }

        return response()->json($response, $statusCode);
    }
}
