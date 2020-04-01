<?php
class MysqlConnector{
    private $servername;
    private $dbname;
    private $username;
    private $password;
    function __construct($servername, $username, $password, $dbname){
        $this->servername = $servername;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

    }

    function query($sql){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
    }

    function query_json($sql){
        $result = $this->query($sql);
        if($result){
            while($r = mysqli_fetch_assoc($result)){
                $arr[] = $r; 
            }
            return json_encode($arr);
        }
        else{
            return "";
        }
    }
}




?>