<?php
class Juego extends Soporte{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores){
        parent::__construct($titulo, $numero, $precio);
        $this->consola=$consola;
        $this->minNumJugadores=$minNumJugadores;
        $this->maxNumJugadores=$maxNumJugadores;
    }

    public function muestraJugadoresPosibles(){
        if($this->minNumJugadores==$this->maxNumJugadores){
            if($this->maxNumJugadores==1){
                echo "Para un Jugador";
            }else{
                echo "Para ".$this->maxNumJugadores." jugadores";
            }
        }else{
            echo "De ".$this->minNumJugadores." a ".$this->maxNumJugadores." jugadores";
        }
    }

    public function muestraResumen(){
        parent::muestraResumen();
        $this->muestraJugadoresPosibles();
    }
}