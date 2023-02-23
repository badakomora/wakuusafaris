<?php 
include_once '../includes/dbconfiq.php';
if (isset($_GET['id']) AND $_GET['id'] == 'safari'){?>



<?php
$id = $_GET['bid'];
$query = mysqli_query($con, "DELETE FROM tbl_bookings WHERE id ='$id'");
    if($query){
        $msg = "Booking deleted successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=safari';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=safari';
            </script>";
    }
?>






<?php }elseif(isset($_GET['id']) AND $_GET['id'] == 'user'){?>







<?php
$uid = $_GET['uid'];
$query = mysqli_query($con, "DELETE FROM tbl_bookings WHERE id ='$uid'");
    if($query){
        $msg = "User deleted successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=users';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=users';
            </script>";
    }
?>






<?php }elseif(isset($_GET['id']) AND $_GET['id'] == 'message'){?>









<?php
$mid = $_GET['mid'];
$query = mysqli_query($con, "DELETE FROM tbl_messages WHERE id ='$mid'");
    if($query){
        $msg = "message deleted successfully!";
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










<?php }elseif(isset($_GET['id']) AND $_GET['id'] == 'blog'){?>






<?php
$bid = $_GET['bid'];
$query = mysqli_query($con, "DELETE FROM tbl_blogs WHERE id ='$bid'");
    if($query){
        $msg = "Blog deleted successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=blogs';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=blogs';
            </script>";
    }
?>










<?php }elseif(isset($_GET['id']) AND $_GET['id'] == 'image'){?>









<?php
$iid = $_GET['iid'];
$query = mysqli_query($con, "DELETE FROM tbl_gallery WHERE id ='$iid'");
    if($query){
        $msg = "Image deleted successfully!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=gallery';
            </script>";
        
    }else{
        $msg = "An Error ocuured!";
        echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=gallery';
            </script>";
    }
?>












<?php }else{
    $msg = "An Error ocuured!";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/index.php?p=Dashboard';
            </script>";
}
?>