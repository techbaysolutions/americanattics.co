<?php
/**
 * Created by PhpStorm.
 * User: Khuram
 * Date: 8/28/2017
 * Time: 6:14 PM
 */

namespace App\Exceptions;


use Throwable;

class ApiCustomException extends ApiBaseException
{

    public function __construct($message = "", array $outcomeArray, array $errors = [])
    {
        parent::__construct($message, $outcomeArray, $errors);
    }


}