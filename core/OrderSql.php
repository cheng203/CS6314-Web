<?php
include_once('MysqlConnector.php');

Class OrderSql{
    private $conn;
    function __construct(){
        $this->conn = new MysqlConnector("localhost", "root", "root", "test");
    }
    /*function findMoviePriceByID($movieID,$ticketTypeID){
        $sql = sprintf("SELECT price  from ticket_price where movie_id = '%s' and ticket_type_id= '%s'", $movieID,$ticketTypeID);
        $result = $this->conn->query_json($sql);
        return $result;
    }*/

    function AddOrder($user_id,$number_tickets,$session_id)
    {
     
        $sql = sprintf("INSERT into orders (user_id, number_tickets,session_id,total_amount) values ('%s','%s', '%s', '0')",$user_id,$number_tickets,$session_id);
          $result=$this->conn->get_insert_id($sql);
          
          return $result;
       
      
    }

    function Add_order_goods_detail($order_id,$goods_id,$quantity){
    	$sql = sprintf("INSERT into order_goods_detail values ('%s','%s', '%s')",$order_id,$goods_id,$quantity);
        $result=$this->conn->query($sql);
          
        return $result;

    }
   

    function Add_order_tickets_detail($order_id,$ticket_type_id,$price,$quantity){
    	$sql = sprintf("INSERT into order_tickets_detail values ('%s','%s', '%s','%s')",$order_id,$ticket_type_id,$price,$quantity);
        $result=$this->conn->query($sql);
          
        return $result;

    }


}


?>