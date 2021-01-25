<?php
    include_once 'init.php';
    $employee = new Controller();
    $id = $name = $desg = $email = $pass = $phno = "";
    if(isset($_GET['type']) && $_GET['id'] != ''){
        $id = $employee->getSafeStr($_GET['id']);
        $field_arr = array("*");
        $where_cond_arr = array("id"=>"$id");
        $result = $employee->getAllStmt("employee",$field_arr,$where_cond_arr);
        $name = $result['0']['name'];
        $desg = $result['0']['designation'];
        $email = $result['0']['email'];
        $phno = $result['0']['phone_no'];
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $desg = $_POST['designation'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $phno = $_POST['phone_no'];
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $name_error = $desg_error = $email_error = $pass_error = $phno_error = "";

        if(empty($name) || $name == null){
            $name_error = "Name cannot be blank!";
        }
        if(empty($desg) || $desg == null){
            $desg_error = "Designation cannot be blank!";
        }
        if (empty($email) || $email == null ) {
            $email_error = "Email cannot be blank";
        } else {
            $email = trim($email);
        }
            $email = stripslashes($email);
            $email = htmlspecialchars($email);
            $field_arr = array("email");
            $where_cond_arr = array("email"=>"$email");
            if ($id == '') {
                if ($check = $employee->getAllStmt("employee", $field_arr, $where_cond_arr)) {
                    if ($check > 0) {
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Sorry Email is Already Exist!";
                    $email_error = "Invalid email format!";
                    if ($id == '' && empty($name_error) && empty($desg_error) && empty($email_error) && empty($pass_error) && empty($phno_error)) {
                } else {
                    $email_error = "Please Provide an Valid Email!";
                }
            }
        }

        if (empty($pass) || $pass == null) {
            $pass_error = "Password cannot be blank";
        } elseif (strlen($pass) < 8) {
            $pass_error = "Password is too short!";
        } else {
            if (!preg_match('/^(?=.*)(?=.*[A-Za-z])[0-9A-Za-z!@#&$%]{8,12}$/', $pass)) {
                $pass_error ="Please provide a strong password!";
            }
        }

        if (empty($phno) || $phno == null) {
            $phno_error = "Phone no cannot be blank";
        } else {
            if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{7}$/', $phno)) {
                $phno_error ="Please provide a phone no of given pattern!";
            }
        }
        $data = array("name"=>$name,"designation"=>$desg,"role"=>$role,"email"=>$email,"password"=>$hashed_password,"phone_no"=>$phno);
            $res = $employee->insertRecord("employee", $data);
            header("location:dashboard.php");

        }
        } else if($id != ''){
            $employee->updateRecord("employee",$data,"id",$id);
            header("location:dashboard.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD EMPLOYEE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .error {
            color:red;
        }
    </style>
</head>

<body>
    <div class="container w-50 my-2">

        <div class="card my-3">
            <div class="card-header">
                <strong>ADD EMPLOYEE</strong>
                <a href="dashboard.php" class="float-end btn btn-dark btn-sm">EMPLOYEE DETAILS</a>
            </div>
        </div>

        <form action="" method="POST">
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="<?php echo $name; ?>">
                <div class="error">
                    <?php if (!empty($name_error)) : ?>
                    <?php echo $name_error; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-2">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control form-control-sm" value="<?php echo $desg; ?>">
                <div class="error">
                    <?php if (!empty($desg_error)) : ?>
                    <?php echo $desg_error; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-2">
                <label for="role" class="form-label">Your Role</label>
                <select class="form-select form-select-sm" id="role" name="role" aria-label="Role">
                    <option value="Normal User" selected>Normal User</option>
                    <option value="Designer">Designer</option>
                    <option value="Developer">Developer</option>
                    <option value="Animation Artist">Animation Artist</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control form-control-sm" value="<?php echo $email; ?>">
                <div class="error">
                    <?php if (!empty($email_error)) : ?>
                    <?php echo $email_error; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control form-control-sm" value="<?php echo $pass; ?>">
                <div class="error">
                    <?php if (!empty($pass_error)) : ?>
                    <?php echo $pass_error; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-2">
                <label for="phone_no" class="form-label">Phone Number</label>
                <input type="text" name="phone_no" class="form-control form-control-sm" id="phone_no"
                    placeholder="000-0000-0000000" value="<?php echo $phno; ?>">
                <div class="error">
                    <?php if (!empty($phno_error)) : ?>
                    <?php echo $phno_error; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
</body>

</html>