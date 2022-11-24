<?php
namespace ProyectoVideoclub\Util;
class SoporteYaAlquiladoException extends VideoclubException{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function __toString(): string
    {
        return "El soporte ya está alquilado";
    }
}