<?php
    require_once "connection.php";

    if(isset($_REQUEST['delete_id'])){
        $id = $_REQUEST['delete_id'];
        $stmt = $conn->prepare("SELECT * FROM profile WHERE id =:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        unlink("uploads/".$row["image"]);

        $stmt = $conn->prepare("DELETE FROM profile WHERE id =:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        header("refresh:1;index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .add-btn {
            position: absolute;
            right: 20px;
            bottom: 20px;
        }
        .add-btn > .btn {
            padding:10px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="add-btn">
        <a href="add.php" class="btn btn-success">Add Profile</a>
    </div>
    <div class="container mt-3">
        <div class="alert alert-primary my-3 text-center">
            <h3>Admin Panel</h3>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>User Id#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM profile");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr>
                        <td class="align-middle"><?php echo $row['id']; ?></td>
                        <td><img src="uploads/<?php echo $row['image']; ?>" height="100" width="100"
                                alt="<?php echo $row['image']; ?>"></td>
                        <td class="align-middle"><?php echo $row['name']; ?></td>
                        <td class="align-middle"><?php echo $row['email']; ?></td>
                        <td class="align-middle">
                            <a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>