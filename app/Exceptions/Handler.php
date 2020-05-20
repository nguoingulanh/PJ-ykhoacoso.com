<?php

namespace App\Exceptions;

use App\Models\RequestLogs;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            $countData = RequestLogs::where('url', $request->url())->get();
            if (count($countData) > 0) {
                $data = RequestLogs::where('url', $request->url())->first();
                $data['count'] = $data->count + 1;
                $data['ip'] = $request->ip();
                $data->save();
            } else {
                $requestlogs = new RequestLogs;
                $requestlogs['url'] = $request->url();
                $requestlogs['status_code'] = $exception->getStatusCode();
                $requestlogs['count'] = 1;
                $requestlogs['ip'] = $request->ip();
                $requestlogs->save();
            }
        }
        return parent::render($request, $exception);
    }
}
