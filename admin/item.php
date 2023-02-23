<?php
session_start();
if (!isset($_SESSION['email'])) {
    $msg = "Please Sign In Correctly or your Account will be De-activated Completely!";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh: 0, ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<?php if (isset($_GET['p']) and $_GET['p'] == 'safari') { ?>



  <?php      
        include '../includes/dbconfiq.php';
        $bookings = mysqli_query($con, "SELECT * FROM tbl_bookings 
        Where tbl_bookings.id = '" . $_GET['bid'] . "'");
        while ($blogsrows = mysqli_fetch_array($bookings)) {?>
  <div class="wrapper">
  <div class="card">
    <h3>Package (safari) </h3>
    <hr>
    <h4><?php echo $blogsrows['package'];?> (<?php echo $blogsrows['safari']?>).</h4>
    <br><br>
    <h4>Date of Booking : <span><?php echo $blogsrows['dob'];?></span></h4>
    <h4>Date of Safari : <span><?php echo $blogsrows['dos'];?></span></h4>
    <hr>
    <h4>Additional Infrmation</h4>
    <p class="card-content"><?php echo $blogsrows['somethingelse'];?></p>
    <br>
        <div>
            <p class="card-content"><b>First Name :</b> <span><?php echo $blogsrows['firstname'];?></span></p>
            <p class="card-content"><b>Last Name :</b> <span><?php echo $blogsrows['lastname'];?></span></p>
        </div>
        <div>
            <p class="card-content"><b>Email :</b> <span><?php echo $blogsrows['email'];?></span></p>
            <p class="card-content"><b>Phone :</b> <span><?php echo $blogsrows['phone'];?></span></p>
            <br>
        </div>

            <?php if ($blogsrows['status'] == 'Payment approved') {?>
              <p class="card-content"><i>Current status: <b class="text-primary"><?php echo $blogsrows['status']; ?></b></i></p>
              <b>Note:</b> <a class="text-success" href="mailto:<?php echo $blogsrows['email'];?>?subject=Booking Approval&body=Dear <?php echo $blogsrows['email'];?>, I hope you are doing well. I want to inform you that your safari booking has been approved successfully. We hope you will keep time on the day of safari. We hope this safari will bring you an experience of a life time, growth and development. Also, do not forget to contact us for your offer if you get approved upto 10 safari. Stay safe, Wakuu Safari">Send user approval Email.</a>
            
            <?php }else if($blogsrows['status'] == 'pending') {?>
              <p class="card-content"><i>Current status: <b class="text-warning"><?php echo $blogsrows['status']; ?></b></i></p>
              <b>Final step:</b> <a class="text-warning" href="mailto:<?php echo $blogsrows['email'];?>?subject=Booking postponement&body=Dear <?php echo $blogsrows['email'];?>, We are writing to inform you that the date of your safari was postponed to <?php echo $blogsrows['dos']; ?> and therefore you are scheduled for this safari. Please accept our apologies for the inconvenience caused.  We hope you will keep time on the day of safari. We hope this safari will bring you an experience of a life time, growth and development. Also, do not forget to contact us for your offer if you get approved upto 10 safari. Thank you, Wakuu Safari.">Send User feedback on the agreed date of Safari</a>& Schedule this Booking.
           


              <form action="../forms/update.php" method="post">
                  <input type="hidden" name="bid" value="<?php echo $blogsrows['id'];?>">
                  <input style="display:none;" type="date" name="dos" value="<?php echo $blogsrows['dos'];?>">
                  <div id="approve">
                    <input type="hidden" name="status" value="scheduled">
                    <button class="card-btn" type="submit" name="bookingstatus">Schedule Booking</button>  
                  </div>
              </form>
           
            <?php }else{?>
              <?php if ($blogsrows['status'] == 'scheduled') {?>
              <p class="card-content"><i>Current status: <b class="text-success"><?php echo $blogsrows['status']; ?></b></i></p>
              <?php }else if($blogsrows['status'] == 'Canceled') {?>
                <p class="card-content"><i>Current status: <b class="text-danger"><?php echo $blogsrows['status']; ?></b></i></p>
              <?php }else{?>
                <p class="card-content"><i>Current status: <b class="text-dark"><?php echo $blogsrows['status']; ?></b></i></p>
              <?php }?>

              <form action="../forms/update.php" method="post">
                  <input type="hidden" name="bid" value="<?php echo $blogsrows['id'];?>">
                  <div class="form-group" id="status_div">   
                  <br>
                  <label class="card-content"><b>Update user booking status</b></label> <hr>
                    <select name="status" onchange="updateStatus(this)" style="height: 35px;border-radius:5px;color:black;">
                      <option value="<?php echo $blogsrows['status'];?>">Current status:<?php echo $blogsrows['status'];?></option>
                      <option value="scheduled">schedule</option>
                      <option value="Canceled">Cancel</option>
                      <option value="pending">postpone</option>
                    </select>
                  </div>
                  <br>
                  <div id="approve" style="display: none;">
                    <button class="card-btn" type="submit" name="bookingstatus">Approve Booking</button>  
                  </div>

                  <div id="cancel" style="display: none;">
                    <b>Note:</b> <a href="mailto:<?php echo $blogsrows['email'];?>?subject=Booking Declination&body=Dear <?php echo $blogsrows['email'];?>, thanks for your latest safari booking proposal. We appreciate the time you've taken to personalize it for our business. Still, it's not something we're interested in taking forward at this stage. If our plans change, We'll be in touch. For any inquiries, please contact us via our website. Stay Safe, Wakuu safari.">Decline with Email</a> & Cancel Booking.
                    <button class="card-btn" type="submit" name="bookingstatus">Cancel Booking</button>  
                  </div>

                  <div id="pending" style="display: none;">
                    <b>Step 1:</b> <a href="mailto:<?php echo $blogsrows['email'];?>?subject=Booking postponement&body=Dear <?php echo $blogsrows['email'];?>, We are writing to inform you that you will no longer be able to safiri with wakuu safari on <?php echo $blogsrows['dos'];?> due to an unanticipated conflict in scheduling. Please accept our apologies for the inconvenience caused. It would be much appreciated if it's possible to reschedule it to a date that will be suitable for both parties. Stay Safe, Wakuu Safari.">reply with Email</a>and <a href="tel:<?php echo $blogsrows['phone'];?>">call client</a> to agree on a convinient new date of safari.
                    <br><br>
                    <p><b>Step 2:</b> Now Update the new date of safari as agreed and postpone booking.</p>
                    <br>
                    <label for="">New date of Safari</label>
                    <input type="date" name="dos" value="<?php echo $blogsrows['dos'];?>">
                    <br><br>
                    <button class="card-btn" type="submit" name="bookingstatus">Postpone Booking</button> 
                    <br> 
                  </div>
            </form>

                          <script type="text/javascript">
                            function updateStatus(select) {
                              if (select.value == 'scheduled') {
                                document.getElementById('approve').style.display = "block";
                                document.getElementById('cancel').style.display = "none";
                                document.getElementById("cancel").disabled = true;
                                document.getElementById('pending').style.display = "none";
                                document.getElementById("pending").disabled = true;
                              }else if(select.value == 'Canceled') {
                                document.getElementById('cancel').style.display = "block";
                                document.getElementById('approve').style.display = "none";
                                document.getElementById("approve").disabled = true;
                                document.getElementById('pending').style.display = "none";
                                document.getElementById("pending").disabled = true;
                              }else if(select.value == 'pending'){
                                document.getElementById('pending').style.display = "block";
                                document.getElementById('approve').style.display = "none";
                                document.getElementById("approve").disabled = true;
                                document.getElementById('cancel').style.display = "none";
                                document.getElementById("cancel").disabled = true;
                              }else{
                                document.getElementById("approve").disabled = true;
                                document.getElementById('approve').style.display = "none";
                                document.getElementById("cancel").disabled = true;
                                document.getElementById('cancel').style.display = "none";
                                document.getElementById("pending").disabled = true;
                                document.getElementById('pending').style.display = "none";
                              }
                            }
                          </script>

            <?php }?>
            <a href="../admin/index.php?p=safari" style="text-decoration:none;color:black;">Go back &raquo;</a>

    </div>
  </div>


  <style>
     @import url('https://fonts.googleapis.com/css?family=Roboto');
 body{
     font-family: 'Roboto', sans-serif;
}
 h1{
     text-align: center;
     color: #4181ee;
}
 .wrapper{
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
}
 .card{
    max-width: 450px;
     min-height: 250px;
     background: #02b875;
     padding: 30px;
      border-radius: 3px;
     box-sizing: border-box;
     color: #FFF;
     margin:20px;
      box-shadow: rgb(50 50 93 / 25%) 0px 30px 60px -12px, rgb(0 0 0 / 30%) 0px 18px 36px -18px;
}
 .card:nth-child(2){
    background: #4181ee;
}
 .card:last-child{
    background: #673ab7;
}
 .card-title{
     margin-top: 0;
     font-size: 16px;
     font-weight: 600;
     letter-spacing: 1.2px;
}
 .card-content{
     font-size: 14px;
     letter-spacing: 0.5px;
     line-height: 1.5;
}
 .card-btn{
     all: unset;
     display: block;
     margin-left: auto;
     border: 2px solid #FFF;
     padding: 10px 15px;
     border-radius: 25px;
     font-size: 10px;
     font-weight: 600;
     transition: all 0.5s;
     cursor: pointer;
     letter-spacing: 1.2px;
}
 .card-btn:hover{
    color:#02b875;
    background: #FFF;
}
 .card:nth-child(2) .card-btn:hover{
    color:#4181ee;
    background: #FFF;
}
 .card:last-child .card-btn:hover{
    color:#673ab7;
     background: #FFF;
}

  </style>
    <?php }?>








<?php  } elseif (isset($_GET['p']) and $_GET['p'] == 'users') { ?>



  <?php  
    include '../includes/dbconfiq.php';
    $bookings = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE id = '".$_GET['bid']."'");
    while ($blogsrows = mysqli_fetch_array($bookings)) {?>
  <div class="wrapper">
  <div class="card">
    <h3><?php echo $blogsrows['firstname'];?> <?php echo $blogsrows['lastname']?>.</h3>
    <h4 class="card-content">Joined: <span><?php echo $blogsrows['dob'];?></span></h4>
    <hr>
    <div class="card-content">
            <p>Email: <span><?php echo $blogsrows['email'];?></span></p>
            <p>Phone: <span><?php echo $blogsrows['phone'];?></span></p>
    </div>
    <br>
      <p class="card-content">Approved Safari : <?php  
                include '../includes/dbconfiq.php';
                $bookings = mysqli_query($con, "SELECT count(*) as count FROM tbl_bookings WHERE email = '".$_GET['userid']."' AND status = 'scheduled'");
                while ($rows = mysqli_fetch_array($bookings)) {
                   echo $rows['count'];
                }?>
      </p>

      <p class="card-content">Cancelled Safari : <?php  
                include '../includes/dbconfiq.php';
                $bookings = mysqli_query($con, "SELECT count(*) as count FROM tbl_bookings WHERE email = '".$_GET['userid']."' AND status = 'Canceled'");
                while ($rows = mysqli_fetch_array($bookings)) {
                    echo $rows['count'];
                }?>
      </p>
                <?php  
                include '../includes/dbconfiq.php';
                $bookings = mysqli_query($con, "SELECT count(*) as count_offer FROM tbl_bookings WHERE email = '".$_GET['userid']."' AND status = 'Payment approved'");
                while ($rows = mysqli_fetch_array($bookings)) {
                if($rows['count_offer'] == 10){?>
                <button class="card-btn">Offer</button>
                <?php }else{?>
                <p class="text-warning">Offer not ready, get approved upto 10 safari.</p>
                <?php }?>
                   
                <?php }?>
                <a href="../admin/index.php?p=users" style="text-decoration:none;color:black;">Go back &raquo;</a>
    </div>
  </div>


  <style>
     @import url('https://fonts.googleapis.com/css?family=Roboto');
 body{
     font-family: 'Roboto', sans-serif;
}
 h1{
     text-align: center;
     color: #4181ee;
}
 .wrapper{
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
}
 .card{
    max-width: 300px;
     min-height: 250px;
     background: #02b875;
     padding: 30px;
      border-radius: 3px;
     box-sizing: border-box;
     color: #FFF;
     margin:20px;
      box-shadow: rgb(50 50 93 / 25%) 0px 30px 60px -12px, rgb(0 0 0 / 30%) 0px 18px 36px -18px;
}
 .card:nth-child(2){
    background: #4181ee;
}
 .card:last-child{
    background: #673ab7;
}
 .card-title{
     margin-top: 0;
     font-size: 16px;
     font-weight: 600;
     letter-spacing: 1.2px;
}
 .card-content{
     font-size: 14px;
     letter-spacing: 0.5px;
     line-height: 1.5;
}
 .card-btn{
     all: unset;
     display: block;
     margin-left: auto;
     border: 2px solid #FFF;
     padding: 10px 15px;
     border-radius: 25px;
     font-size: 10px;
     font-weight: 600;
     transition: all 0.5s;
     cursor: pointer;
     letter-spacing: 1.2px;
}
 .card-btn:hover{
    color:#02b875;
    background: #FFF;
}
 .card:nth-child(2) .card-btn:hover{
    color:#4181ee;
    background: #FFF;
}
 .card:last-child .card-btn:hover{
    color:#673ab7;
     background: #FFF;
}

  </style>
    <?php }?>















<?php  } elseif ($_GET['p'] == 'blogs') { ?>





  <?php  
    include '../includes/dbconfiq.php';
        $blogs = mysqli_query($con, "SELECT * FROM tbl_blogs WHERE id = '".$_GET['bid']."'");
        while ($blogsrows = mysqli_fetch_array($blogs)) {?>







    <article class="article">
        <div class="article__body">
            <section class="header">
                <span class="header__cat"><?php echo $blogsrows['posted'];?></span>
                <h1 class="header__title"><?php echo $blogsrows['title'];?></h1>
            </section>
    
            <section class="text-block rich-text">
                <p><?php echo $blogsrows['body'];?></p>
                <hr>
                <br>
                <b>Inspiration :</b>  <?php echo $blogsrows['inspiration'];?>
                <br><br>
                <a class="btn btn-warning text-white" type="button" data-toggle="modal" data-target="#Editblog">Edit Blog</a>
                <!-- Modal -->
<div class="modal fade" id="Editblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update this article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/update.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
                          <div class="form-group">                   
                            <label for="" class="">Article Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title"  value="<?php echo $blogsrows['title'];?>"/>                 
                            <label for="" class="">Inspiration behind</label>
                            <br>
                            <textarea name="inspiration" cols="58" rows="3" maxlength="400" style="border: lavender 1px solid;"><?php echo $blogsrows['inspiration'];?></textarea>
                          </div>
                          <div class="form-group"> 
                          <label for="" class="">Article Content</label>  
                          <input type="hidden" name="bid" value="<?php echo $_GET['bid'];?>">
                          <br>                
                          <textarea name="body" cols="58" rows="3" maxlength="800" style="border: lavender 1px solid;"><?php echo $blogsrows['body'];?></textarea>
                          </div>
                          <div class="form-group">                   
                            <label for="" class="">Upload photo</label>
                            <input type="file" name="images" class="form-control"  required/> 
                            <img src="../forms/img/<?php echo $blogsrows['images'] ?>" width="40" height="40" alt="">
                          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatearticle" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
                <br>
                <a href="../admin/index.php?p=blogs" style="text-decoration:none;color:black;">Go back &raquo;</a>
              </section>
        </div>
    
        <div class="article__image">
            <div class="article__image-wrapper">
                <img src="../forms/img/<?php echo $blogsrows['images'];?>" alt="">
            </div>
        </div>
    </article>


<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Prata&display=swap');

:root {
  --f-headline: 'Prata', serif;
  --f-body: 'Open Sans', sans-serif;

  --c-primary: #e24630;
  --c-darkest: #4c4f55;
  --c-lightest: #ffffff;
}

* {
    padding: 0;
    margin: 0;
    border: 0;
    box-sizing: border-box;
}

html {
    font-size: 62.5%;
}

body {
    font-size: 1.6rem;
    line-height: 1.625;
    font-family: var(--f-body);
    color: var(--c-darkest);
}

/* WYWIWG Styles */

.rich-text p {
    font-size: 1.6rem;
}

.rich-text a {
    color: var(--c-primary);
}

.rich-text h1,
.rich-text h2,
.rich-text h3,
.rich-text h4 {
    font-family: var(--f-headline);
    padding-top: 4rem
}

.rich-text h1 {
    font-size: 3.6rem;
}

.rich-text h2 {
    font-size: 2.8rem;
}

.rich-text h3 {
    padding-top: 2rem;
    font-size: 2.2rem;
}

.rich-text li:not(:last-child) {
    margin-bottom: 1.2rem;
}

.rich-text ul li {
    position: relative;
    display: block;
    padding-left: 1.8rem;
}

.rich-text ul li:after {
    content: '';
    display: block;
    height: .6rem;
    width: .6rem;
    position: absolute;
    top: .9rem;
    left: 0;
    border-radius: 100%;
    background-color: var(--c-primary);
}


.rich-text > *:not(:last-child) {
    margin-bottom: 4rem;
}

.article {
  display: flex;
  align-items: flex-start;
  min-height: 100vh;
}

.article__body {
  width: 50%;
  padding: 20vh 5%;
  max-width: 70rem;
  margin-left: auto;
  margin-right: auto;
}

.article__image {
  position: sticky;
  top: 0;
  width: 50%;
}

.article__image-wrapper {
    position: relative;
    min-height: 100vh;
}

.article__image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header {
    margin-bottom: 20rem;
}

.header__cat {
    display: block;
    text-transform: uppercase;
    font-size: 1.1rem;
    margin-bottom: 3rem;
    letter-spacing: 0.1rem;
    font-family: var(--f-body);
    font-weight: bold;
    opacity: .6;
}

.header__title {
    font-size: 4.2rem;
    font-family: var(--f-headline);
    color: var(--c-primary);
    line-height: 1.15;
}
</style>
<?php }?>




<?php  } elseif ($_GET['p'] == 'messages') { ?>

  <?php      
    include '../includes/dbconfiq.php';
    $bookings = mysqli_query($con, "SELECT * FROM tbl_messages Where tbl_messages.id = '" . $_GET['bid'] . "'");
    while ($blogsrows = mysqli_fetch_array($bookings)) {?>
  <div class="wrapper">
  <div class="card">
    <h4 class="card-title">Delivered on : <span><?php echo $blogsrows['posted'];?></span></h4>
    <hr>
      <h4>Subject</h4>
      <p class="card-content"><?php echo $blogsrows['subject'];?></p>
      <h4>Message</h4>
      <p class="card-content"><?php echo $blogsrows['thoughts'];?></p>
      <br>
      <div class="about">
            <p>Email : <span><?php echo $blogsrows['email'];?></span></p>
            <p>Phone : <span><?php echo $blogsrows['phone'];?></span></p>
            <p>Status : <span><?php echo $blogsrows['status'];?></span></p>
        </div>
    <?php if($blogsrows['status'] == 'unread'){?>
      <form action="../forms/update.php" method="post">
      <input type="hidden" name="mid" value="<?php echo $blogsrows['id'];?>">
      <br>

      <b>Note:</b> <a href="mailto:<?php echo $blogsrows['email'];?>?subject=<?php echo $blogsrows['subject'];?>&body=Dear <?php echo $blogsrows['email'];?>, your message has been delivered succesfully. We appreciate you for taking your time to contact us. Thank you. Wakuu Safari.">Reply with Email</a> & mark respone.
      <button class="card-btn" type="submit" name="messagestatus">Mark Response</button>
      <a href=""></a>
    </form>
   <?php }else{?>

   <?php }?>
   <a href="../admin/index.php?p=messages" style="text-decoration:none;color:black;">Go back &raquo;</a>
    </div>
  </div>


  <style>
     @import url('https://fonts.googleapis.com/css?family=Roboto');
 body{
     font-family: 'Roboto', sans-serif;
}
 h1{
     text-align: center;
     color: #4181ee;
}
 .wrapper{
     display: flex;
     justify-content: center;
     flex-wrap: wrap;
}
 .card{
    max-width: 300px;
     min-height: 250px;
     background: #02b875;
     padding: 30px;
      border-radius: 3px;
     box-sizing: border-box;
     color: #FFF;
     margin:20px;
      box-shadow: rgb(50 50 93 / 25%) 0px 30px 60px -12px, rgb(0 0 0 / 30%) 0px 18px 36px -18px;
}
 .card:nth-child(2){
    background: #4181ee;
}
 .card:last-child{
    background: #673ab7;
}
 .card-title{
     margin-top: 0;
     font-size: 16px;
     font-weight: 600;
     letter-spacing: 1.2px;
}
 .card-content{
     font-size: 14px;
     letter-spacing: 0.5px;
     line-height: 1.5;
}
 .card-btn{
     all: unset;
     display: block;
     margin-left: auto;
     border: 2px solid #FFF;
     padding: 10px 15px;
     border-radius: 25px;
     font-size: 10px;
     font-weight: 600;
     transition: all 0.5s;
     cursor: pointer;
     letter-spacing: 1.2px;
}
 .card-btn:hover{
    color:#02b875;
    background: #FFF;
}
 .card:nth-child(2) .card-btn:hover{
    color:#4181ee;
    background: #FFF;
}
 .card:last-child .card-btn:hover{
    color:#673ab7;
     background: #FFF;
}

  </style>
    <?php }?>


    <?php  } elseif (isset($_GET['p']) and $_GET['p'] == 'gallery') { ?>


    <?php      
    include '../includes/dbconfiq.php';
    $bookings = mysqli_query($con, "SELECT * FROM tbl_gallery Where tbl_gallery.id = '" . $_GET['bid'] . "'");
    while ($blogsrows = mysqli_fetch_array($bookings)) {?>
        <div class="container">
          <div class="square">
            <img src="../forms/img/<?php echo $blogsrows['images']; ?>" class="mask">
            <div class="h1"><span><?php echo $blogsrows['title'];?></div>
            <div style="padding-left: 30px;">
              <br>
                <p>Update Image</p>
                <form action="../forms/update.php" method="post" enctype="multipart/form-data">
                  <label for="" class="">Add content</label>
                  <input type="text" name="title" class="form-control" style="width: 95%;"  maxlength="100"/> 
                  <input type="hidden" name="id" value="<?php echo $_GET['bid'] ?>">   
                  <label for="" class="">Upload photo</label>
                  <input type="file" name="images" class="form-control" style="width: 95%;"  required /> 
                  <button type="submit" name="image" class="btn btn-warning mt-2">Edit Image</button>
                </form>
                <br>
                <a href="../admin/index.php?p=gallery" style="text-decoration:none;color:black;">Go back &raquo;</a>
                <br><br>
            </div>
          </div>
        </div>


        <style>
          @import url('https://fonts.googleapis.com/css?family=Merriweather|Open+Sans');

.container{
  display: flex;
  justify-content: center;
  padding: 80px;
}

.square:hover {
    -webkit-transform: translate(20px, -10px);
    -ms-transform: translate(10px, -10px);
    transform: translate(10px, -10px);
    -webkit-box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
     }


.square{
  width: 460px;
	height: 100%;
	background: white;
  border-radius: 4px;
  box-shadow: 0px 20px 50px #D9DBDF;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease; 
}

.mask{
  clip: rect(0px, 460px, 220px, 0px);
  border-radius: 4px;
  position: absolute;
}

img{
  width: 460px;
  }

.h1{
  margin: auto;
  text-align: left;
  margin-top: 240px;
  padding-left: 30px;
  font-family: 'Merriweather', serif;
  font-size: 15px;
}
p{
 text-align: justify; 
 padding-right: 30px;
 font-family: 'Open Sans', sans-serif;
 font-size: 12px;
 color: #C8C8C8;
 line-height: 18px;
}

.button {
    background-color: yellow;
    color: white;
    width: 95px;
    padding: 10px 18px;
    border-radius: 3px;
    text-align: center;
    text-decoration: none;
    display: block;
    margin-top: 20px;
    margin-right: 70px;
    font-size: 12px;
    cursor: pointer;
    font-family: 'merriweather';
    border: none;
}
        </style>
    <?php }?>













    <?php } else { ?>
        <h3 style="color: red;">No Data Here!</h3>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
















