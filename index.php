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
            <div class="slide-1" style="background-image: url('https://quiltripping.com/wp-content/uploads/2018/08/DSC0484-3-1200x800.jpg');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">Tembea</span> na wakuu safaris</h3>
                    <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
                </hgroup>
                <button class="btn btn-hero packages btn-lg" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2" style="background-image: url('https://pelorusx.com/wp-content/uploads/2021/01/hero-maldives-ye.jpg');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">Hakuna</span> Matata!</h3>
                    <!-- <h5>Set out and let the taste of coast set you free.</h5> -->
                </hgroup>
                <button class="btn btn-hero packages btn-lg" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-3" style="background-image: url('https://media.cntraveler.com/photos/5ea883674e5fff00083ccef1/master/pass/Safari-GettyImages-143917249.jpg');"></div>
            <div class="hero">
                <hgroup>
                    <h3 id="herotext"><span class="red">Safari</span> of a lifetime!</h3>
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




<!-- content -->

<!-- PACKAGES -->
<div class="container">
    <div id="packages">
        <h1 class="text-center" style="color:#800000 ;">Packages</h1>
        <center>
            <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br>
        <p class="text-center">Distinguishing time from labor needs, nothing escapes us. Roadtrips, camping packages, Honeymoon, vaccations, hikes, staycations, safari experiences and many more other fun stuffs on top of that. Get ready for more potential, more opportunity and more of everything you expect from Wakuu Safaris. Below are our packages categorized for you.</p>
    </div>
</div>

<br><br><br><br>
<div class="flx pa16 container-fluid">
    <div class="flx cmd6 cxs12 pa16">
        <div class="flxc bs5">
            <div class="pa32">
                <h2 class="mb32">Resident Packages(single or group safari)</h2>
                <p>Top resident deals. Upto 3day and 2nights single or group safari of a lifetime, experience great deals for that weekend getaway, beach holiday and a leading adventure.</p>
            </div>
            <a class="ma ml32 mb32 pa16 ph64 br33 bg-333333 fw7 c-ffffff tdn btn" href="#Resident">Learn more</a>
        </div>
    </div>
    <div class="flx cmd6 cxs12 pa16">
        <div class="flxc bs5">
            <div class="pa32">
                <h2 class="mb32">Non-Resident Packages</h2>
                <p>Our Non-Residents Packages are customized to suit the needs of non-resident clients who wish to make way for a 4days & 3nights, 5days & 4nights, 7days & 6nights and 11days & 10nights Private holiday.</p>
            </div>
            <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="#Non-Resident">Learn more</a>
        </div>
    </div>
    <div class="flx cmd6 cxs12 pa16">
        <div class="flxc bs5">
            <div class="pa32">
                <h2 class="mb32">Other Packages</h2>
                <p>From beach excursions honeymoons, group/friends/Clique sessions, day trips, bush safari moons and mountain moons. You get to traverse, connect and grasp the major wildlife viewing areas across the country. </p>
            </div>
            <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="#Other">View more</a>
        </div>
    </div>
</div>
</br>
<!-- /PACKAGES -->






















<!-- package details
================= -->
<!-- START THE FEATURETTES -->
<!-- resident -->

<hr class="featurette-divider" id="Resident">
<h1 class="text-center lap" style="color:#800000 ;">Our Resident Packages(single or group safari)</h1>
<h1 class="text-center phon" style="color:#800000 ;">Our Resident Packages<br>(single or group safari)</h1>
<style>
.phon{
    display:none;
}
@media screen and (max-width: 768px){
    .phon{
        display:block;
    }
    .lap{
        display:none;
    }
}
</style>
        <center>
            <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br>
<p class="text-center">3days & 2nights safari of a lifetime</p>
<br><br>
<center>
    <i class="fa fa-arrow-down packages" style="color:#800000 ;"></i>
</center>
</br><br>
<div class="container-fluid">

    <div class="container-fluid" id="single">
        <div style="display: flex;">
            <h2>Resident(Group safari).</h2>
            <a class="c-333333 btn" style="margin-top: 12px;color:black;text-decoration: underline #800000;" onclick="groupSafari()">View Single Safari &raquo;</a>
        </div>

        <div class="row c-gutter-60 p-2">

        <?php
        include 'includes/dbconfiq.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '1' order by id asc limit 3 ");
        while($row = mysqli_fetch_array($query)){
            $img = $row['carouselimages'];
            $images = explode(",", $img);
        ?>
          <div class="col-lg-4 mt-2">
                <div class="pricing-plan hero-bg rounded">
                    <div class="plan-name text-uppercase bg-maincolor">
                        <h6>
                            <?php echo $row['itineraryname'];?>
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
        <?php }?>
        </div>



        <br><br><br><br>
        <center>
            <div class="row c-gutter-60 p-2 ">
                <?php
                include 'includes/dbconfiq.php';
                $query = mysqli_query($con, "SELECT * FROM tbl_packages WHERE id = '1'");
                while($idrow =mysqli_fetch_array($query)){
                ?>
                <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="packages.php?pid=<?php echo $idrow['id'];?>">View more</a>
            <?php }?>
            </div>
        </center>
    </div>



    <div class="container-fluid" id="group" style="display: none;">
        <div style="display: flex;">
            <h2>Resident(Single safari).</h2>
            <a class="c-333333 btn"  style="margin-top: 12px;color:black;text-decoration: underline #800000;"  onclick="groupSafari()">View Group Safari &raquo;</a>
        </div>
        <div class="row c-gutter-60 p-2">
        <?php
        include 'includes/dbconfiq.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '2' order by id asc  limit 3");
        while($row = mysqli_fetch_array($query)){
            $img = $row['carouselimages'];
            $images = explode(",", $img);
        ?>
          <div class="col-lg-4 mt-2">
                <div class="pricing-plan hero-bg rounded">
                    <div class="plan-name text-uppercase bg-maincolor">
                        <h6>
                            <?php echo $row['itineraryname'];?>
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
        <?php }?>
        </div>



        <br><br><br><br>
        <center>
        <div class="row c-gutter-60 p-2 ">
                <?php
                include 'includes/dbconfiq.php';
                $query = mysqli_query($con, "SELECT * FROM tbl_packages WHERE id = '2'");
                while($idrow =mysqli_fetch_array($query)){
                ?>
                <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="packages.php?pid=<?php echo $idrow['id'];?>">View more</a>
            <?php }?>
            </div>
        </center>
    </div>
</div>










<!-- non-resident -->
<br><br>
<hr class="featurette-divider" id="Non-Resident">
<br>
<h1 class="text-center" style="color:#800000 ;">Our Non-Resident Packages</h1>
        <center>
            <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br>
<p class="text-center">4days & 3days, 5days & 4nights, 7days & 6nights, 11days & 10nights safari of a lifetime</p>
<br>
<center><i class="fa fa-arrow-down packages" style="color:#800000 ;"></i></center>
</br>
<div class="container-fluid">
    <div class="container-fluid">
        <h2>Non-Resident.</h2>
        <div class="row c-gutter-60 p-2">
        <div class="row c-gutter-60 p-2">
        <?php
        include 'includes/dbconfiq.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '3' order by id asc  limit 3");
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
        <?php }?>
        </div>



        <br><br><br><br>
        <center>
            <div class="row c-gutter-60 p-2 ">
                <?php
                include 'includes/dbconfiq.php';
                $query = mysqli_query($con, "SELECT * FROM tbl_packages WHERE id = '3'");
                while($idrow =mysqli_fetch_array($query)){
                ?>
                <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="packages.php?pid=<?php echo $idrow['id'];?>">view more</a>
            <?php }?>
            </div>
        </center>
    </div>
</div>














<!-- others -->
<br><br>
<hr class="featurette-divider" id="Other">
<br>
<h1 class="text-center" style="color:#800000 ;">Other Packages</h1>
        <center>
            <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br>
<p class="text-center">Beach excursions honeymoons, day trips, bush safari moons and mountain moons</p>
<br>
<center><i class="fa fa-arrow-down packages" style="color:#800000 ;"></i></center>
</br>
<div class="container-fluid">
    <div class="container-fluid">
    <h2>Other.</h2>
    <div class="row c-gutter-60 p-2">
        <?php
        include 'includes/dbconfiq.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '4' order by id asc  limit 3");
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
        <?php }?>
        </div>



        <br><br><br><br>
        <center>
        <div class="row c-gutter-60 p-2 ">
                <?php
                include 'includes/dbconfiq.php';
                $query = mysqli_query($con, "SELECT * FROM tbl_packages WHERE id = '4'");
                while($idrow =mysqli_fetch_array($query)){
                ?>
                <a class="ma mr32 mb32 pa16 ph64 bss bw3 br33 fw7 c-333333 tdn btno" href="packages.php?pid=<?php echo $idrow['id'];?>">View more</a>
            <?php }?>
            </div>
        </center>
    </div>
</div>






<br>
<hr class="featurette-divider">
<div class="container-fluid">
    <div class="col-md-5">
        <h1 class="featurette-heading" style="color: #800000;"><b>Lets talk about our beautiful country, Kenya.<span class="text-muted">She'll blow your mind.</span></b></h1>
        <p class="lead"><b>The Geography of Kenya is diverse, varying amongst its 47 counties. Kenya has a coastline on the Indian Ocean, which contains swamps of East African mangroves. Inland are broad plains and numerous hills. You'll find vast plains, towering mountains, dense forests and boggy swamps. Mount Kenya is the tallest mountain in Kenya, and the second-highest mountain in Africa, after Mount Kilimanjaro. Kenya is also home to Lake Turkana, which is the world's largest desert lake. There more to grasp, learn more.</b></p>
        <button class="btn btn-default" onclick="window.location.href='view.php?v=Blog'" role="button" style="background-color: #800000; color: #fff;font-family: 'Aileron'; font-style: italic;font-weight:bold;">Learn More &raquo;</button>
    </div>
    <div class="col-md-7">
        <img class="featurette-image img-responsive center-block" src="https://mediaim.expedia.com/destination/1/98f1301e7b7099dff19b9a060d822e67.jpg" alt="Generic placeholder image">
    </div>
</div>
<br />



<!-- FOOTER -->
<?php require_once 'includes/footer.php'; ?>