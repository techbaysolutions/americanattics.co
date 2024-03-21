<?php

namespace App\Exceptions;

use Log;


class ApiBaseException extends \Exception
{
    private $outcomeArray;
    private $errors;

    /**
     * @param $message
     * @param array $outcomeArray example ['outcome'=>'','outcomeCode'=>'']
     */

    public function __construct($message = "", array $outcomeArray, $errors = [])
    {
        parent::__construct($message, $outcomeArray['outcomeCode']);
        $this->outcomeArray = $outcomeArray;
        $this->errors = $errors;


        Log::error(print_r($outcomeArray,true).'<br>\n'.print_r($errors,true).'<br>\n'.$message);
    }

    public function getOutComeArray()
    {
        return $this->outcomeArray;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
