<?php

class User
{
    // Propiedades de la tabla
    private $user_id;
    private $user_pass;
    private $user_mail;
    
    // Getters & setters
    public function getUser_id() {
        return $this->user_id;
    }
    private function setUser_id($user_id) {
        $this->user_id = $user_id;
    }
    public function getUser_pass() {
        return $this->user_pass;
    }
    private function setUser_pass($user_pass) {
        $this->user_pass = $user_pass;
    }
    public function getUser_mail() {
        return $this->user_mail;
    }
    private function setUser_mail($user_mail) {
        $this->user_mail = $user_mail;
    }
    
    // Constructor
    public function User($user_pass,$user_mail){
        $this->setUser_pass($user_pass);
        $this->setUser_mail($user_mail);
    }

    public static function get(){
        return msyqli_query(DBLogin::connection(),"SELECT * FROM usuario;");
    }
    
    public function getSingle(){
        return msyqli_query(DBLogin::connection(),"SELECT * FROM usuario WHERE user_id="+self::getUser_id()+
                " OR usuario.user_pass='"+self::getUser_pass()+"' OR usuario.user_mail='"+self::getUser_mail()+"';");
    }
    
    public function store(){
        mysqli_query(DBLogin::connection(), "INSERT INTO usuario(user_pass,user_mail) VALUES("+self::getUser_pass()+",'"+self::getUser_mail()+"');");
    }
    
    public function update(){
        mysqli_query(DBLogin::connection(), "UPDATE usuario SET user_mail='"+self::getUser_mail()+"', user_pass='"+self::getUser_pass()+"' WHERE user_id="+self::getUser_id()+";");
    }
    
    public function remove(){
        mysqli_query(DBLogin::connection(), "DELETE FROM usuario WHERE user_id="+self::getUser_id()+";");
    }

}