<?php
namespace ProyectoVideoclub\Util;

class VideoclubException extends \Exception{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}