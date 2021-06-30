<?php include 'common.php';?>
<div class="container">
    <div class="text-center"><h1>Users</h1></div>
    <a href="user_form.php"><button type="button" class="btn btn-primary"> Add</button></a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            try{
                $conn = getConnection();
                
                $sql = "select id,name, age, email from users order by id desc";

                $i = 1;

                $result = $conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);;

                foreach ($result as $row) {
                    $name = $row['name'];
                    $age = $row['age'];
                    $email = $row['email'];
                    $id = $row['id'];
                    echo "
                        <tr>
                            <th>$i</th>
                            <td><a href='user_form.php?id=$id'>$name</a></td>
                            <td>$age</td>
                            <td>$email</td>
                            <td><a href='delete.php?id=$id' style='color:red;'>Delete</a></td>
                        </tr>
                        ";

                    $i++;
                }
                
            }catch(PDOException $e){
                
            }finally{
                $conn = null;
            }
        ?>
        </tbody>
    </table>
</div>