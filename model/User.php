<?php

class User
{
    // Propiedades de la tabla
    private $id;
    private $pass;
    private $mail;
    
    // Getters y setters
    public function id($id=null){
        if($id)
            $this->id = $id;
        return $this->id;
    }
    public function pass($pass=null){
        if($pass)
            $this->pass = $pass;
        return $this->pass;
    }
    public function mail($mail=null){
        if($mail)
            $this->mail = $mail;
        return $this->mail;
    }
    
    // Constructor
    public function __construct($id=null){
        if ($id){
            $user = Database::getUser($id);
            $user = $user->fetch_assoc();
            $this->id($user['id']);
            $this->pass($user['pass']);
            $this->mail($user['mail']);
        }
    }

    public static function get(){
        $users_db = Database::getUserList();
        $users_arr = [];
        while ($user_db = $users_db->fetch_assoc()) {
            $user = new User();
            $user->id($user_db['id']);
            $user->pass($user_db['pass']);
            $user->mail($user_db['mail']);
            $users_arr[] = $user;
        }
        return $users_arr;
    }
    
    public function store(){
        if (!$this->id){
            $params = [ 'pass' = $this->pass,
                        'mail' = $this->mail,];
            Database::insertUser($params);
            return $this->id = Database::insertId();
        }
        return false;
    }
    
    public function update(){
        $params = [ 'pass' = $this->pass,
                    'mail' = $this->mail,];
        return Database::updateUser($this->id,$params);
    }
    
    public function remove(){
        return Database::deleteUser($this->id);
    }

}