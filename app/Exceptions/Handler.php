<?php

namespace App\Exceptions;

use App\Mail\ExceptionMail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Throwable;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
//    public function register()
//    {
//        $this->reportable(function (Throwable $e) {
//            //
//        });
//    }

    /**
     * @param Throwable $throwable
     * @throws Throwable
     */
    public function report(Throwable $throwable)
    {
        if ($this->shouldReport($throwable)) {
            $this->sendEmail($throwable); // sends an email
        }
        parent::report($throwable);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Throwable $throwable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $throwable)
    {
        if ($throwable instanceof NotFoundHttpException) {
            // 404 page when a model is not found
            return response()->view('error.' . '404', [], 404);
        }

        if ($this->isHttpException($throwable)) {
            return $this->renderHttpException($throwable);
        } else {
            // For 500 error view on production
            if (app()->environment() == 'production') {
                return response()->view('error.' . '500', [], 500);
            }
            return parent::render($request, $throwable);
        }

//        return parent::render($request, $throwable);
    }

    /**
     * @param Throwable $throwable
     */
    public function sendEmail(Throwable $throwable)
    {
        try {
            $e = FlattenException::create($throwable);

            $handler = new HtmlErrorRenderer(true);

            $css = $handler->getStylesheet();
            $content = $handler->getBody($e);

            Mail::to('a0c4825b26-daa6bd@inbox.mailtrap.io')->send(new ExceptionMail(compact('css','content')));
        } catch (Throwable $ex) {
            dd($ex);
        }
    }

}
