<?php include "init.php"; ?>
<?php if (isset($_SESSION['user_id'])) {
    header("location:Welcome.php");
}
?>
<?php
if (isset($_POST['login'])) {
    $data = [
        'std_email' => $_POST['email'],
        'std_pass' => $_POST['password'],
        'email_error' => '',
        'pass_error' => ''
    ];
    //Validations for every input
    if (empty($data['std_email'])) {
        $data['email_error'] = 'Email is Required!';
    } else {
        if ($source->Query("SELECT * FROM student WHERE std_email = ?", [$data['std_email']])) {
            if ($source->CountRows() == 0) {
                $data['email_error'] = "Sorry your email is not exist";
            }
        }
    }
    if (empty($data['std_pass'])) {
        $data['pass_error'] = "Password is required";
    }
    /* Submit Form */
    if (empty($data['email_error']) && empty($data['pass_error'])) {
        if ($source->Query("SELECT * FROM student WHERE std_email = ?", [$data['std_email']])) {
            if ($source->CountRows() > 0) {
                $row = $source->SingleRow();
                $id = $row->std_id;
                $db_email = $row->std_email;
                $pass_hash = $row->std_pass;

                var_dump($pass_hash);
                if (password_verify($data['std_pass'], $pass_hash)) {
                    $_SESSION['user_id'] = $id;
                    $_SESSION['login'] = $data['std_email'];
                    header("location:Welcome.php");
                } else {
                    $data['pass_error'] = "Please enter correct password";
                }
            } else {
                $data['email_error'] = "Please enter correct Email";
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
    <title>Student Login</title>
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
        td {
            white-space: nowrap;
            padding: 5px;
        }
        .alert {
            background-color: #5cda5c;
            color: white;
            padding: 0px 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            height: 30px;
            font-size: 18px;
        }

        .closebtn {
            font-size: 20px;
            cursor: pointer;
        }

        .closebtn:hover {
            color: black;
        }

        input {
            padding: 5px;
        }

        input[type=submit]:hover {
            color: white;
            background-color: gray;
        }

        .error {
            color: red;
            font-size: 16px;
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
    <h2>Student Login</h2>
    <?php if (isset($_SESSION['account_created'])) : ?>
        <div class="alert">
            <p>
                Account is successfully created!
            </p>
            <span class="closebtn" onclick="this.parentElement.style.display='none';"> &times;</span>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['account_created']); ?>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email" value="<?php if (!empty($data['std_email'])) : echo $data['std_email'];
                                                                        endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['email_error'])) : ?>
                            <?php echo $data['email_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" id="password" value="<?php if (!empty($data['std_pass'])) : echo $data['std_pass'];
                                                                                endif; ?>">
                    <div class="error">
                        <?php if (!empty($data['pass_error'])) : ?>
                            <?php echo $data['pass_error']; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 15px;"><a href="StudentRegister.php">Create New Account</a></td>
                <td style="text-align: right;"><input type="submit" name="login" value="Login &rarr;" style="margin-top: 10px;"></td>
            </tr>
        </table>
    </form>
</body>

</html>