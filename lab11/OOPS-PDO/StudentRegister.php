<?php include "init.php"; ?>
<?php if (isset($_SESSION['user_id'])) {
    header("location:Welcome.php");
}
?>
<?php
if (isset($_POST['signup'])) {
    if (!empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = null;
    }
    //Array of data
    $data = [
        'std_name' => $_POST['name'],
        'std_email' => $_POST['email'],
        'std_gender' => $gender,
        'std_dept' => $_POST['department'],
        'std_pass' => $_POST['ipassword'],
        'std_cpass' => $_POST['cpassword'],
        'name_error' => '',
        'email_error' => '',
        'gender_error' => '',
        'dept_error' => '',
        'pass_error' => '',
        'cpass_error' => '',
    ];
    //Validations for every field
    if (empty($data['std_name'])) {
        $data['name_error'] = "Name is required";
    }

    if (empty($data['std_email'])) {
        $data['email_error'] = "Email is required";
    } else {
        /*You can pass like this as well 
            $source->Query("SELECT * FROM student WHERE std_email = :email", ['email' => $data['std_email']])
        */
        if ($source->Query("SELECT * FROM student WHERE std_email = ?", [$data['std_email']])) {
            if ($source->CountRows() > 0) {
                $data['email_error'] = "Sorry email is already exist";
            }
        }
    }
    if (empty($data['std_gender']) || $data['std_gender'] == 'null') {
        $data['gender_error'] = "Gender is required";
    }

    if (empty($data['std_dept']) || $data['std_dept'] == 'NULL') {
        $data['dept_error'] = "Department is required";
    }

    if (empty($data['std_pass'])) {
        $data['pass_error'] = "Password is required";
    } else if (strlen($data['std_pass']) < 5) {
        $data['pass_error'] = "Password is too short";
    }
    if (empty($data['std_cpass'])) {
        $data['cpass_error'] = "Confrim Password is required";
    } else if ($data['std_pass'] != $data['std_cpass']) {
        $data['cpass_error'] = "Password does not matched";
    }
    /* Submit Form */
    if (
        empty($data['name_error']) && empty($data['email_error']) && empty($data['gender_error'])
        && empty($data['dept_error']) && empty($data['pass_error']) && empty($data['cpass_error'])
    ) {
        $password = password_hash($data['std_pass'], PASSWORD_DEFAULT);
        if ($source->Query("INSERT INTO student(std_name,std_email,std_gender,std_dept,std_pass)
            VALUES(?,?,?,?,?)", [$data['std_name'], $data['std_email'], $data['std_gender'], $data['std_dept'], $password])) {
            $_SESSION['account_created'] = $data['std_email'];
            header("location:index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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
    <h2>Student Registration</h2>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="name"  value="<?php if (!empty($data['std_name'])) : echo $data['std_name'];
                                                                        endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['name_error'])) : ?>
                            <?php echo $data['name_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" value="<?php if (!empty($data['std_email'])) : echo $data['std_email'];
                                                                        endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['email_error'])) : ?>
                            <?php echo $data['email_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>Male: <input type="radio" name="gender" value="male"> Female: <input type="radio" name="gender" value="female">
                    <div class="error">
                        <?php if (!empty($data['gender_error'])) : ?>
                            <?php echo $data['gender_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Department: </td>
                <td>
                    <select name="department">
                        <option value="NULL" selected>Choose Department</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Bussiness Administration">Bussiness Administration</option>
                    </select>
                    <div class="error">
                        <?php if (isset($data['dept_error'])) : ?>
                            <?php echo $data['dept_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="ipassword" id="" value="<?php if (!empty($data['std_pass'])) : echo $data['std_pass'];
                                                                        endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['pass_error'])) : ?>
                            <?php echo $data['pass_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="cpassword" id="" value="<?php if (!empty($data['std_cpass'])) : echo $data['std_cpass'];
                                                                        endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['cpass_error'])) : ?>
                            <?php echo $data['cpass_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td><a href="#" value="Refresh" style="margin-top: 10px; text-decoration: none;"><button style="padding: 5px; margin-top: 10px;">Reset</button></td>
                <td style="text-align: right;"><input type="submit" name="signup" value="Submit &rarr;" style="margin-top: 10px;"></td>
            </tr>
            <tr>
            <td style="padding-top: 15px;"><a href="index.php">Already have an account!</a></td>
            </tr>
        </table>
    </form>
</body>

</html>