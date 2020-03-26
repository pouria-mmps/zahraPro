<?php

class  Db
{
    private static $db;
    private $connection;

    public function __construct($option = null)
    {
        if ($option != null) {
            $host = $option['host'];
            $user = $option['user'];
            $pass = $option['pass'];
            $name = $option['name'];
        } else {
            global $config;
            $host = $config['db']['host'];
            $user = $config['db']['user'];
            $pass = $config['db']['pass'];
            $name = $config['db']['name'];
        }

        $this->connection = new mysqli($host, $user, $pass, $name);
        if ($this->connection->connect_error) {
            echo "Connection failed: " . $this->connection->connect_error;
            exit;
        }
        $this->connection->query("SET NAMES 'utf-8'");
    }

    public static function getInstance()
    {
        if (self::$db == null) {
            self::$db = new Db();
        }
        return self::$db;
    }

    public function first($sql, $data = array(), $feild = null)
    {
        $records = $this->query($sql, $data);
        if (count($records) == null) {
            return null;
        }
        if ($feild != null) {
            return $records[0][$feild];
        }
        return $records[0];
    }

    public function query($sql, $data = array())
    {
        $result = $this->safeQuery($sql, $data);
        if (!$result) {
            echo "Query: " . $sql . " failed due to " . mysqli_error($this->connection);
            exit;
        }

        $records = array();

        if (!empty($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
            return $records;
        } else {
            return $records;
        }
    }

    private function safeQuery(&$sql, $data)
    {
        foreach ($data as $key => $value) {
            $value = $this->connection->real_escape_string($value);
            $value = "'$value'";

            $sql = str_replace(":$key", $value, $sql);
        }
        return $this->connection->query($sql);
    }

    public function modify($sql, $data = array())
    {
        $result = $this->safeQuery($sql, $data);
        if (!$result) {
            echo "Query: " . $sql . " failed due to " . mysqli_error($this->connection);
            exit;
        }
        return $result;
    }

    public function insert($sql, $data = array())
    {
        $result = $this->safeQuery($sql, $data);
        if (!$result) {
            echo "Query: " . $sql . " failed due to " . mysqli_error($this->connection);
            exit;
        }
        return $result;
    }

    public function connection()
    {
        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}