<?php

require_once 'Controlador.php';

class ControleRemoto implements Controlador {
    private $volume;
    private $ligado;
    private $tocando;
    
    public function ControleRemoto(){
        $this->volume= 50;
        $this->ligado= FALSE;
        $this->tocando= FALSE;
    }

        private function getVolume(){
        return $this->volume;
    }
    private function setVolume($v){
        $this->volume=$v;
    }
    private function getLigado(){
        return $this->ligado;
    }
    private function setLigado($l){
        $this->ligado=$l;
    }
    private function getTocando(){
        return $this->tocando;
    }
    private function setTocando($t){
        $this->tocando=$t;
    }

    
    public function ligar() {
        $this->setLigado(TRUE);
    }
    public function desligar() {
        $this->setLigado(FALSE);
    }

    public function abrirMenu() {
        echo"<h3><p>     ----- MENU ------</p></h3>";
        echo"<br>      ESTA LIGADO? :" .($this->getLigado()? "SIM":"NÃO");
        echo"<br>      ESTA TOCANDO? " . ($this->getTocando()? "SIM":"NÃO");
        echo"<br>      VOLUME? " . $this->getVolume();
        for($i=0; $i <= $this->getVolume(); $i+=10){
            echo "!";
        }
        echo "<br>";
    }
    public function fecharMenu() {
        echo '<p>FECHAR MENU...</p>';
    }
    public function maisVolume() {
    if($this->getLigado()){
        $this->setVolume($this->getVolume() + 10);
     } else {
        echo"<p>ERROR! NÃO POSSO AUMENTAR O VOLUME...</p>";
     }
    }
    public function menosVolume() {
     if($this->getLigado()){
        $this->setVolume($this->getVolume() - 10);
      }else {
        echo"<p>ERROR! NÃO POSSO DIMINUIR O VOLUME...</p>";
     }       
    }
    public function ligarMudo() {
        if($this->getLigado() && $this->getLigado() > 0){
            $this->setVolume(0);
        }else{
            echo"<p>MUDO...</p>";
        }
    }
    public function desligarMudo() {
       if($this->getLigado() && $this->getVolume() == 0){
           $this->setVolume(50);
       }    
    }
    public function play() {
        if($this->getLigado() && !($this->getTocando())){
            $this->setTocando(TRUE);
        }
    }
    public function pauser() {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(FALSE);
        }
    }

}
