<?php
namespace ProyectoVideoclub\Util;
class ClienteNoEncontradoException extends VideoclubException{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function __toString(): string
    {
        return "";
    }
}