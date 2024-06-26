<?php

namespace Framework;

use PDO;
use App\Database;
abstract class Model
{
    protected $table;

    protected array $errors = [];

    public function __construct(private Database $database)
    {

    }

    protected function validate(array $data) : void 
    {

    }

    public function getInsertId(): string
    {
        $conn = $this->database->getConnection();

        return $conn->lastInsertId();
    }
    protected function addError(string $field, string $message) : void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
    
    private function getTable(): string
    {

        if($this->table !== null)
        {
            return $this->table;
        }
        $parts = explode("\\", $this::class);

        return strtolower(array_pop($parts));
    }
    public function findAll () : array
    {
        $pdo = $this->database->getConnection();

        $sql = "SELECT * FROM {$this->getTable()}";
        
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id) : array|bool
    {
        $conn = $this->database->getConnection();

        $sql = "SELECT * FROM {$this->getTable()} WHERE InvoiceID = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }   

    public function insert(array $data) : bool
    {
        $this->validate($this->$data);

        if(! empty($this->errors))
        {
            return false;
        }

        $columns = implode(", ",array_keys($data));
        $placeholders = implode(", ", array_fill(0,count($data), "?"));

        $sql = "INSERT INTO {$this->getTable()} ($columns)
                VALUES ($placeholders)";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);

        $i = 1;
        foreach($data as $value)
        {
            $type = match(gettype($value))
            {
                "boolean" => PDO::PARAM_BOOL,
                "int" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
            };

            $stmt->bindValue($i++,$value, $type);
        }

        return $stmt->execute();

    }
}