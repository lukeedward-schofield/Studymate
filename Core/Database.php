<?php  
declare(strict_types=1);
namespace Core;

class Database{

    public $connection;

    public function __construct($dsn)
    {   
        $dsn = "mysql: " . http_build_query($dsn, numeric_prefix: "", arg_separator: ";");

        $this->connection = new \PDO( $dsn, "root", "", [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function query($statement, $params = []): bool|\PDOStatement
    {
        $statement = $this->connection->prepare($statement);
        $statement->execute($params);

        return $statement;
    }
}