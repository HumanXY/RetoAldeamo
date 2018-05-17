<?php
class Conexion {
    public function conexion() {
        $link = mysqli_connect("localhost", "root", "toor", "reto_aldeamo");
        if ($link == false) {
            die ("Error con la conexión: ". mysqli_connect_error());
            echo "Que sad";
        }
        else{
            echo "Coenxion exitosa";
        }
        return $link;
    }
}
