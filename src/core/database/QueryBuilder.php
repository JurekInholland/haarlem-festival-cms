<?php

class QueryBuilder {

    protected $pdo;




    // Pass the pdo instance to the query builder
    public function __construct(PDO $pdo) {
        // Include query functions
        $this->pdo = $pdo;
    }

    // Abstraction method for sql select
    public function select($customOptions) {
        
        // Check if parameters contain needed parameters
        if (!$customOptions["select"] || !$customOptions["from"]) {
            die("Select method missing parameters. Caller: " . debug_backtrace()[1]['function']);
        }
        $default = [
            "where" => "",
            "target" => "",
            "orderBy" => "",
            "into" => "",
            "operator" => ""
        ];

        $params = array_merge($default, $customOptions);

        try {
            // Unpack array of parameters
            // Since $params["select] is an array as well, convert to string here
            $select = implode(", ", $params["select"]);
            $from = $params["from"];

            $where = $params["where"]?: "";
            $target = $params["target"]?: "";
            $orderBy = $params["orderBy"]?: "";
            $into = $params["into"]?: "";
            $operator = $params["operator"]?: "=";


            $order = "";
            $whereClause = "";

            if ($orderBy) {
                $order = "ORDER BY " . $orderBy;
            }
            if ($where) {
                // create a placeholder string like 'WHERE username LIKE :username'
                $whereClause = sprintf("WHERE %s %s :%s", $where, $operator, $where);
            }
            $sql = sprintf(
                // There must be a better way of doing this....
                "SELECT %s FROM %s %s %s LIMIT 1000",
                $select,
                $from,
                $whereClause,
                $order
            );
            // die($sql);
            // Array containing actual parameter
            $parameter = [$where => $target];
            
            return $this->fetch($sql, $parameter, $into);
        } catch (Exception $e) {
            die("SELECT ARGUMENTS FAILED");
        }
        
    }

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



    private function fetch(string $sql, array $parameters, string $className="") {
        try {
            $statement = $this->execute($sql, $parameters);
            // If an optional class name has been passed..
            if ($className) {
                // Fetch into that class
                $result = $statement->fetchAll(PDO::FETCH_CLASS, $className);
            } else {
                $result = $statement->fetchAll();
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
    private function arrayKeysToList(array $arr) {
        // From https://stackoverflow.com/a/26945321
        $output = "";
        foreach ($arr as $key => $value) {
            $output .= $key . "=" . ":" . $key . ", ";
        };
        // remove last comma + space and return
        return substr($output, 0, -2);;
    }
}