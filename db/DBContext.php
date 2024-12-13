<?php

namespace MyApp;

class DBContext
{
    private $tableName = null;

    public function __construct($table)
    {
        if ($this->ifTableExist($table)) {
            $this->tableName = $table;
        } else {
            throw new \Exception("Error -> table selected");
        }
    }

    private function ifTableExist($table)
    {
        $result = $this->executeQuery("SHOW TABLES");
        if ($result == null) return false;

        foreach ($result as $key => $value) {
            if (strcasecmp($value['Tables_in_' . mb_strtolower(DB_NAME)], $table) == 0) {
                return true;
            }
        }
        return false;
    }

    protected function executeQuery($query, $mode = "SELECT")
    {
        $conn = DBConnector::Connect();
        $result = mysqli_query($conn, $query);
        switch ($mode) {
            case "SELECT":
            {
                if ($result->num_rows > 0) {
                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);  // [][]
                } else {
                    $result = null;                                     // null
                }
                break;
            }
            default:
            {
                $result = mysqli_affected_rows($conn);                  // integer
                break;
            }
        }
        DBConnector::Disconnect();
        return $result;
    }

    protected function getId($filter = [])
    {

        if (count($filter) == 0) return null;
        $query = "SELECT Id FROM " . $this->tableName . " WHERE ";

        foreach ($filter as $key => $value) {
            if ($value == null) {
                $query .= "$key IS NULL AND ";
            } else {
                $query .= "$key = '$value' AND ";
            }
        }
        $query = mb_substr($query, 0, mb_strlen($query) - 4);
        $query .= " LIMIT 1";

        $id = $this->executeQuery($query);
        return $id == null ? null : $id[0]['Id'];
    }

    protected function getOneRow($id)
    {
        $result = $this->executeQuery("SELECT * FROM " . $this->tableName . " WHERE Id = $id");
        return $result == null ? null : $result[0];
    }

    protected function getManyRows(
        $filter = [],
        $orderName = 'Id',
        $orderMode = "ASC",
        $offset = 0,
        $limit = 100
    )
    {
        $query = "SELECT * FROM " . $this->tableName;
        if (count($filter) > 0) {
            $query.= " WHERE ";
            foreach ($filter as $key => $value) {
                if ($value == null) {
                    $query .= "$key IS NULL AND ";
                } else {
                    $query .= "$key = '$value' AND ";
                }
            }
            $query = mb_substr($query, 0, mb_strlen($query) - 4);
        }
        $query .= " ORDER BY $orderName $orderMode LIMIT $limit OFFSET $offset";

        return $this->executeQuery($query);
    }

    protected function deleteOneRow($Id)
    {
        return $this->executeQuery("DELETE FROM " . $this->tableName . " WHERE Id = $Id", "DELETE");
    }

    protected function deleteManyRows($filter = [])
    {

    }

    protected function updateOneRow($Id, $data = [])
    {
        if(count($data) == 0) return null;

        $query = "UPDATE ".$this->tableName." SET ";
        foreach ($data as $key => $value) {
            if($value == NULL) {
                $query.= "$key = NULL, ";
            } else {
                $query.= "$key = '$value', ";
            }
        }
        $query = mb_substr($query, 0, mb_strlen($query) - 2);
        $query.= "WHERE Id = $Id";

        return $this->executeQuery($query, "UPDATE");
    }

    protected function addOneRow($data = [])
    {
        if (count($data) == 0) return null;
        $query = "INSERT INTO " . $this->tableName . " ( ";
        $keys = "";
        $values = "";
        foreach ($data as $key => $value) {
            $keys .= "`$key`, ";
            if ($value == null) {
                $values .= "NULL, ";
            } else {
                $values .= "'$value', ";
            }
        }
        $keys = mb_substr($keys, 0, mb_strlen($keys) - 2);
        $values = mb_substr($values, 0, mb_strlen($values) - 2);
        $query .= $keys . ") VALUES (" . $values . ")";
        return $this->executeQuery($query, "INSERT");
    }
}