<?php
    require_once "connection.php";

    if (isset($_POST['btn_insert'])) {
        try {
            $name = $_REQUEST['uname'];
            $email = $_REQUEST['uemail'];
            $image_file = $_FILES['uimage']['name'];
            $type = $_FILES['uimage']['type'];
            $size = $_FILES['uimage']['size'];
            $temp = $_FILES['uimage']['tmp_name'];

            $path = "uploads/".$image_file;
            
            if (empty($name)) {
                $errorMsg = "Please Enter Name";
            }
            if (empty($email)) {
                $errorMsg = "Please Enter Email";
            }
            if (empty($image_file)) {
                $errorMsg = "Please Select Image";
            } elseif ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png") {
                if (!file_exists($path)) {
                    if ($size <= 5000000) {
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
            
            if (empty($errorMsg)) {
                $stmt = $conn->prepare("INSERT INTO profile(name,image,email) VALUES(:uname,:uimage,:uemail)");
                $stmt->bindParam(":uname", $name);
                $stmt->bindParam(":uimage", $image_file);
                $stmt->bindParam(":uemail", $email);
                if ($stmt->execute()) {
                    $insertMsg = "Form Submitted Successfully...";
                    header("refresh:1;index.php");
                }
            }
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
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
                <?php if (isset($insertMsg)) { ?>
                <div class="alert alert-success py-1">
                    <h3 class="my-0 py-0"><?php echo $insertMsg; ?></h3>
                </div>
                <?php } elseif (isset($errorMsg)) { ?>
                <div class="alert alert-danger py-1">
                    <h3 class="my-0 py-0"><?php echo $errorMsg; ?></h3>
                </div>
                <?php } ?>
                <div class="row text-white">
                    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto text-center p-4 form">
                        <h1 class="display-5 py-2 text-truncate">Add User Details</h1>
                        <form method="POST" enctype="multipart/form-data" class="justify-content-center">
                            <div class="form-group">
                                <label class="control-label float-left font-weight-bold" for="name">Name</label>
                                <input type="text" name="uname" class="form-control" placeholder="Jane Doe">
                            </div>
                            <div class="form-group">
                                <label class="control-label float-left font-weight-bold" for="uimage">Your Image</label>
                                <input type="file" name="uimage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label float-left font-weight-bold" for="uemail">Email</label>
                                <input type="email" name="uemail" class="form-control"
                                    placeholder="jane.doe@example.com">
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" name="btn_insert" class="btn btn-success px-4" value="Add">
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