<!-- HEADER -->
<?php require_once 'includes/header.php'; ?>


<style>
        
.itinerary ul {
    --col-gap: 2rem;
    --row-gap: 2rem;
    --line-w: 0.25rem;
    display: grid;
    grid-template-columns: var(--line-w) 1fr;
    grid-auto-columns: max-content;
    column-gap: var(--col-gap);
    list-style: none;
    width: 100%;
    margin-inline: auto;
  }
  
  
  @media only screen and (max-width: 600px) {
    .itinerary ul {
          display: flex;
          flex-direction: column;
      }
  }
  
  /* line */
  .itinerary ul::before {
    content: "";
    grid-column: 1;
    grid-row: 1 / span 20;
    background: rgb(225, 225, 225);
    border-radius: calc(var(--line-w) / 2);
  }
  
  /* columns*/
  
  /* row gaps */
  .itinerary ul li:not(:last-child) {
    margin-bottom: var(--row-gap);
  }
  
  /* card */
  .itinerary ul li {
    grid-column: 2;
    --inlineP: 1.5rem;
    margin-inline: var(--inlineP);
    grid-row: span 2;
    display: grid;
    grid-template-rows: min-content min-content min-content;
  }
  
  /* date */
  .itinerary ul li .date {
    --dateH: 3rem;
    height: var(--dateH);
    margin-inline: calc(var(--inlineP) * -1);
  
    text-align: center;
    background-color: var(--accent-color);
  
    color: white;
    font-size: 1.25rem;
    font-weight: 700;
  
    display: grid;
    place-content: center;
    position: relative;
  
    border-radius: calc(var(--dateH) / 2) 0 0 calc(var(--dateH) / 2);
  }
  
  /* date flap */
  .itinerary ul li .date::before {
    content: "";
    width: var(--inlineP);
    aspect-ratio: 1;
    background: var(--accent-color);
    background-image: linear-gradient(rgba(0, 0, 0, 0.2) 100%, transparent);
    position: absolute;
    top: 100%;
  
    clip-path: polygon(0 0, 100% 0, 0 100%);
    right: 0;
  }
  
  /* circle */
  .itinerary ul li .date::after {
    content: "";
    position: absolute;
    width: 2rem;
    aspect-ratio: 1;
    background: var(--bgColor);
    border: 0.3rem solid var(--accent-color);
    border-radius: 50%;
    top: 50%;
  
    transform: translate(50%, -50%);
    right: calc(100% + var(--col-gap) + var(--line-w) / 2);
  }
  
  /* title descr */
  .itinerary ul li .title,
  .itinerary ul li .descr {
    background: var(--bgColor);
    position: relative;
    padding-inline: 1.5rem;
  }
  .itinerary ul li .title {
    overflow: hidden;
    padding-block-start: 1rem;
    padding-block-end: 1rem;
    font-weight: 500;
  }
  .itinerary ul li .descr {
    padding-block-end: 1rem;
    font-weight: 300;
  }
  
  /* shadows */
  .itinerary ul li .title::before,
  .itinerary ul li .descr::before {
    content: "";
    position: absolute;
    width: 90%;
    height: 0.5rem;
    background: rgba(0, 0, 0, 0.5);
    left: 50%;
    border-radius: 50%;
    filter: blur(4px);
    transform: translate(-50%, 50%);
  }
  .itinerary ul li .title::before {
    bottom: calc(100% + 0.125rem);
  }
  
  .itinerary ul li .descr::before {
    z-index: -1;
    bottom: 0.25rem;
  }
  
  @media (min-width: 40rem) {
    .itinerary ul {
      grid-template-columns: 1fr var(--line-w) 1fr;
    }
    .itinerary ul::before {
      grid-column: 2;
    }
    .itinerary ul li:nth-child(odd) {
      grid-column: 1;
    }
    .itinerary ul li:nth-child(even) {
      grid-column: 3;
    }
  
    /* start second card */
    .itinerary ul li:nth-child(2) {
      grid-row: 2/4;
    }
  
    .itinerary ul li:nth-child(odd) .date::before {
      clip-path: polygon(0 0, 100% 0, 100% 100%);
      left: 0;
    }
  
    .itinerary ul li:nth-child(odd) .date::after {
      transform: translate(-50%, -50%);
      left: calc(100% + var(--col-gap) + var(--line-w) / 2);
    }
    .itinerary ul li:nth-child(odd) .date {
      border-radius: 0 calc(var(--dateH) / 2) calc(var(--dateH) / 2) 0;
    }
  }
  
  .credits {
    margin-top: 1rem;
    text-align: right;
  }
  .credits a {
    color: var(--color);
  }
    </style>

    
<!-- CAROUSELLS -->
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <!-- Overlay -->
    <div class="overlay"></div>
    
    

    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
      include 'includes/dbconfiq.php';
      $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE id ='".$_GET['sid']."'");
      while($row = mysqli_fetch_array($query)){
            $Indicators = 0; 
            $img = $row['carouselimages'];
            $images = explode(",", $img);
            foreach($images as $val){?>
        <li data-target="#bs-carousel" data-slide-to="<?php echo $Indicators; ?>" class="<?php if($Indicators == 0){echo 'active';}else{}?>"></li>
        <?php $Indicators++; } }?>
    </ol>

    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
      include 'includes/dbconfiq.php';
      $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE id ='".$_GET['sid']."'");
      while($row = mysqli_fetch_array($query)){
        $img = $row['carouselimages'];
        $cap = $row['carouselcaptions'];
        $images = explode(",", $img);
        $capts = explode(",", $cap);
        $slides = 1;
        foreach(array_combine($images, $capts) as  $val  =>  $capt){
        ?>
        <div class="item slides <?php if($slides == 1){echo 'active';}else{}?>">
            <div class="slide-<?php echo $slides; ?>" style="background-image: url('forms/<?php echo $val;?>');"></div>
            <div class="hero">
                <hgroup>
                <h3 id="herotext"><span class="red" id="red<?php echo $slides?>"></span> <span  id="white<?php echo $slides?>"></span></h3>
                <!-- <h5>Venture into a Safari expedition of a lifetime!</h5> -->
                <script>
                  // get first word
                  let myStr<?php echo $slides?> = "<?php echo $capt;?>";
                  let firstWord<?php echo $slides?> = myStr<?php echo $slides?>.split(" ")[0];
                 
                  // hide first word
                  var original<?php echo $slides?> = "<?php echo $capt;?>";
                  var result<?php echo $slides?> = original<?php echo $slides?>.substr(original<?php echo $slides?>.indexOf(" ") + 1);

                  // get innerhtml
                  document.getElementById("red<?php echo $slides?>").innerHTML = firstWord<?php echo $slides?>;
                  document.getElementById("white<?php echo $slides?>").innerHTML = result<?php echo $slides?>;
                </script>
                </hgroup>
                <button class="btn btn-hero packages btn-lg" href="#itinerary" role="button">View Itinerary <i class="fa fa-arrow-down"></i></button>
            </div>
        </div>
        <?php $slides++; } }?>
    </div>
</div>






<style>
.descr{
    font-weight:bold;
}
</style>



<div class="container-fluid" id="itinerary">
            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE id ='".$_GET['sid']."'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <center>
            <h1 style="color:#800000 ;" class="text-center"><?php echo $rows['itineraryname']?> Itinerary</h1>
            <center>
            <div style="height:5px;width:50%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
        </center>
        <br><br>
            <p class="text-center text-danger"><em> <i class="fa fa-map-marker"></i><?php echo $rows['location']?></em></p>
            <div style="width:90%;"><p class="text-center w-50" ><em><?php echo $rows['content']?></em></p> <br/></div>
            <?php
            include 'includes/dbconfiq.php';
            $query1 = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."'");
            if($rows = mysqli_num_rows($query1) >= 1){?>
             <i class="fa fa-arrow-down packages" style="color:#800000 ;"></i>
            <?php }else{}?>
            </center>
            <br><br>
            <?php }?>
            
        <div class="itinerary">
        <ul>
        <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '1'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
                <div class="date">DAY <?php echo $rows['day'];?></div>

                <h4><?php echo $rows['itinerarytitle'];?></h4>

                
                    <div class="title"><?php echo $rows['first_descr_time'];?></div>
                    <?php if($rows['first_descr'] == 'Null'){?>

                    <?php }else{?>
                        <div class="descr">
                            <?php echo $rows['first_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['second_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['second_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['second_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['third_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['third_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['third_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fourth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fourth_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fifth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fifth_descr'];?>
                        </div>
                    <?php }?>
            </li>
            <?php }?>


            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '2'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

                <h4><?php echo $rows['itinerarytitle'];?></h4>


                    <div class="title"><?php echo $rows['first_descr_time'];?></div>
                    <?php if($rows['first_descr'] == 'Null'){?>

                    <?php }else{?>
                        <div class="descr">
                            <?php echo $rows['first_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['second_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['second_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['second_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['third_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['third_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['third_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fourth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fourth_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fifth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fifth_descr'];?>
                        </div>
                    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '3'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

                <h4><?php echo $rows['itinerarytitle'];?></h4>

                
                    <div class="title"><?php echo $rows['first_descr_time'];?></div>
                    <?php if($rows['first_descr'] == 'Null'){?>

                    <?php }else{?>
                        <div class="descr">
                            <?php echo $rows['first_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['second_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['second_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['second_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['third_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['third_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['third_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fourth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fourth_descr'];?>
                        </div>
                    <?php }?>

                    <?php if($rows['fifth_descr'] == 'Null'){?>
                        
                    <?php }else{?>
                        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
                        <div class="descr">
                            <?php echo $rows['fifth_descr'];?>
                        </div>
                    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '4'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '5'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '6'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '7'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '8'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '9'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '10'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

<h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>

            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_itineraries WHERE safari_id ='".$_GET['sid']."' AND day = '11'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <li style="--accent-color:#800000">
            <div class="date">DAY <?php echo $rows['day'];?></div>

    <h4><?php echo $rows['itinerarytitle'];?></h4>


    <div class="title"><?php echo $rows['first_descr_time'];?></div>
    <?php if($rows['first_descr'] == 'Null'){?>

    <?php }else{?>
        <div class="descr">
            <?php echo $rows['first_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['second_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['second_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['second_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['third_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['third_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['third_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fourth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fourth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fourth_descr'];?>
        </div>
    <?php }?>

    <?php if($rows['fifth_descr'] == 'Null'){?>
        
    <?php }else{?>
        <div class="title"><?php echo $rows['fifth_descr_time'];?></div>
        <div class="descr">
            <?php echo $rows['fifth_descr'];?>
        </div>
    <?php }?>
            </li>
            <?php }?>
        </ul>
        </div>

    </div>




<br>
    <div class="container-fluid">

            <section style="padding: 20px;">
                <style>
                td,
                th {
                border: 2px solid black;
                padding: 10px;
                }

                table {
                display: block;
                max-width: -moz-fit-content;
                max-width: fit-content;
                margin: 0 auto;
                overflow-x: scroll;
                white-space: nowrap;
                }
            </style>
            
            <?php
                include 'includes/dbconfiq.php';
                $query = mysqli_query($con, "SELECT * FROM tbl_tables WHERE sid ='".$_GET['sid']."'");
                if(mysqli_num_rows($query) >= 1){?>

                <center>
                    <hr class="featurette-divider">
                    <h1 style="color:#800000 ;" class="text-center">Safari Budget</h1>
                    <div style="height:5px;width:20%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
                </center><br><br>
                
            <table>
                <thead>
                <tr style="background-color: #800000; color:white;">
                    <th>Accommodation</th>
                    <th>Meal Plan</th>
                    <th>Dec-Feb</th>
                    <th>Mar-May</th>
                    <th>Jun-Aug</th>
                    <th>Sep-Nov</th>
                    <th>Set-up and Location</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    include 'includes/dbconfiq.php';
                    $query = mysqli_query($con, "SELECT * FROM tbl_tables WHERE sid ='".$_GET['sid']."'");
                    while($rows = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <td><?php echo $rows['accom'];?></td>
                    <td><?php echo $rows['mealplan1'];?> <br> <?php echo $rows['mealplan2'];?> </td>
                    <td><?php echo $rows['DecFeb1'];?> <br> <?php echo $rows['DecFeb2'];?> </td>
                    <td><?php echo $rows['MarMay1'];?> <br> <?php echo $rows['MarMay2'];?> </td>
                    <td><?php echo $rows['JunAug1'];?> <br> <?php echo $rows['JunAug2'];?> </td>
                    <td><?php echo $rows['SepNov1'];?> <br> <?php echo $rows['SepNov2'];?> </td>
                    <td><?php echo $rows['descr1'];?> <br> <?php echo $rows['descr2'];?> </td>
                </tr>
                <?php }?>
                </tbody>
            </table>

                <?php }else{?>

                <?php }?>
                
            </section>
            <br>





            <?php
            include 'includes/dbconfiq.php';
            $query = mysqli_query($con, "SELECT * FROM tbl_gateway WHERE sid ='".$_GET['sid']."'");
            if(mysqli_num_rows($query) >= 1){?>

            <center>
                <hr class="featurette-divider">
                <h1 style="color:#800000 ;" class="text-center">Safari Gateways</h1>
                <div style="height:5px;width:20%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
            </center><br><br>

            <div class="flx pa16 container-fluid">
            <div class="flx cmd6 cxs12 pa16">
                <div class="flxc bs5">
                <div class="pa32">
                <h2 class="mb32">All Incluives</h2>
                <ul>
                <?php
                $query = mysqli_query($con, "SELECT * FROM tbl_gateway WHERE sid ='".$_GET['sid']."' AND gateway = 'Incluive' ");
                if(mysqli_num_rows($query) >= 1){
                while($row = mysqli_fetch_array($query)){?>
                    <li>&#8594; <?php echo $row['content']?>.</li>
                <?php }}else{echo '<p style="color:red;">There are no inclusive gateway added to this safari!</p>';}?>
                </ul>
                </div>
                </div>
            </div>
            <div class="flx cmd6 cxs12 pa16">
                <div class="flxc bs5">
                <div class="pa32">
                <h2 class="mb32">All Excluives</h2>
                <ul>
                <?php
                $query = mysqli_query($con, "SELECT * FROM tbl_gateway WHERE sid ='".$_GET['sid']."' AND gateway = 'Excluive' ");
                if(mysqli_num_rows($query) >= 1){
                while($row = mysqli_fetch_array($query)){?>
                    <li>&#8594; <?php echo $row['content']?>.</li>
                    <?php }}else{echo '<p style="color:red;">There are no enclusive gateway added to this safari!</p>';}?>
                </ul>
                </div>
                </div>
            </div>
            </div>
            <?php }else{}?>



         



                <div class="row">
                <section>
                <style>
                td,
                th {
                border: 2px solid black;
                padding:10px;
                }

                table{
                display: block;
                max-width: -moz-fit-content;
                max-width: fit-content;
                margin: 0 auto;
                overflow-x: scroll;
                white-space: nowrap;
                }
                </style>
                 <?php
                $query = mysqli_query($con, "SELECT * FROM tbl_prices WHERE sid ='".$_GET['sid']."'");
                if(mysqli_num_rows($query) >= 1){?>
                <center>
                    <hr class="featurette-divider">
                    <h1 style="color:#800000 ;" class="text-center">Safari Prices</h1>
                    <div style="height:5px;width:20%; box-shadow: 5px 5px 10px 0px rgba(0,0,0,.2);"></div>
                </center><br><br>
                <table>
                <thead>
                <tr style="background-color: #800000; color:white;">
                <th>Area of viewing</th>
                <th>Plan</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($query)){?>
                <tr>
                <td><?php echo $row['Area'];?></td>
                <td><?php echo $row['Plan'];?></td>
                </tr>
                <?php }?>
                </tbody>
                </table>
                <?php }else{}?>
                </section>
                </div>





                <center>
                <div class="container"><h1 style="text-decoration:underline;"><a href="#" class="text-danger" data-toggle="modal" data-target="#booktour">&raquo; Plan your safari now!</a></h1></div>
                </center>


  </div>




  <!-- includes -->
<?php require_once 'includes/footer.php'; ?>