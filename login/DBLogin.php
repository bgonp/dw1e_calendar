<?php

class DBLogin
{
    
    public static function connection(){
        return mysqli_connect("dw1.online","alejandro","ReboloLovers","dw1e_calendar");
    }
    
    public static function hashPass($user_pass){
        return password_hash($user_pass, PASSWORD_DEFAULT);
    }
    
    public static function loginCorrect($user_name,$user_pass){
        $resultado = mysqli_query(self::connection(), "SELECT user_name, user_pass FROM tb_User;");
        return self::nameCorrect($resultado, $user_name) && self::passCorrect($resultado, $user_pass);
    }
        
        private static function nameCorrect($resultado, $user_name) {
            $exists = false;
            for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0 && !$exists; $num_fila--) {
                $resultado->data_seek($num_fila);
                $fila = $resultado->fetch_assoc();
                if ($user_name = $fila["user_name"])
                    $exists = true;
            }
            return $exists;
        }
        
        private static function passCorrect($resultado, $user_pass) {
            $exists = false;
            $user_pass = self::hashPass($user_pass);
            for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0 && !$exists; $num_fila--) {
                $resultado->data_seek($num_fila);
                $fila = $resultado->fetch_assoc();
                if ($user_pass = $fila["user_pass"])
                    $exists = true;
            }
            return $exists;
        }
}