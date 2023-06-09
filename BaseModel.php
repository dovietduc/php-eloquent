<?php

class BaseModel {

    private $table;

    private $pdo;

    public function __construct($table) 
    {

        $this->table = $table;
        $this->connectDatabase();
        
    }

    public function create($dataCreate) 
    {
        try {
            $table = $this->table;
            $keys = array_keys($dataCreate);
            $columns = implode(", ", $keys);
            
            $keysMap = array_map(function($item){
                return ":" . $item;
            }, $keys);
            $valueColumn = implode(", ", $keysMap);

            $sql = "INSERT INTO $table ($columns) VALUES ($valueColumn)";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute($dataCreate);
            $id = $this->pdo->lastInsertId();
            if($id) {
                return $id;
            }
            return 'insert fail';

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
       
     
    }

    public function connectDatabase() 
    {
        $host = '127.0.0.1';
        $db   = 'test';
        $user = 'root';
        $pass = '';
        $port = "3306";
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

        try {
            $this->pdo = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    

}