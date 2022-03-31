<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Form</title>
</head>
<style>

  h1{
    position: absolute;
    top:0;
    
  }
    form{
        margin:10%;
        margin-left: 25%;
        padding:8%;
        padding-bottom: 10px;
        width:40%;
        background-color: powderblue;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 30px;
        
    }
    input{
        margin: 20px;
        padding: 10px;
        width: 45%;
    }
    button{
        padding: 20px;
        margin: 50px;
        margin-top: 100px;
        margin-left: 20%;
        background-color: coral;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
        font-size: large;

    }
    .des{
        margin-left: 60%;
    }
    textarea{
        margin-left: 15%;
        width: 48%;
    }
</style>

<body>
    <form action="index.php" method="post"> 
        Department Name
        <input type="text" name="name" id="name" required>
        <br> <br>
        Description
        <textarea name="desc" required>
        </textarea>
        <br>
        <button type="submit" id="submit">Submit</button>
        <button type="reset"  id="reset"> Reset</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $dname = $_POST['name'];
       
        $desc = $_POST['desc'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "embedsol";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `departments` (`department_name`, `description`) VALUES ('$dname', '$desc')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          
          echo "<h1>Data was submitted Successfully</h1>";
          
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
           
            echo "Error.... Data was not submitted..";
            
        }

      }

    }

    
?>
 
</body>
</html>