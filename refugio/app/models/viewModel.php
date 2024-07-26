<?php 
//Definir el namespace
namespace app\models;
//Nombre de clase igual al nombre del archivo
class viewModel {
    protected function obtenerVistasModelo($vista)  {
        $listaBlanca = ["dashboard","mascotas","donacion","quienes", "slider"];
        if (in_array($vista,$listaBlanca)) {
            if (is_file("./app/views/content/".$vista."-view.php")) {
                $contenido = "./app/views/content/".$vista."-view.php";
            }
            else {
                $contenido = "404";
            }
        }elseif($vista == "login" || $vista == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
?>