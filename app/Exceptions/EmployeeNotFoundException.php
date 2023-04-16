<?php

namespace App\Exceptions;

class EmployeeNotFoundException extends \Exception
{
    protected $message = 'Employee not found!';
}