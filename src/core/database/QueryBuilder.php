<?php

class QueryBuilder {

    protected $pdo;

    // Pass pdo instance to the query builder
    public function __construct(PDO $pdo) {
        // Include query functions
        $this->pdo = $pdo;
    }


    // Query SQL using prepared statements
    // https://www.php.net/manual/en/pdo.prepared-statements.php
    public function query($sql, $parameters=[], $clsName="") {

        $start = microtime(true);

        $res = "";
        if (substr( $sql, 0, 6 ) === "SELECT") {
            $res = $this->fetch($sql, $parameters, $clsName);

        } else {
            $this->execute($sql, $parameters);
        }

        $time = microtime(true) - $start;
        Logger::debug("Query {$sql} took {$time} ms.");
        return $res;
    }


    // Insert given array of values into given table
    public function insertUpdate(string $table, array $parameters) {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s",
            $table,
            implode(", ", array_keys($parameters)),
            // Add a colon in front of every key
            ":" . implode(", :",array_keys($parameters)),
            // Convert associative array to comma delimited string of placeholders
            $this->arrayKeysToList($parameters)
        );
        return $this->execute($sql, $parameters);
    }


    private function fetch(string $sql, array $parameters=[], string $className="") {
        try {
            $statement = $this->execute($sql, $parameters);
            // If an optional class name has been passed..
            if ($className) {
                // Fetch into that class
                $result = $statement->fetchAll(PDO::FETCH_CLASS, $className);
            } else {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return $result;
        } catch (PDOException $e){
            die("Something went wrong during fetchAll: ". $e);
        }        
    }

    
    private function execute(string $sql, array $parameters) {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            return $statement;
        // Catch any exceptions
        } catch (Exception $e) {
            die("Something went wrong during pdo execute ". $e);
        }
    }

    // Return a string of comma deliminated array keys with placeholders like
    // foo=:foo, bar=:bar... 
    public function arrayKeysToList(array $arr) {
        // From https://stackoverflow.com/a/26945321
        $output = "";
        foreach ($arr as $key => $value) {
            $output .= $key . "=" . ":" . $key . ", ";
        };
        // remove last comma + space and return
        return substr($output, 0, -2);;
    }
}