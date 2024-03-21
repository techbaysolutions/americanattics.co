<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\sendEmail\QuotationDataRequest;
use App\libs\Response\GlobalApiResponse;
use App\libs\Response\GlobalApiResponseCodeBook;
use App\Services\Api\EmailService;

class EmailController extends Controller
{
    public function __construct(EmailService $emailService){
        $this->emailService = $emailService;
    }
    public function index(QuotationDataRequest $request)
    {
         $data = $this->emailService->emailsendServices($request->all());
        if ($this->emailService->hasError())
            return (new GlobalApiResponse())->error(GlobalApiResponseCodeBook::INVALID_CREDENTIALS, ' Ops,Something went wrong.', $this->emailService->getErrors());
        return (new GlobalApiResponse())->success('Email Send.',$data);

    }
}
