<?php 
namespace app\controllers;
use app\models\viewModel;

class viewcontrollers extends viewModel {
     public function obtenerVistasControlador($vista) {
        if ($vista != " ") {
            $respuesta = $this->obtenerVistasModelo($vista);
        }
        else {
            $respuesta = "login";
        }
        return $respuesta;
     }
}
?>