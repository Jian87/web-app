
<?php
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $product_id = $_POST['productId'];
    if(count($product_id) > 0) {
        $conn = mysqli_connect('localhost','root','root','project');
        if(!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }

        $check = "SELECT * FROM product WHERE id='".$product_id."'";


        $res = mysqli_query($conn, $check);
        $row = mysqli_fetch_array($res);

        if(count($row) == 0) {
            $uploadOk = 0;
        } else {
            include "addProductToServer.php";
            exit();
        }
    }
    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     echo $check;
        // if($check !== false) {
        //     echo "File is an image - " . $check["mime"] . ".";
        //     $uploadOk = 1;
        // } else {
        //     $product_id = $_POST['productId'];
        //     $conn = mysqli_connect('localhost','root','root','product');
        //     if(!$conn) {
        //         die('Could not connect: ' . mysqli_error($conn));
        //     }

        //     $check = "SELECT * FROM products WHERE id='".$product_id."'";

        //     $res = mysqli_query($conn, $check);
        //     $row = mysqli_fetch_array($res);

        //     if(count($row) == 0) {
        //         $uploadOk = 0;
        //     } else {
        //         include "addProductToServer.php";
        //         exit();
        //     }
        // }
    // }

    // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	include "addProductToServer.php";
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
            echo "<a href='../'> Back To Home</a>";
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo "<a> href='productUpdate.php'> Upload Again</a>";
        }
    }
?>
