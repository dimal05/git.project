<?php

class Database
{
    private $db_host = 'localhost';
    private $db_name = 'webprojekti';
    private $db_user = 'root';
    private $db_pass = '';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    public function query($query)
    {
        return $this->conn->query($query);
    }

    public function prepare($query)
    {
        return $this->conn->prepare($query);
    }

	public function bind($stmt, $types, ...$params)
	{
		$stmt->bind_param($types, ...$params);
	}

    public function execute($stmt)
    {
        return $stmt->execute();
    }

    public function lastInsertId()
    {
        return $this->conn->insert_id;
    }

    public function rowCount($stmt)
    {
        return $stmt->affected_rows;
    }

    public function result($stmt)
    {
        return $stmt->fetch();
    }

	public function resultSet($stmt)
    {
    $result = $stmt->fetch_row();

    if ($result) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    } else {
        $rows = array();
        while ($row = $stmt->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
}

    public function close()
    {
        $this->conn->close();
    }
}
?>
