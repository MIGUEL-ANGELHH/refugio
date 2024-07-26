<?php 

  namespace app\models;
  use \PDO;  //Se especifica que ese usará la clase PDO


// Se incluye el server.php que tiene los datos de la conexión a la bd
    if (file_exists(__DIR__."../../config/server.php")){
        //Si existe, entonces se carga
        require_once __DIR__."../../config/server.php";
    }
    class mainModel{
        private $server = DB_SERVER;
        private $db = DB_NAME;
        private $user = DB_USER;
        private $pass = DB_PASSWORD;

        protected function conectar(){
			$conexion = new PDO("mysql:host=".$this->server.";dbname=".$this->db,$this->user,$this->pass);
			$conexion->exec("SET CHARACTER SET utf8");
			return $conexion;
		}

        //Modelo para hacer consultas
        //Dentro de las clases y las heredadas
        protected function  ejecutarConsulta($consulta){
            $sql = $this->conectar()->prepare($consulta);
            $sql->execute();
            return $sql;
        } 
        public function seleccionarImgSlider(){
            $sql=$this->conectar()->prepare("SELECT * FROM slider WHERE status=1");
            $sql->execute();
            return $sql;
        }
        
        //Modelo para hacer extraer palabras que pudieran generar inyección
        //Dentro de las clases instanciadas y fuera de ellas
        public function limpiarCadena($cadena) {
            $palabras = ["<script>", "</script>","<script src", "<script type=", "SELECT * FROM", "DELETE FROM" ,"INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES" , "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">","==", "=", ";", "::"];

            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);
            foreach($palabras as $palabra) {
                $cadena  = str_ireplace($palabra,"","$cadena");
            }
            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);
            return $cadena;

        }

        protected function verificarDatos($filtro,$cadena) {
            if (preg_match("/^".$filtro."$/", $cadena)) {
                return false;
            }
            else
            {
                return true;
            }
        }

        protected function guardarDatos($tabla, $datos) {
            $query = "INSERT into $tabla (";
            $C = 0;
            foreach($datos as  $clave) { 
                if($C>=1) {
                    $query .= ",";
                }
                $query .=$clave["campo_nombre"];
                $C++;
            }
            $query .= ") VALUES (";
            $C = 0;
            foreach($datos as  $clave) { 
                if($C>=1) {
                    $query .= ",";
                }
                $query .=$clave["campo_marcador"];
                $C++;
            }
            $query .= ")";

            $sql = $this->conectar()->prepare($query);
            foreach($datos as $clave) {
                $sql->bindParam($clave["campo-marcador"],$clave["campo_valor"]);
            }
            $sql->execute();

            return $sql;
        }
        
            public function seleccionarDatos($tipo,$tabla,$campo,$id) {
               $tipo = $this->limpiarCadena($tipo);
               $campo = $this->limpiarCadena($campo);
               $tabla = $this->limpiarCadena($tabla);
               $id = $this->limpiarCadena($id);

               if ($tipo == "Unico") {
                  $sql = $this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo =:ID");
                  $sql->bindParam(":ID",$id);
               } elseif($tipo == "Normal") {
                $sql = $this->conectar()->prepare("SELECT $campo FROM $tabla");
        
               }
               $sql->execute();

            return $sql;
            }

            protected function actualizarDatos($tabla,$datos,$condicion){
                $query = "UPDATE $tabla SET ";
                $C=0;
                foreach($datos as  $clave) { 
                    if($C>=1) {
                        $query .= ",";
                    }
                    $query .=$clave["campo_nombre"]."=".$clave["campo_nombre"];
                    $C++;
                }
                $query .= "WHERE ". $condicion["condicion_campo"]."=".$condicion["condicion_marcador"];
                $sql = $this->conectar()->prepare($query);
                foreach($datos as $clave) {
                    $sql->bindParam($clave["campo-marcador"],$clave["campo_valor"]);
                }
                $sql->bindParam($condicion["condicion-marcador"],$condicion["condicion_valor"]);

                $sql->execute();
                return $sql;
            }

            protected function eliminaDatos($tabla,$campo,$id)  {
                $sql = $this->conectar()->prepare("DELETE FROM $tabla WHERE $campo=:id");
                $sql->bindParam(":id",$id);
                $sql->execute();
                return $sql;
            }

            protected function paginadorTabla($pagina,$numPaginas,$url,$botones){
                $tabla = '<nav class="pagination is-rounded" role="navigation" aria-label="pagination">';
                if ($pagina <=1){
                    $tabla = '<a href="#" class="pagination-previous is-disabled">Anterior</a> 
                    <ul class="pagination-list">';
                }
                else {
                    $tabla = '<a href="'.$url.($pagina-1).'" class="pagination-previous">Anterior</a> 
                    <ul class="pagination-list">
                    <li><a href="'.$url.'1/" class="pagination-link" aria-label="Goto page 1">1</a></li>
                    <li><span class="pagination-ellipsis">&hellip;</span></li>';
                }
            }

        }
?>