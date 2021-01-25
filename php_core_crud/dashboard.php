<?php
    include_once 'init.php';
    $employee = new Controller();
    //GET ALL RECORDS
    $result = $employee->getAll("employee");
    //DELETE RECORDS
    if (isset($_GET['type']) && $_GET['type'] == 'delete') {
        $id = $employee->getSafeStr($_GET['id']);
        $employee->deleteRecord("employee", $id);
        header("location:dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
    button,
    .deletebtn {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        text-decoration: none;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Float cancel and delete buttons and add an equal width */
    .cancelbtn,
    .deletebtn {
        float: left;
        width: 50%;
    }

    /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .deletebtn, .deletebtn:hover {
        color: black;
        background-color: #f44336;
    }

    /* Add padding and center-align text to the container */
    .container {
        padding: 16px;
        text-align: center;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Modal Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .deletebtn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="text-center">
        <h2>DASHBOARD</h2>
    </div>
    <div class="container-fluid mx-0 px-0">
        <div class="card my-3">
            <div class="card-header">
                <strong>EMPLOYEE DETAILS</strong>
                <a href="add_update_emp.php" class="float-end btn btn-dark btn-sm">ADD EMPLOYEE</a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>EMP ID#</th>
                <th>NAME</th>
                <th>DESIGNATION</th>
                <th>ROLE</th>
                <th>EMAIL</th>
                <th style="max-width:220px!important;">PASSWORD</th>
                <th>Phone No</th>
                <th class="col-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($result[0]) && is_array($result)) {
    foreach ($result as $list) { ?>
            <tr>
                <td><?php echo $list['id'] ?></td>
                <td><?php echo $list['name'] ?></td>
                <td><?php echo $list['designation'] ?></td>
                <td><?php echo $list['role'] ?></td>
                <td><?php echo $list['email'] ?></td>
                <td style="max-width:220px!important; word-wrap: break-word;"><?php echo $list['password'] ?></td>
                <td><?php echo $list['phone_no'] ?></td>
                <td>
                    <a href="add_update_emp.php?type=update&id=<?php echo $list['id'] ?>" class="btn btn-primary">Update</a>
                    <a onclick="document.getElementById('delete').style.display='block'"
                        class="btn btn-danger">Delete</a>

                    <div id="delete" class="modal">
                        <span onclick="document.getElementById('delete').style.display='block'" class="close"
                            title="Close Modal">×</span>
                        <div class="modal-content">
                            <div class="container">
                                <p>Are you sure you want to delete record?</p>
                                <div class="clearfix">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                        class="cancelbtn">Cancel</button>
                                    <a href="?type=delete&id=<?php echo $list['id'] ?>" class="deletebtn">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            <?php }
} else { ?>
            <tr>
                <td colspan=9 class="text-center">No Records Found</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById('delete');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

</html>