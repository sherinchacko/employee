<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="employee.php">Employee Entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete.php">Delete</a>
            </li>
          </ul>
    </nav>
    <h3>
        Welcome To The Search Page
    </h3>
    <form method="GET">
    <table class="table">
        <tr>
        <td>
            Employee code
        </td>
        <td>
            <input type="number"class="form-control"name="getEmpCode">
        </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit" class="btn btn-success"name="submit">
                    Search
                </button>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<?php
if(isset($_GET["submit"]))
{
    $Emp=$_GET["getEmpCode"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="workers";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="SELECT `Name`, `Dob`, `Email`, `District`, `Age`, `Username`, `Password`, `Conformpass` FROM `employee` WHERE `EmployeeCode`=$Emp";
    $result=$connection->query($Sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $Name=$row["Name"];
            $Dob=$row["Dob"];
            $Email=$row["Email"];
            $District=$row["District"];
            $Age=$row["Age"];
            $User=$row["Username"];
            $Password=$row["Password"];
            $conform=$row["Conformpass"];
            echo"<table class='table'> <tr> <td> Name </td> <td> $Name </td> </tr>
            <tr> <td> Dob </td> <td> $Dob </td> </tr>
            <tr> <td> Email </td> <td> $Email </td> </tr>
            <tr> <td> District </td> <td> $District </td> </tr>
            <tr> <td> Age </td> <td> $Age </td> </tr>
            <tr> <td> Username </td> <td> $User </td> </tr>
            <tr> <td> password </td> <td> $Password </td> </tr>
            <tr> <td> conformpass </td> <td> $conform </td> </tr>";
        }
    }
    else{
        echo "ivalid";
    }        
}
?>