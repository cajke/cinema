<?php

class Database extends PDO
{
    protected static $connection;

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Find all from table
     * @param string $table Name of table
     * @return array
     */
    public function findAll($table)
    {
        try {
            $sth = $this->prepare("SELECT * FROM $table");
            $sth->execute();
            return $sth->fetchAll();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    public function newestFilmsilmsSorted($table)
    {
        try {
            $sth = $this->prepare("SELECT * FROM $table ORDER BY year DESC, id LIMIT 4");
            $sth->execute();
            return $sth->fetchAll();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
    public function popularFilmsSorted($table)
    {
        try {
            $sth = $this->prepare("SELECT * FROM $table ORDER BY rating DESC, id LIMIT 4");
            $sth->execute();
            return $sth->fetchAll();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return null;
        }
    }

    /**
     * Find by id
     * @param string $table Name of table
     * @param int $id
     * @return array
     */
    public function findById($table, $id)
    {
        $sth = $this->prepare("SELECT * FROM $table WHERE id = :id");
        try {
            $sth->bindValue(':id', $id);
            $sth->execute();
            return $sth->fetch();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    /**
     * Find by id
     * @param string $table Name of table
     * @param int $id
     * @return array
     */
    public function findIdByName($table, $name)
    {
        $sth = $this->prepare("SELECT id FROM $table WHERE name = :name");
        try {
            $sth->bindValue(':name', $name);
            $sth->execute();
            return $sth->fetch();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param array $data An associative array
     * @return boolean
     */
    public function insert($table, $data)
    {
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        try {
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    /**
     * update
     * @param string $table A name of table to insert into
     * @param array $data An associative array
     * @param string $where the WHERE query part
     * @return boolean
     */
    public function update($table, $data, $where)
    {
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        try {
            $sth->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    /**
     * Delete user
     * @param string $table A name of table to insert into
     * @param string $id Id statement
     * @return boolean
     */
    public function delete($table, $id)
    {
        $sth = $this->prepare("DELETE FROM $table WHERE id = :id");
        try {
            $sth->bindValue(':id', $id);
            $sth->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}