<?php

namespace App\Traits;

trait ResponseTrait
{

    /**
     *
     * @var array
     */
    protected $responseCodes = [
        'badRequest' => 400,
        'validationErrors' => 422,
        'serverError' => 500,
        'success' => 200,
        'created' => 201,
        'acceptedWithWarnings' => 202,
        'emptyResource' => 204,
        'unAuthenticated' => 401,
        'permissionDenied' => 403,
        'notFound' => 404,
    ];

    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseSuccess($content)
    {
        return response($content, $this->responseCodes['success']);
    }

    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseCreated($content)
    {
        return response($content, $this->responseCodes['created']);
    }

    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseBadRequest($content)
    {
        return response($content, $this->responseCodes['badRequest']);
    }

    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    
    protected function responseServerErrors($content)
    {
        return response($content, $this->responseCodes['serverError']);
    }

    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    
    protected function responseValidationErrors($content)
    {
        return response($content, $this->responseCodes['validationErrors']);
    }
    
    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    
    protected function responseUnAuthenticated($content)
    {
        return response($content, $this->responseCodes['unAuthenticated']);
    }
    
    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    
    protected function responsePermissionDenied($content)
    {
        return response($content, $this->responseCodes['permissionDenied']);
    }
    
    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseEmptyResource($content)
    {
        return response($content, $this->responseCodes['emptyResource']);
    }
    
    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseNotFound($content)
    {
        return response($content, $this->responseCodes['notFound']);
    }
    /**
     *
     * @param mixed $content
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseAcceptedWithWarnings($content)
    {
        return response($content, $this->responseCodes['acceptedWithWarnings']);
    }
}
