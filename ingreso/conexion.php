<?php
    class basedatos{
        private $con;
		private $dbequipo='localhost';
		private $dbusuario='root';
		private $dbclave='';
		private $dbnombre='bd_trabajo30';

        /*private $con;
		private $dbequipo='sql313.infinityfree.com';
		private $dbusuario='if0_38887188';
		private $dbclave='fS0rRi3EPyUlCMr';
		private $dbnombre='if0_38887188_trabajo30';*/

        //constructor
		function __construct(){
			$this->conectar();
		}//fin constructor


        //función para conectarse a la base de datos
		public function conectar(){
			$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);

			if(mysqli_connect_error()){
				die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() . mysqli_connect_errno());
			}

		}//fin funcion conectar

        //funcion validar usuario
        public function login($usuario,$clave){
            $sql="select count(*) as registros from usuarios 
            where usuario='$usuario' and clave='$clave'";

            $resultado= mysqli_query($this->con,$sql);
            return $resultado;
            
        }//fin funcion validar

		//función para insertar datos
        public function insertar_reservas($nombre,$celular,$correo,$presupuesto,$destino,$observaciones,$fecha){
            $sql = "INSERT INTO reservas(res_nombre,res_celular,res_correo,res_presupuesto,res_destino,res_observaciones,res_fecha) VALUES ('$nombre', '$celular', '$correo', '$presupuesto', '$destino', '$observaciones','$fecha');";
            $resultado = mysqli_query($this->con, $sql);
                if($resultado){
                    return true;
                }else{
                    return false;
                }
        }//fin insertar_datos

        //función para consultar reservas
        public function leer_tabla(){
            $sql = "SELECT * FROM reservas";
             $res = mysqli_query($this->con, $sql);
            return $res;
        }// fin consulta 

        //función que elimina reservas
        public function eliminar_reserva($id){
            $sql = "DELETE FROM reservas WHERE res_id=$id";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }

        //metodo para consultar registro
        public function seleccionar_reserva($id){
            $sql="select * from reservas where res_id=$id";
            $res=mysqli_query($this->con, $sql);
            $retorno=mysqli_fetch_object($res);
            return $retorno;
        }

        //metodo para actualizar un registro
        public function actualizar_reserva($id,$nombre,$celular,$correo,$fecha,$observaciones){
            $sql="
            update reservas set res_nombre='$nombre', res_celular='$celular', 
            res_correo='$correo',res_fecha='$fecha', res_observaciones='$observaciones'
            where res_id=$id
            ";
            $res=mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }
    }// fin clase basedatos
?>