<?php 
include_once '../includes/dbconfiq.php';
if (isset($_POST['bookingstatus'])){?>



<?php
$id = $_POST['bid'];
$dos = $_POST['dos'];
$status = $_POST['status'];
$query = mysqli_query($con, "UPDATE tbl_bookings SET status = '$status', dos = '$dos' WHERE id ='$id'");
    if($query){
        $msg = "Booking status updated successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/item.php?p=safari&bid=$id';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/item.php?p=safari&bid=$id';
            </script>";
    }
?>






<?php }elseif (isset($_POST['messagestatus'])){?>







<?php
$mid = $_POST['mid'];
$status = "Read&Replied";
$query = mysqli_query($con, "UPDATE tbl_messages SET status = '$status' WHERE id ='$mid'");
    if($query){
        $msg = "User message replied successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=messages';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=messages';
            </script>";
    }
?>






<?php }elseif (isset($_POST['image'])){?>
    



  <?php  
    $uploadOk = 1;
    $id = $_POST['id'];
    $title = $_POST['title'];
    $images = $_FILES['images']['name'];
    $ext = pathinfo($images, PATHINFO_EXTENSION);
        $query = mysqli_query($con, "UPDATE tbl_gallery SET title = '$title', images = '$images', file_ext = '$ext' WHERE id = '$id'");
        $target = "img/".basename($images);
        move_uploaded_file($_FILES['images']['tmp_name'], $target);
        if ($query == true) {

            $msg = "Image updated successfully!";
            $uploadOk = 1;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=gallery';
        </script>";
        } else {

            $msg = "An error ocuured! File is too large.";
            $uploadOk = 0;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=gallery';
        </script>";
        }?>








<?php }elseif (isset($_POST['updatearticle'])){?>
   

    <?php
    $uploadOk = 1;
    $bid = $_POST['bid'];
    $title = $_POST['title'];
    $inspiration = $_POST['inspiration'];
    $body = $_POST['body'];
    $images = $_FILES['images']['name'];
    $ext = pathinfo($images, PATHINFO_EXTENSION);
        $query = mysqli_query($con, "UPDATE tbl_blogs SET title = '$title', body = '$body', inspiration = '$inspiration', images = '$images', file_ext = '$ext' WHERE id = '$bid'");
        $target = "img/".basename($images);
        move_uploaded_file($_FILES['images']['tmp_name'], $target);
        if ($query == true){

            $msg = "Blog updated successfully!";
            $uploadOk = 1;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=blogs';
        </script>";
        }else {
            $msg = "An error ocuured! File is too large.";
            $uploadOk = 0;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=blogs';
        </script>";
        }
?>







<?php }elseif (isset($_GET['paymentid'])){?>








<?php
$id = $_GET['paymentid'];
$status = 'Payment approved';
$query = mysqli_query($con, "UPDATE tbl_bookings SET status = '$status' WHERE id ='$id'");
    if($query){
        header("location:../admin/item.php?p=safari&bid=$id");
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=safari&as=scheduledSafari';
            </script>";
    }
?>






<?php }elseif (isset($_POST['changepass'])){
    session_start();
    $pass = $_POST['password'];
    $query = mysqli_query($con, "UPDATE admin SET password = '$pass' Where email ='".$_SESSION['email']."'");
    if($query){
        $msg ="Password updated successfully! Sign in with the new password.";
        echo "<script type='text/javascript'>
        alert('$msg');
        window.location = '../includes/logout.php';
    </script>";
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/?p=Dashboard';
            </script>";
    }



 






}else{
    $msg = "An Error ocuured!";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=Dashboard';
            </script>";
}
?>