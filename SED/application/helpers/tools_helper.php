<?php

/**
 * función para cargar los meses, lo que generalmente se usará para poblar un campo de tipo select
 * */
if (!function_exists('meses')) {

    function meses() {
        $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        return $meses;
    }

}
/**
 * Función para convertir textos en seo_slug
 * */
if (!function_exists('con_guion')) {

    function con_guion($url) {
        $url = strtolower($url);
//Rememplazamos caracteres especiales latinos 
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n', 'n');
        $url = str_replace($find, $repl, $url);
// Añaadimos los guiones
        $find = array(' ', '&', '\r\n', '\n', '+');
        $url = str_replace($find, '-', $url);
// Eliminamos y Reemplazamos demás caracteres especiales 
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace($find, $repl, $url);
//$palabra=trim($palabra);
//$palabra=str_replace(" ","-",$palabra);
        return $url;
    }

}

/**
 * Función para extraer el id de youtube
 * */
if (!function_exists('get_youtube_id')) {

    function get_youtube_id($url) {
        $start = strpos($url, "v=") + 2;
        return substr($url, $start, 11);
    }

}
/**
 *  Detectar el dispositivo para cargar css web o mobile
 * Retorna True si es un disposivo móvil
 */
if (!function_exists('detectar_SO')) {

    function detectar_SO() {
        $es_movil = FALSE; //Aquí se declara la variable falso o verdadero XD 
        $usuario = $_SERVER['HTTP_USER_AGENT']; //Con esta leemos la info de su navegador 
        $usuarios_moviles = "Android, AvantGo, Blackberry, Blazer, Cellphone, Danger, DoCoMo, EPOC,EudoraWeb, Handspring, HTC, Kyocera, LG, MMEF20, MMP, MOT-V, Mot, Motorola, NetFront, Newt,Nokia, Opera Mini, Palm, Palm, PalmOS, PlayStation Portable, ProxiNet, Proxinet, SHARP-TQ-GX10,Samsung, Small, Smartphone, SonyEricsson, SonyEricsson, Symbian, SymbianOS, TS21i-10, UP.Browser,UP.Link, WAP, webOS, Windows CE, hiptop, iPhone, iPod, portalmmm, Elaine/3.0, OPWV";
        $navegador_usuario = explode(',', $usuarios_moviles);
        foreach ($navegador_usuario AS $navegador) {
            if (@preg_match('/' . trim($navegador) . '/', $usuario)) {
                $es_movil = TRUE;
            }
        }

        if ($es_movil == TRUE) {

            return true;
        } else {

            return false;
        }
    }

}
/**
 * función para validar y formatear RUT
 * */
if (!function_exists("esRut")) {

    function esRut($r = false) {
        if ((!$r) or ( is_array($r)))
            return false; /* Hace falta el rut */

        if (!$r = preg_replace('|[^0-9kK]|i', '', $r))
            return false; /* Era código basura */

        if (!((strlen($r) == 8) or ( strlen($r) == 9)))
            return false; /* La cantidad de carácteres no es válida. */

        $v = strtoupper(substr($r, -1));
        if (!$r = substr($r, 0, -1))
            return false;

        if (!((int) $r > 0))
            return false; /* No es un valor numérico */

        $x = 2;
        $s = 0;
        for ($i = (strlen($r) - 1); $i >= 0; $i--) {
            if ($x > 7)
                $x = 2;
            $s += ($r[$i] * $x);
            $x++;
        }
        $dv = 11 - ($s % 11);
        if ($dv == 10)
            $dv = 'K';
        if ($dv == 11)
            $dv = '0';
        if ($dv == $v)
            return number_format($r, 0, '', '.') . '-' . $v; /* Formatea el RUT */
        //return true;
        return false;
    }

}
/**
 * función chao_tilde
 * */
if (!function_exists("chao_acento")) {

    function chao_acento($entra) {
        $traduce = array('&aacute;' => 'á', '&eacute;' => 'é', '&iacute;' => 'í', '&oacute;' => 'ó', '&uacute;' => 'ú', '&ntilde;' => 'ñ', '&Ntilde;' => 'Ñ');
        $sale = strtr($entra, $traduce);
        return $sale;
    }

}
/**
 * restar fechas
 * */
if (!function_exists("dateDiff")) {

    function dateDiff($start, $end) {

        $start_ts = strtotime($start);

        $end_ts = strtotime($end);

        $diff = $end_ts - $start_ts;

        return round($diff / 86400);
    }

}
/**
 * invierte fecha de Y-m-d a d-mY
 * */
if (!function_exists("invierte_fecha")) {

    function invierte_fecha($fecha) {
        $dia = substr($fecha, 8, 2);
        $mes = substr($fecha, 5, 2);
        $anio = substr($fecha, 0, 4);
        $correcta = $dia . "-" . $mes . "-" . $anio;
        return $correcta;
    }

}
/**
 * invierte fecha de oracle
 * */
if (!function_exists("invierte_fecha_para_oracle")) {

    function invierte_fecha_para_oracle($fecha) {
        $array = explode("/", $fecha);
        $dato = "20" . $array[2] . "-" . $array[1] . "-" . $array[0];
        return $dato;
    }

}
/**
 * invierte fecha de oracle para insert
 * */
if (!function_exists("invierte_fecha_para_oracle_para_insert")) {

    function invierte_fecha_para_oracle_para_insert($fecha) {
        $array = explode("-", $fecha);
        $dato = $array[2] . "/" . $array[1] . "/" . $array[0];
        return $dato;
    }

}
/**
 * fecha de hoy en formato cadena
 * */
if (!function_exists("fecha_actual_cadena")) {

    function fecha_actual_cadena() {
        $dia = date("w");
        $day = date("d");
        $mes = date("m");
        switch ($dia) {
            case 0:
                $dia = "Domingo";
                break;

            case 1:
                $dia = "Lunes";
                break;
            case 2:
                $dia = "Martes";

                break;

            case 3:
                $dia = "Miércoles";

                break;
            case 4:
                $dia = "Jueves";
                break;
            case 5:
                $dia = "Viernes";
                break;
            case 6:
                $dia = "Sábado";
                break;
        }
        switch ($mes) {
            case '01':
                $mes = "Enero";
                break;
            case '02':
                $mes = "Febrero";
                break;
            case '03':
                $mes = "Marzo";
                break;
            case '04':
                $mes = "Abril";
                break;
            case '05':
                $mes = "Mayo";
                break;
            case '06':
                $mes = "Junio";
                break;
            case '07':
                $mes = "Julio";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }
        $fecha = "$dia " . $day . " de " . $mes . " de " . date("Y");
        return $fecha;
    }

}
/**
 * fecha de hoy en formato cadena Noviembre 2015
 * */
if (!function_exists("fecha_actual_cadena_mes_anio")) {

    function fecha_actual_cadena_mes_anio() {
        $mes = date("m");
        switch ($mes) {
            case '01':
                $mes = "Enero";
                break;
            case '02':
                $mes = "Febrero";
                break;
            case '03':
                $mes = "Marzo";
                break;
            case '04':
                $mes = "Abril";
                break;
            case '05':
                $mes = "Mayo";
                break;
            case '06':
                $mes = "Junio";
                break;
            case '07':
                $mes = "Julio";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }
        $fecha = $mes . " de " . date("Y");
        return $fecha;
    }

}
/**
 * formatea fecha
 * */
if (!function_exists("fecha")) {

    function fecha($fecha) {
        $dia = substr($fecha, 8, 2);
        $mes = substr($fecha, 5, 2);
        $anio = substr($fecha, 0, 4);
        switch ($mes) {
            case '01':
                $mes = "Enero";
                break;
            case '02':
                $mes = "Febrero";
                break;
            case '03':
                $mes = "Marzo";
                break;
            case '04':
                $mes = "Abril";
                break;
            case '05':
                $mes = "Mayo";
                break;
            case '06':
                $mes = "Junio";
                break;
            case '07':
                $mes = "Julio";
                break;
            case '08':
                $mes = "Agosto";
                break;
            case '09':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }
        $fecha = $dia . " de " . $mes . " de " . $anio;
        return $fecha;
    }

}
/**
 * calcular edad desde fecha de nacimiento
 * */
if (!function_exists("calculaEdad")) {

    function calculaEdad($fecha) {
        //fecha actual

        $dia = date("j");
        $mes = date("n");
        $ano = date("Y");

        //fecha de nacimiento
        $dianaz = substr($fecha, 8, 2);
        $mesnaz = substr($fecha, 5, 2);
        $anonaz = substr($fecha, 0, 4);


        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

        if (($mesnaz == $mes) && ($dianaz > $dia)) {
            $ano = ($ano - 1);
        }

        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

        if ($mesnaz > $mes) {
            $ano = ($ano - 1);
        }

        //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

        $edad = ($ano - $anonaz);

        return $edad;
    }

}
/**
 * functión para obtener nombre del mes
 * */
if (!function_exists("nombreMes")) {

    function nombreMes($num) {
        switch ($num) {
            case '1':
                $mes = "Enero";
                break;
            case '2':
                $mes = "Febrero";
                break;
            case '3':
                $mes = "Marzo";
                break;
            case '4':
                $mes = "Abril";
                break;
            case '5':
                $mes = "Mayo";
                break;
            case '6':
                $mes = "Junio";
                break;
            case '7':
                $mes = "Julio";
                break;
            case '8':
                $mes = "Agosto";
                break;
            case '9':
                $mes = "Septiembre";
                break;
            case '10':
                $mes = "Octubre";
                break;
            case '11':
                $mes = "Noviembre";
                break;
            case '12':
                $mes = "Diciembre";
                break;
        }
        return $mes;
    }

    if (!function_exists("cambia_tipo_mysql")) {
        function cambia_tipo_mysql($fecha) {            
            list($dia, $mes, $anio) = explode("-", $fecha);
            return $anio . "-" . $mes . "-" . $dia;
        }
    }
    if (!function_exists("cambia_tipo_normal")) {
        function cambia_tipo_normal($fecha) {
            list($anio, $mes, $dia) = explode("-", $fecha);
            return $dia . "-" . $mes . "-" . $anio;
        }
    }
}

/**
 * Función para reconocer de dónde se hizo el llamado
 * */
if (!function_exists('origen_url')) {

    function origen_url() {

        if (isset($_SERVER['HTTP_REFERER'])){
            $url_destino = explode("/", $_SERVER['HTTP_REFERER']);
            $url_destino=end($url_destino);
        }else{
            //redirect(base_url()."acceso/cierreSession");
        }                
        return $url_destino;
    }

}
/**
 * Función para reconocer de dónde se hizo el llamado
 * */
if (!function_exists('llamado_url')) {

    function llamado_url() {

		$url_destino=$_SERVER['REQUEST_URI'];
		//echo $_SERVER['REQUEST_URI'];exit;
        return $url_destino;
    }

}


