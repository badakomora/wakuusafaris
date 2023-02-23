<!-- HEADER -->
<?php require_once 'includes/header.php'; ?>



<!-- includes -->
<?php require_once 'includes/modals.php'; ?>
<?php require_once 'includes/additionals.php'; ?>

















<?php if(isset($_GET['v']) AND $_GET['v'] == 'About'){?>
















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
    <div class="slide-1" style="background-image: url('https://www.jibha-africa-safaris.com/wp-content/uploads/2021/05/why-travel-with-us.jpg');"></div>
    <div class="hero">
        <hgroup>
            <h3 id="herotext"><span class="red">Exceptional</span> Services</h3>        
            <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="index.php#packages" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-2" style="background-image: url('https://blog.wego.com/wp-content/uploads/shutterstock_1182620896.jpg');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">Explore</span> our packages</h3>     
            <!-- <h5>Set out and let the taste of coast set you free.</h5> -->
        </hgroup>       
        <button class="btn btn-hero packages btn-lg" href="index.php#packages" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-3" style="background-image: url('https://www.sojournsafaris.co.ke/wp-content/uploads/2019/01/Kenya_MasaiMaraMaraNorth_ElewanaElephantPepperFamilyCultural-1024x631.jpg');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">Go, find</span> and explore!</h3>     
            <!-- <h5>If you've ever seen magic, it has been in Africa.</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="index.php#packages" role="button">View Packages <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
</div> 
</div>






    <main id="main">
       <section class="first-row">
          <div class="container">
             <div class="column-header">
                <h1 id="title" style=" font-weight: bold;color: #800000;"> About Us</h1>
                <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
                <br><br>
                <p id="subheader">Wakuu Safaris</p>
                <article>
                   <p>Our Signature excursions are curated unique, authentic, once in a lifetime travel experiences.</p>
                    <p>Based in the most revered of Africa’s safaris destinations, in Kenya, WAKUU SAFARIS boasts of providing an unrivalled full spectrum of leisure travel services, providing you with a complete end to end booking. </p>
                  </article><br>
                  <button class="btn btn-default" onclick="window.location.href='#services'" role="button" style="background-color: #800000; color: #fff;font-family: 'Aileron'; font-style: italic;font-weight:bold;">Inquire Services &raquo;</button>
             </div>
             <div class="column-image">
                <div id="image-div">
                   <img class="featurette-image img-responsive center-block" src="https://cloudfront.safaribookings.com/operators/photos/large/team3_1859_5fcf36f7c85f9.jpg" alt="Portrait of Van Gogh with Grey Felt Hat, Oil painting, Winter 1887/88" >
                </div>
             </div>
          </div>
       </section>
       

       <hr class="featurette-divider">
       <section class="second-row container-fluid" id="services">
          <article id="second-row-container">
          <div class="flx pa16 container-fluid">
            <div class="flx cmd6 cxs12 pa16">
                <div class="flxc bs5">
                <div class="pa32">
                <h2 class="mb32">Services</h2>
                <ul>
                    <li>&#8594; Budget to luxury holiday safaris.</li>
                    <li>&#8594; Ticketing guide and Visa applications guide.</li>
                    <li>&#8594; Round transfers between terminals & destinations</li>
                    <li>&#8594; Staff and cooperate team building.</li>
                    <li>&#8594; Beach and mountain excursions.</li>
                    <li>&#8594; Weekend getaways for friends and family.</li>
                    <li>&#8594; Hotel bookings.</li>
                </ul>
                </div>
                </div>
            </div>
            <div class="flx cmd6 cxs12 pa16">
                <div class="flxc bs5">
                <div class="pa32">
                <h2 class="mb32">Providing</h2>
                <ul>
                    <li>&#8594; Round transfers between terminals and destinations.</li>
                    <li>&#8594; Alternative ready home options for all destinations across Kenya and Tanzania.</li>
                    <li>&#8594; Budget luxury safaris and hotel bookings.</li>
                    <li>&#8594; Stuff and cooperate team building</li>
                    <li>&#8594; Beach and adventure excursions.</li>
                    <li>&#8594; Ticketing.</li>
                </ul>
                </div>
                </div>
            </div>
            </div>
            <section class="third-row">
                <blockquote cite="#">
                    <p id="quote"> “We pride ourselves for offering the most economical and convenient excursions ranging from luxury to budget safaris.” </p>
                </blockquote>
                <a href="#" target="_blank" id="tribute-link"><u id="tribute-link-dash"> GO, FIND AND EXPLORE.</u></a>
        
            </section>
            <br><br>
            <center>
            <h1 style=" font-weight: bold;color: #800000;">About our Team</h1>
             <div style="height:5px;width:20%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
            <br><br>
             <p>Wakuu safaris is a full destination management team providing complete end to end bookings, <br>exceptional offers to not-to-be missed tours and experiences.</p>
             <p>The region brims with romance, thrill and adventure immersing<br> travelers to un-ending spectacular siting’s as our guides bring you to an up-close <br>encounter with Africa’s most sought after wildlife.</p>
            
            </center>
            </article>
          </article>
       </section>
    </main>












<?php }else if(isset($_GET['v']) AND $_GET['v'] == 'Gallery'){?>










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
    <div class="slide-1" style="background-image: url('https://www.naturaltoursandsafaris.com/wp-content/webp-express/webp-images/uploads/2022/08/KEN_7854-1-scaled-e1660295254314.jpg.webp');"></div>
    <div class="hero">
        <hgroup>
            <h3 id="herotext"><span class="red">Wakuu</span> Safaris gallery</h3>        
            <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="#gallery" role="button">View Gallery <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-2" style="background-image: url('https://res.cloudinary.com/enchanting/f_auto,q_70/et-web/2022/03/beautiful-orange-sunset-in-the-African-savannah-in-the-Serengeti-National-Park-Tanzania-shutterstock_1545199031.png');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">Luxury</span> Holiday packages<!</h3>        
            <!-- <h5>Set out and let the taste of coast set you free.</h5> -->
        </hgroup>       
        <button class="btn btn-hero packages btn-lg" href="#gallery" role="button">View Gallery <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-3" style="background-image: url('https://cdn-images.go2africa.com/wp-content/uploads/2020/03/19075145/Mwiba.jpg');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">One more</span> for good measure</h3>        
            <!-- <h5>If you've ever seen magic, it has been in Africa.</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="#gallery" role="button">View Gallery <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
</div> 
</div>




<h1 class="text-center">Wakuu Safaris Gallery</h1><hr>
<div id="gallery" class="container-fluid">  
    <?php
    include './includes/dbconfiq.php';
    $photos = mysqli_query($con, "SELECT * FROM tbl_gallery ORDER BY id DESC");
    while($photosrows = mysqli_fetch_array($photos)){?>
    <div class="loading<?php echo $photosrows['id'] ?>">
        <a href="" type="button" data-toggle="modal" data-target="#<?php echo $photosrows['id'] ?>"><img src="forms/img/<?php echo $photosrows['images'] ?>" id="photo" class="img-responsive"></a>
    </div>
    <!-- image Modal -->
    <div class="modal fade" id="<?php echo $photosrows['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <img src="forms/img/<?php echo $photosrows['images'] ?>" id="photo" class="img-responsive" height="100%">
                </div>
            </div>
        </div>
    </div>
    <style>
    .loading<?php echo $photosrows['id']; ?>{
      background:transparent url("forms/img/loading.gif") center center no-repeat;
    }
    .loading<?php echo $photosrows['id'] ?> img:hover {
    transform: scale(1.1);
    }
    </style>
    <?php }?>
</div>











<?php }else if(isset($_GET['v']) AND $_GET['v'] == 'Blog'){?>











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
    <div class="slide-1" style="background-image: url('https://www.discoverafrica.com/wp-content/uploads/2021/11/stanley__livingstone_boutique_hotel_4_safari__activities-98_preview_maxwidth_2500_maxheight_2500_ppi_300_quality_100.jpg');"></div>
    <div class="hero">
        <hgroup>
            <h3 id="herotext"><span class="red">Wakuu</span> Safaris blogs</h3>        
            <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="#Blog" role="button">View Blogs <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-2" style="background-image: url('https://et-website.s3.amazonaws.com/uploads/2017/05/Enchanting-Travel-Zimbabwe-Tours-Hwange-Camp-Hwange-Game-drives.jpg');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">Game drives</span> & impeccable tours</h3>        
            <!-- <h5>Set out and let the taste of coast set you free.</h5> -->
        </hgroup>       
        <button class="btn btn-hero packages btn-lg" href="#Blog" role="button">View Blogs  <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
    <div class="item slides">
    <div class="slide-3" style="background-image: url('https://goshenisafaris.com/wp-content/uploads/2016/12/8-days-great-migration.jpg');"></div>
    <div class="hero">        
        <hgroup>
            <h3 id="herotext"><span class="red">Embrace </span>adventures, love nature</h3>        
            <!-- <h5>If you've ever seen magic, it has been in Africa.</h5> -->
        </hgroup>
        <button class="btn btn-hero packages btn-lg" href="#Blog" role="button">View Blogs  <i class="fa fa-arrow-down"></i></button>
    </div>
    </div>
</div> 
</div>
    




<div  id="Blog" class="container">
   <article>
   <?php
    include './includes/dbconfiq.php';
    $blogs = mysqli_query($con, "SELECT * FROM tbl_blogs ORDER BY id DESC");
    while($blogsrows = mysqli_fetch_array($blogs)){
    ?>
     <h1><?php echo $blogsrows['title'];?></h1>
     <div>
       <p class="last_update">posted <?php echo $blogsrows['posted'];?></p>
     </div>
    <p><em><?php echo $blogsrows['body'];?></em>.</p> 
    <div class="highlight">
        <h3>💡 Inspiration</h3>
        <p><?php echo $blogsrows['inspiration'];?></p>
    </div>
    <img src="forms/img/<?php echo $blogsrows['images'];?>" alt="Director Andrei Tarkovsky with a movie camera" class="img">
     <?php }?>
   </article>
</div>










<?php }else{}?>
<!-- FOOTER -->
<?php require_once 'includes/footer.php'; ?>
