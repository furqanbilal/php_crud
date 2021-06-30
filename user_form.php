<?php include 'common.php';?>
<?php
    $isEdit = false;
    $userReceived = [];
    if(isset($_GET['id'])){
        $isEdit = true;
        try {
            $conn = getConnection();
            $id = $_GET['id'];
            // create users table
            $getUser = "select id,name, age, email, password from users where id = $id";
            $userReceived = $conn->query($getUser)->fetchAll(\PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }finally{
            $conn=null;
        }
    }

?>

<div class="container">
    <div class="text-center">
        <h1><?php echo $isEdit ? 'Edit' : 'Add' ?> User</h1>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $userReceived ? $userReceived[0]['id'] : '' ?>">
        <div class="form-group m-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $userReceived ? $userReceived[0]['name'] : '' ?>">
        </div>
        <div class="form-group m-2">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $userReceived ? $userReceived[0]['age'] : '' ?>">
        </div>
        <div class="form-group m-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $userReceived ? $userReceived[0]['email'] : '' ?>">
        </div>
        <div class="form-group m-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $userReceived ? $userReceived[0]['password'] : '' ?>">
        </div>
        <div class="form-group m-2">
            <button type="submit" name="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Save' ?></button>
        </div>
    </form>
</div>

<?php
    if(isset($_POST['submit'])) {

        try {
            $conn = getConnection();
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $id = $_REQUEST['id'];
            if($id != ''){
                 // update users table
                 $sql = "update users set name='$name', age=$age, email='$email',password='$password' where id = $id" ;
                
            }else{
               // create users table
               $sql = "insert into users (name, age, email, password) values('$name',$age, '$email', '$password') ";
            }
            
            $result = $conn->query($sql);
            header("Location: users.php");

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }finally{
            $conn=null;
        }
        echo "</br>";
    }
?>
