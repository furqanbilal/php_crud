<?php
    include 'common.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $conn = getConnection();
            
            $sql = "delete from users where id = $id";

            $result = $conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

            
            
        }catch(PDOException $e){
            
        }finally{
            $conn = null;
        }
    }

    header("Location: users.php");
