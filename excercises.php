<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
</head>
<body>
    <div>Add User</div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" placeholder="Name" name="name" v>
        </br>
        <input type="text" placeholder="Age" name="age">
        </br>
        <input type="text" placeholder="Email" name="email">
        </br>
        <input type="password" placeholder="Password" name="password">
        </br>
        <input type ="submit" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {

            try {
                $conn = getConnection();
                $name = $_REQUEST['name'];
                $age = $_REQUEST['age'];
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                // create users table
                $insertUser = "insert into users (name, age, email, password) values('$name',$age, '$email', '$password') ";
                $userInserted = $conn->query($insertUser);

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }finally{
                $conn=null;
            }
            echo "</br>";
        }
    ?>

    <?php
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbName = "test";

        // try {
        //     $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connected successfully";

        //     // create users table
        //     $userCreationSql = "create table users (id inta, age int, name varchar(255))";
        //     $tableCreated = $conn->query($userCreationSql);

        //     if($tableCreated)
        //         echo "</br> Table created </br>";

        //   } catch(PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        //   }
        // echo "</br>";
     ?>

    <?php
        // $conn1 = ["connect_err"=>"There is error","name"=>"Sameer","age"=>100];

        // echo $conn1["connect_err"];

        // echo "</br>";
        
        // $conn2 = ["There is error","Sameer",100];

        // echo $conn2[0];

     ?>

     <?php 
        // class Vehicle{
        //     private int $wheels;
            
        //     public function getWheels(){
        //         return $this->wheels;
        //     }

        //     public function setWheels($wheels){
        //         $this->wheels = $wheels;
        //     }

        //     function __construct($wheels)
        //     {
        //         $this->wheels = $wheels;
        //     }

        // }

        // $vehicle = new Vehicle(4);

        // echo "</br>";

        // echo "WHeels are " . $vehicle->getWheels();


     ?>
</body>
</html>
