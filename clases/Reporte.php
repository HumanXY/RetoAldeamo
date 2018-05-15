<?php

class Reporte {
    //metodo para la consulta de las atenciones diarias
    public function atencionesDiarias($fecha, $conexion) {
        $sql = "select COUNT(*) as NumAtencion from turno where creation_date between '$fecha 00:00:00' and '$fecha 23:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    public function atencionesDiariasHora($fecha, $hora, $conexion) {
        $sql = "select COUNT(*) as NumAtencion from turno where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    public function turnosPerdidos($fecha, $conexion) {
        $sql = "select COUNT(*) as TurnosPerdidos from turno where creation_date between '$fecha 00:00:00' and '$fecha 23:59:00' and status = 0;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    public function turnosPerdidosHora($fecha, $hora, $conexion) {
        $sql = "select COUNT(*) as TurnosPerdidos from turno where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00' and status = 0;";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    /*public function promedioEspera($fecha, $conexion) {
        $sql = "select diferencia from tiempo_espera WHERE DATE_FORMAT(creation_date, '%y-%m-%d') = DATE_FORMAT('$fecha', '%y-%m-%d');";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }*/
    public function promedioEspera($fecha, $conexion) {
        $sql = "select sec_to_time(avg(time_to_sec(diferencia))) as diferencia from tiempo_espera WHERE DATE_FORMAT(creation_date, '%y-%m-%d') = DATE_FORMAT('$fecha', '%y-%m-%d');";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
    public function promedioEsperaHora($fecha, $hora, $conexion) {
        $sql = "select sec_to_time(avg(time_to_sec(diferencia))) as diferencia from turno where creation_date between '$fecha $hora:00:00' and '$fecha $hora:59:00';";
        $query = mysqli_query($conexion, $sql);
        return $query;
    }
}
