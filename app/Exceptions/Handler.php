<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            // Tangani error 500 dan tampilkan halaman kustom
            if ($exception->getStatusCode() == 500) {
                if ($request->is('app*')) {
                    // Halaman 500 default untuk admin (awalan /app)
                    return parent::render($request, $exception);
                } else {
                    // Halaman 500 kustom untuk user
                    return response()->view('errors.500-user', [], 500);
                }
            }

            // Tangani error 404 dan tampilkan halaman kustom berdasarkan URL
            if ($exception->getStatusCode() == 404) {
                if ($request->is('app*')) {
                    // Halaman 404 default untuk admin (awalan /app)
                    return parent::render($request, $exception);
                } else {
                    // Halaman 404 kustom untuk user
                    return response()->view('errors.404-user', [], 404);
                }
            }
        }

        // Default behavior untuk exception lainnya
        return parent::render($request, $exception);
    }
}
