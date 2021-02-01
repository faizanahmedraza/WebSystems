<?php
    require_once "connection.php";
    $name = $image = $email = '';
    if(isset($_REQUEST['update_id'])){
        try {
            $id = $_REQUEST['update_id'];
            $stmt = $conn->prepare("SELECT * FROM profile WHERE id =:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        }
        catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

        if(isset($_REQUEST['btn_update'])){
            try {
                $name = $_REQUEST['uname'];
                $email = $_REQUEST['uemail'];
                $image_file = $_FILES['uimage']['name'];
                $type = $_FILES['uimage']['type'];
                $size = $_FILES['uimage']['size'];
                $temp = $_FILES['uimage']['tmp_name'];
    
                $path = "uploads/".$image_file;
                $directory = "uploads/";

                if (empty($name)) {
                    $errorMsg = "Please Enter Name";
                }
                if (empty($email)) {
                    $errorMsg = "Please Enter Email";
                }
                if (!empty($image_file)) {
                    $errorMsg = "Please Select Image";
                    if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
                        if (!file_exists($path)) {
                            if ($size <= 5000000) {
                                unlink($directory.$row['image']);
                                move_uploaded_file($temp, $path);
                            } else {
                                $errorMsg = "Your File To Large Please Upload file Atmost 5MB size";
                            }
                        } else {
                            $errorMsg = "File Already Exists... Please Enter the New one!";
                        }
                    } else {
                        $errorMsg = "Upload JPG, JPEG OR PNG Format only!";
                    }
                } else {
                    $image_file = $row['image'];
                }

                if (empty($errorMsg)) {
                    $stmt = $conn->prepare("UPDATE profile SET name =:uname, image =:uimage, email =:uemail WHERE id =:id");
                    $stmt->bindParam(":uname", $name);
                    $stmt->bindParam(":uimage", $image_file);
                    $stmt->bindParam(":uemail", $email);
                    $stmt->bindParam(":id", $id);
                    if ($stmt->execute()) {
                        $updateMsg = "Form Updated Successfully...";
                        header("refresh:1;index.php");
                    }
                }
            } 
            catch(PDOException $e){
                echo "Error: ".$e->getMessage();
            }
        }
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
    #cover {
        /* background: background-color url background-position background-repeat */
        background: #222 url('https://unsplash.it/1920/1080/?random') center center no-repeat;
        background-size: cover;
        height: 100vh;
        text-align: center;
        display: flex;
        align-items: center;
        position: relative;
    }

    #cover-caption {
        width: 100vw;
        position: relative;
        z-index: 1;
    }

    /*only used for background overlay not needed for centering*/
    form:before {
        content: '';
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: -1;
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <section id="cover" class="mh-100">
        <div id="cover-caption">
            <div class="container">
                <?php if(isset($updateMsg)) { ?>
                <div class="alert alert-success py-1">
                    <h3 class="my-0 py-0"><?php echo $updateMsg; ?></h3>
                </div>
                <?php } ?>
                <div class="row text-white">
                    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto text-center p-4 form">
                        <h1 class="display-5 py-2 text-truncate">Add User Details</h1>
                        <form method="POST" enctype="multipart/form-data" class="justify-content-center">
                            <div class="form-group">
                                <label class="control-label float-left font-weight-bold" for="name">Name</label>
                                <input type="text" name="uname" class="form-control" placeholder="Jane Doe"
                                    value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label float-left font-weight-bold" for="uimage">Your Image</label>
                                <input type="file" name="uimage" class="form-control" value="<?php echo $image; ?>">
                                <p class="float-left pt-2 pb-0 mb-0"><img src="uploads/<?php echo $image; ?>" height="100" width="100" alt="profile"></p>
                            </div>
                            <div class="form-group" style="margin-top:120px;">
                                <label class="control-label float-left font-weight-bold" for="uemail">Email</label>
                                <input type="email" name="uemail" class="form-control"
                                    placeholder="jane.doe@example.com" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" name="btn_update" class="btn btn-success px-4" value="Update">
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>