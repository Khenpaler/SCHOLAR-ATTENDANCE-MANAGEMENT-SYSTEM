<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // http not found
        if ($exception instanceof NotFoundHttpException || $exception instanceof HttpException) {
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->errorResponse($message, $code);
        }

        // instance not found
        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));

            return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
        }

        // validation exception
        if ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();

            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // access forbidden
        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        }

        // unauthorized access
        if ($exception instanceof AuthenticationException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }

       
        if ($this->isForeignKeyConstraintViolation($exception)) {
        $errorMessage = '';

        // Check for scholars_id constraint violation
        if (strpos($exception->getMessage(), 'attendance_tbl_ibfk_1') !== false) {
            $errorMessage = 'Invalid scholar ID. The specified scholar does not exist.';
        }

        if ($this->isForeignKeyConstraintViolation($exception)) {
            $errorMessage = '';

            // Check for scholars_id constraint violation
            if (strpos($exception->getMessage(), 'attendance_tbl_ibfk_1') !== false) {
                $errorMessage = 'Invalid scholar ID. The specified scholar does not exist.';
            }

            // Check for event_id constraint violation
            if (strpos($exception->getMessage(), 'attendance_tbl_ibfk_2') !== false) {
                $errorMessage = 'Invalid event ID. The specified event does not exist.';
            }

            if ($errorMessage) {
                return $this->errorResponse($errorMessage, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        } // Add this closing curly brace

        // if you are running in the development environment
        if (env('APP_DEBUG', false)) {
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Unexpected error. Try later', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Determine if the exception is a foreign key constraint violation.
     *
     * @param  \Throwable  $exception
     * @return bool
     */
    protected function isForeignKeyConstraintViolation(Throwable $exception)
    {
        return $exception->getCode() === '23000' && strpos($exception->getMessage(), 'foreign key constraint') !== false;
    }
}
