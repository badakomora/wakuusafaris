<?php
include '../includes/dbconfiq.php';
if(isset($_POST['booksafari'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $package = $_POST['package'];
    $safari = $_POST['safari'];
    $dob = $_POST['dob'];
    $dos = $_POST['dos'];
    $ps = $_POST['ps'];
    $se = $_POST['smthelse'];

    $select = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE email = '$email' AND safari = '$safari' AND dob = '$dob' AND dos = '$dos'");
    if(mysqli_num_rows($select) >= 1){
    $msg = "An error occurred! You cannot book twice.";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../';
            </script>";
    }else{
        mysqli_query($con, "INSERT INTO tbl_bookings(firstname, lastname, phone, email, package, safari, dob, dos, photosession, somethingelse) VALUES('$fname', '$lname', '$phone', '$email', '$package', '$safari', '$dob', '$dos', '$ps', '$se')");
       $msg = "Booking successful. You will receive an email with your booking status after your payment is confirmed. Thank you for choosing Wakuu Safari.";
        echo "<script type='text/javascript'>
                    alert('$msg');
                    window.location = '../';
                </script>";
    }
}










if(isset($_POST['contact'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $thoughts = $_POST['thoughts'];
 

    $select = mysqli_query($con, "SELECT * FROM tbl_messages WHERE email = '$email' AND thoughts = '$thoughts' AND phone = '$phone'");
    if(mysqli_num_rows($select) >= 1){
    $msg = "An error occurred! You cannot contact us twice on matters concerning the same inquiry.";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../';
            </script>";
    }else{
        mysqli_query($con, "INSERT INTO tbl_messages(email, phone, subject, thoughts) VALUES('$email', '$phone', '$subject', '$thoughts')");
       $msg = "Sent successful. You will receive an email as response from Wakuu safaris.";
        echo "<script type='text/javascript'>
                    alert('$msg');
                    window.location = '../';
                </script>";
    }
}













if (isset($_POST['postimage'])){
    $uploadOk = 1;
    $title = $_POST['title'];
    $images = $_FILES['images']['name'];
    $ext = pathinfo($images, PATHINFO_EXTENSION);
    $lessons = mysqli_query($con, "SELECT * FROM tbl_gallery WHERE images = '$images' AND file_ext = '$ext'");
    $lessonrows = mysqli_num_rows($lessons);
    if ($lessonrows >= 1) {
        $msg = "Image already Exists!";
        $uploadOk = 0;
        echo "<script type='text/javascript'>
        alert('$msg');
        window.location = '../admin/?p=gallery';
    </script>";
    } else {

        $query = mysqli_query($con, "INSERT INTO tbl_gallery(title, images, file_ext) VALUES('$title', '$images', '$ext')");
        $target = "img/".basename($images);
        move_uploaded_file($_FILES['images']['tmp_name'], $target);
        if ($query == true) {

            $msg = "Image added successfully!";
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
        }
    }
}














if (isset($_POST['postarticle'])){
    $uploadOk = 1;
    $title = $_POST['title'];
    $inspiration = $_POST['inspiration'];
    $body = $_POST['body'];
    $images = $_FILES['images']['name'];
    $ext = pathinfo($images, PATHINFO_EXTENSION);
    $lessons = mysqli_query($con, "SELECT * FROM tbl_blogs WHERE title = '$title' AND inspiration = '$inspiration'");
    $lessonrows = mysqli_num_rows($lessons);
    if ($lessonrows >= 1) {
        $msg = "Blog Already Exists!";
        $uploadOk = 0;
        echo "<script type='text/javascript'>
        alert('$msg');
        window.location = '../admin/?p=blogs';
    </script>";
    } else {

        $query = mysqli_query($con, "INSERT INTO tbl_blogs(title, body, inspiration, images, file_ext) VALUES('$title', '$body', '$inspiration', '$images', '$ext')");
        $target = "img/".basename($images);
        move_uploaded_file($_FILES['images']['tmp_name'], $target);
        if ($query == true){

            $msg = "Blog Added successfully!";
            $uploadOk = 1;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=blogs';
        </script>";
        }else {
            $msg = "An Error ocuured! File is too large.";
            $uploadOk = 0;
            echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=blogs';
        </script>";
        }
    }
}
?>



<?php 

if(isset($_POST['addsafari'])){

   include '../includes/dbconfiq.php';
   $package_id = $_POST['package_id'];
   $safariname = $_POST['safariname'];
   $itineraryname = $_POST['itineraryname'];
   $location = $_POST['location'];
   $content = $_POST['content'];
   $file = $_FILES['file'];

   $caption1 = $_POST['caption1'];
   $caption2 = $_POST['caption2'];
   $caption3 = $_POST['caption3'];
   $carouselcaptions = $caption1.",".$caption2.",".$caption3;

   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];

   $files = "";
   $pos = 0;
   foreach ($_FILES['file']['name'] as $value) {
       
       $fileName = $_FILES['file']['name'][$pos];
       $fileTmpName = $_FILES['file']['tmp_name'][$pos];
       $fileSize = $_FILES['file']['size'][$pos];
       $fileError = $_FILES['file']['error'][$pos];
       $fileType = $_FILES['file']['type'][$pos];

       $fileExt = explode('.', $_FILES['file']['name'][$pos]);
       $fileActualExt = strtolower(end($fileExt));

       $allowde = array('jpg','jpeg','png','jpg','gif','jfif', 'webp', 'avif');

       if (in_array($fileActualExt, $allowde)) {
           if ($fileError === 0) {
               if($fileSize < 6000000){
                   $fileNameNew = uniqid('', true).".".$fileActualExt;
                   $fileDestination = "img/".$fileNameNew;
                   move_uploaded_file($fileTmpName, $fileDestination);

                   if($pos == 0){
                       $files = $fileDestination;
                   }else{
                       $files .= ",".$fileDestination;
                   }
               }else{
               }
           }else{
           }
       }else{
       }

       $pos++;
   }

   $select = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '$package_id' AND safariname = '$safariname'");
    if(mysqli_num_rows($select) >= 1){
    $msg = "An error occurred! Safari already exists.";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/?p=Dashboard';
            </script>";
    }else{
        $insert_sql = "INSERT INTO tbl_safari(pid, safariname, itineraryname, location, content, carouselimages, carouselcaptions) 
        VALUES('$package_id', '$safariname', '$itineraryname', '$location', '$content', '".$files."', '$carouselcaptions')";
        mysqli_query($con, $insert_sql) or die("database error: ". mysqli_error($con));
        $msg = "Safari created successfully. You can now add the itinerary to this safari.";
                 $uploadOk = 0;
                 echo "<script type='text/javascript'>
                 alert('$msg');
                 window.location = '../admin/?p=Dashboard';
             </script>";
    }
}

?>








<?php
include '../includes/dbconfiq.php';
if(isset($_POST['itinerarybtn'])){
    $sid = $_POST['sid'];
    $day = $_POST['day'];
    $title = $_POST['title'];
    $time1 = $_POST['time1'];
    $descr1 = $_POST['descr1'];
    $time2 = $_POST['time2'];
    $descr2 = $_POST['descr2'];
    $time3 = $_POST['time3'];
    $descr3 = $_POST['descr3'];
    $time4 = $_POST['time4'];
    $descr4 = $_POST['descr4'];
    $time5 = $_POST['time5'];
    $descr5 = $_POST['descr5'];




    if(empty($descr1)){
        $descr1 = 'Null';
    }if(empty($descr2)){
        $descr2 = 'Null';
    }if(empty( $descr3)){
        $descr3 = 'Null';
    }if(empty( $descr4)){
        $descr4 = 'Null';
    }if(empty( $descr5)){
        $descr5 = 'Null';
    }






    $select = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id = '$sid' AND day = '$day'");
    if(mysqli_num_rows($select) >= 1){
    $msg = "An error occurred! Itinerary already exists.";
    echo "<script type='text/javascript'>
                alert('$msg');
                window.location = '../admin/?p=Dashboard';
            </script>";
    }else{
        mysqli_query($con, "INSERT INTO tbl_itineraries(safari_id, day, itinerarytitle, first_descr_time, first_descr, second_descr_time, second_descr, third_descr_time, third_descr, fourth_descr_time, fourth_descr, fifth_descr_time, fifth_descr) 
        VALUES('$sid', '$day', '$title', '$time1', '$descr1', '$time2', '$descr2', '$time3', '$descr3', '$time4', '$descr4', '$time5', '$descr5')");
       $msg = "Itinerary created successful.";
        echo "<script type='text/javascript'>
                    alert('$msg');
                    window.location = '../admin/?p=Dashboard';
                </script>";
    }
}





include '../includes/dbconfiq.php';
if(isset($_POST['addtable'])){

    $sid = $_POST['sid'];
    $accom = $_POST['accom'];
    $mealplan1 = $_POST['mealplan1'];
    $mealplan2 = $_POST['mealplan2'];
    $decfeb1 = $_POST['decfeb1'];
    $decfeb2 = $_POST['decfeb2'];
    $marmay1 = $_POST['marmay1'];
    $marmay2 = $_POST['marmay2'];
    $junaug1 = $_POST['junaug1'];
    $junaug2 = $_POST['junaug2'];
    $sepnov1 = $_POST['sepnov1'];
    $sepnov2 = $_POST['sepnov2'];
    $descr1 = $_POST['descr1'];
    $descr2 = $_POST['descr2'];
    
    mysqli_query($con, "INSERT INTO tbl_tables(sid, accom, mealplan1, mealplan2, DecFeb1, DecFeb2, MarMay1, MarMay2, JunAug1, JunAug2, SepNov1, SepNov2, descr1, descr2) 
    VALUES('$sid', '$accom', '$mealplan1', '$mealplan2', 'Ksh$decfeb1', 'Ksh$decfeb2', 'Ksh$marmay1', 'Ksh$marmay2', 'Ksh$junaug1', 'Ksh$junaug2', 'Ksh$sepnov1', 'Ksh$sepnov2', '$descr1', '$descr2')");
    $msg = "The column has been added successful. You can also add other columns.";
    echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=Dashboard';
        </script>";
}





include '../includes/dbconfiq.php';
if(isset($_POST['addgateway'])){

    $sid = $_POST['sid'];
    $gateway = $_POST['gateway'];
    $content = $_POST['content'];
    
    mysqli_query($con, "INSERT INTO tbl_gateway(sid, gateway, content) 
    VALUES('$sid', '$gateway', '$content')");
    $msg = "The gateway content has been added successful.";
    echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=Dashboard';
        </script>";
}



include '../includes/dbconfiq.php';
if(isset($_POST['addprice'])){

    $sid = $_POST['sid'];
    $area = $_POST['area'];
    $plan = $_POST['plan'];
    
    mysqli_query($con, "INSERT INTO tbl_prices(sid, Area, Plan) 
    VALUES('$sid', '$area', '$plan')");
    $msg = "The Price plan has been added successful.";
    echo "<script type='text/javascript'>
            alert('$msg');
            window.location = '../admin/?p=Dashboard';
        </script>";
}




