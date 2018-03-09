<?php
/**
 * Created by PhpStorm.
 * User: Lemorvan
 * Date: 08/03/2018
 * Time: 11:31
 */

class Requetes
{
    private $dsn="mysql:dbname=auxitec;host=localhost;charset=utf8"; // data source name  - dbname est un mot clé
    private $user = "auxitec"; // dans groupe utilisateur de la base
    private $password ="auxitec";
    private $db; // objet créé par PDO

    function __construct()
    {
        try{
            $this -> db= new PDO($this->dsn,$this->user,$this -> password);
            $this -> db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); // retourne un enregistrement sous forme objet
        }
        catch (PDOException $e){
            Log::logWrite($e->getMessage());
        }
    }

    function insert($sql)
    {
        return $this -> db -> exec($sql); // exec pour insert et delete et update
    }

    function select($sql)
    {
        return $this -> db -> query($sql);
    }

    function  getLastId(){
        return $this -> db -> lastInsertId();
    }

    function update($sql){
        return $this -> db-> exec($sql);
    }


    function __destruct()
    {
        unset($this->db); // détruit l'objet et la connexion
    }

}