<?php require_once "Db.php";
session_start(); ?>
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
    <?php if (isset($_SESSION['records_created'])) : ?>
        <div class="alert">
            <p>
                Record has been saved!!
            </p>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
    <?php endif; ?>
    <?php unset($_SESSION['records_created']); ?>
    <div class="welcome">
        <h2>Welcome to dashboard</h2>
        <br>
        <a href="index.php"><button>Go Back</button></a>
    </div>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <th>
                    Employee Id
                </th>
                <th>
                    Employee Name
                </th>
                <th>
                    Employee Father Name
                </th>
                <th>
                    Employee Designation
                </th>
                <th>
                    Employee Salary
                </th>
                <th>
                    Employee Organization
                </th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employee";
                if ($run = mysqli_query($conn, $sql)) {
                    while ($data = mysqli_fetch_assoc($run)) {
                ?>
                        <tr>
                            <td><?php echo $data['emp_id'] ?></td>
                            <td><?php echo $data['emp_name'] ?></td>
                            <td><?php echo $data['emp_father_name'] ?></td>
                            <td><?php echo $data['emp_designation'] ?></td>
                            <td><?php echo $data['emp_salary'] ?></td>
                            <td><?php echo $data['emp_organization'] ?></td>
                        </tr><?php
                            }
                        } else {
                            echo "<tr>No records found!</tr>";
                        }
                                ?>
            </tbody>
        </table>
    </div>
</body>

</html>