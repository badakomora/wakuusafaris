        <!-- side fixed daytrips -->
        <div class="sidebar">
        <div class="social daytrip">
        <?php
            $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE safariname ='Day Trips'");
            while($row = mysqli_fetch_array($query)){?>
            <a class="daytriplink" href="safari.php?sid=<?php echo $row['id'];?>&safari=<?php echo $row['safariname']; ?>">
            <p class="daytripparagraph">Daytrips &raquo; <i class="fa fa-safari "></i> </p>
            </a>
            <?php }?>
        </div>
        </div>

        <!--whatsapp icon-->
        <a href="https://api.whatsapp.com/send?phone=254790005787" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
