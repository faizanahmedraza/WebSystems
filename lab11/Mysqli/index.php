<?php
require_once "Db.php";
session_start();
if (isset($_POST['signup'])) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $father = $_POST['father'];
        $desg = $_POST['designation'];
        $sal = $_POST['salary'];
        $org = $_POST['organization'];

        if(!empty($name) && !empty($father) && !empty($desg) && !empty($sal) && !empty($org)){
            // Prepare an insert statement
            $sql = "INSERT INTO employee(emp_name,emp_father_name,emp_designation,emp_salary,emp_organization) 
            VALUES('$name','$father','$desg','$sal','$org')";
            if (mysqli_query($conn, $sql)) {    //Perform insert query
                $_SESSION['records_created'] = $name; 
                header("location:Welcome.php");
            }        
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <style>
        html,
        body {
            font-size: 20px;
            width: 50%;
            height: 100%;
            margin: 10px auto;
        }

        h2 {
            text-align: center;
        }

        input {
            padding: 5px;
        }

        select {
            padding: 5px;
        }

        td {
            white-space: nowrap;
            padding: 5px;
        }

        input[type=submit]:hover,
        input[type=reset]:hover {
            color: white;
            background-color: gray;
        }

        .error {
            color: red;
            font-size: 16px;
        }
        button:hover{
            color: white;
            background-color: gray;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Employee Registration</h2>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td>Employee Name: </td>
                <td><input type="text" name="name"  value="">
                    <div class="error">
                      
                    </div>
                </td>
            </tr>
            <tr>
                <td>Employee Father Name: </td>
                <td><input type="text" name="father" value="">
                    <div class="error">
                       
                    </div>
                </td>
            </tr>
            <tr>
                <td>Employee Designation: </td>
                <td><input type="text" name="designation"  value="">
                    <div class="error">
                      
                        </td>
                    </div>
            </tr>
            <tr>
                <td>Employee Salary: </td>
                <td><input type="number" name="salary"  value="">
                    <div class="error">
                      
                    </div>
                </td>
            </tr>
            <tr>
                <td>Employee Organization: </td>
                <td><input type="text" name="organization"  value="">
                    <div class="error">
                      
                    </div>
                </td>
            </tr>
            <tr>
                <td><a href="#" value="Refresh" style="margin-top: 10px; text-decoration: none;"><button style="padding: 5px; margin-top: 10px;">Reset</button></td>
                <td style="text-align: right;"><input type="submit" name="signup" value="Submit &rarr;" style="margin-top: 10px;"></td>
            </tr>
        </table>
    </form>
</body>

</html>