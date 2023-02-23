<!-- HEADER -->
<?php require_once 'includes/header.php'; ?>


    

<!-- CAROUSELLS -->
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
        <li data-target="#bs-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1" style="background-image: url('https://aardwolfafricasafaris.com/blog/wp-content/uploads/2021/03/IMG_6378-1024x768.jpg');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">Imagination</span> at work!</h3>
                    <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
                </hgroup>
                <button class="btn btn-hero packages btn-lg" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2" style="background-image: url('https://www.smartertravel.com/wp-content/uploads/2020/03/AdobeStock_205899022-scaled.jpeg');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">Don't </span>  Wait for fun!</h3>
                    <!-- <h5>Set out and let the taste of coast set you free.</h5> -->
                </hgroup>
                <button class="btn btn-hero packages btn-lg" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3" style="background-image: url('https://www.dianamiaus.com/wp-content/uploads/2018/08/Africa-Sunset.jpg ');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">travel </span>and experience fun!</h3>
                    <!-- <h5>If you've ever seen magic, it has been in Africa.</h5> -->
                </hgroup>
                <button class="btn btn-hero packages btn-lg" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
    </div>
</div>






<!-- includes -->
<?php require_once 'includes/modals.php'; ?>
<?php require_once 'includes/additionals.php'; ?>






<div class="container-fluid" id="single">
        <h1 class="text-center" style="color:#800000 ;">
        <?php
        include 'includes/dbconfiq.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_packages WHERE id = '".$_GET['pid']."'");
        while($idrow =mysqli_fetch_array($query)){
        echo $idrow['Package'];
        }?>
        </h1>
        <center>
        <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br><br>
        <center>
            <i class="fa fa-arrow-down packages" style="color:#800000 ;"></i>
        </center>
        </br><br>

        <div class="row">
        <?php
        include 'includes/dbconfiq.php';
        $numOfCols = 3;
        $rowCount = 0;
        $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '".$_GET['pid']."'");
        while($row = mysqli_fetch_array($query)){
            $img = $row['carouselimages'];
            $images = explode(",", $img);
        ?>
           <div class="col-lg-4 mt-2">
                <div class="pricing-plan hero-bg rounded">
                    <div class="plan-name text-uppercase bg-maincolor">
                        <h6>
                            <?php echo $row['safariname'];?>
                        </h6>
                    </div>
                    <div class="plan-desc">
                        <div class="plan-content">
                            <img src="forms/<?php echo $images[0];?>" alt="">
                        </div>
                    </div>
                    <div class="plan-button">
                        <a href="safari.php?sid=<?php echo $row['id'];?>&safari=<?php echo $row['safariname']; ?>" class="btn btn-maincolor"><span>Inquire Itinerary &raquo;</span></a>
                    </div>
                    <br />
                </div>
            </div>  
        <?php
        $rowCount++;
        if($rowCount % $numOfCols == 0) echo '</div><div class="row">'; }?>

        </div>
        <br><br>
</div>








  <!-- includes -->
<?php require_once 'includes/footer.php'; ?>