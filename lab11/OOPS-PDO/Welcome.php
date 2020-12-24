<?php include "init.php";
if (!isset($_SESSION['user_id'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -10px;
        }

        table {
            border-collapse: collapse;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td,
        th {
            border: 1px solid black;
            padding: 10px;
            margin: 0px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['login'])) : ?>
        <div class="alert">
            <p>
                Successfully Login!!
            </p>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['login']); ?>
    <div class="welcome">
        <h2>Welcome to dashboard</h2>
        <br>
        <a href="logout.php"><button>Logout</button></a>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <th>
                    Student Id
                </th>
                <th>
                    Student Name
                </th>
                <th>
                    Student Email
                </th>
                <th>
                    Student Gender
                </th>
                <th>
                    Student Department
                </th>
                <th>
                    Student Password
                </th>
            </thead>
            <tbody>
                <?php     
                if ($source->Query("SELECT * FROM student")) {
                    $records = $source->FetchAll();
                    foreach($records as $res)
                    {
                        ?><tr>
                            <td><?php echo $res->std_id ?></td>
                            <td><?php echo $res->std_name ?></td>
                            <td><?php echo $res->std_email ?></td>
                            <td><?php echo $res->std_gender ?></td>
                            <td><?php echo $res->std_dept ?></td>
                            <td><?php echo $res->std_pass ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>