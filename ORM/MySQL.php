<?php

namespace ORM;

use PDO;

abstract class MySQL
{
    public PDO $PDO;
    public object $stmt;
    public string $sql = 'SELECT ';
    public static bool $status = false;
    public string $table;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB(): void
    {
        if (!self::$status) {
            $connect = 'mysql:host=MySQL-8.0;dbname=fcad';
            $username = 'root';
            $password = '';
            try {
                if ($this->PDO = new PDO($connect, $username, $password)) {
                    $this->logs->answer('Connection to DataBase successful');
                } else {
                    $this->logs->answer('Something went wrong');
                }
                self::$status = true;
            } catch (\Exception $exception) {
                $this->logs->error('Connection error CODE: ' . $exception->getMessage());;
            };

        }
    }

    public function select($column = '*')
    {
        $this->sql .= $column . ' FROM `' . $this->table . '`';
        return $this;
    }

    public function where($key, $value)
    {
        $this->sql .= ' WHERE ' . $key . ' = ' . $value;
        return $this;
    }

    public function insert($column, $value)
    {
        $this->sql = 'INSERT INTO `' . $this->table . '`(' . $column . ') VALUES(' . $value . ')';
        return $this;
    }

    public function execute()
    {
        $this->stmt = $this->PDO->prepare($this->sql);
        $this->stmt->execute([

        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update()
    {
        $this->sql = 'UPDATE `' . $this->table . '` SET ';
        return $this;
    }

    public function update_column($column, $value)
    {
        $this->sql .= '`' . $column . '` = ' . $value;
        return $this;
    }

    public function comma()
    {
        $this->sql .= ',';
    }

    public function delete()
    {
        $this->sql = 'DELETE FROM `' . $this->table . '`';
    }
}

class Group extends Database
{
    public function __construct($table)
    {
        // Вызов конструктора родительского класса
        parent::__construct();

        // Специфичная для этого класса инициализация
        $this->table = $table;
    }
}