</div>
<div class="container-fluid text-white"  style="background-color:#800000;margin-top:30px;width:100%;">
<footer class="footer d-flex row justify-content-center w-90">
        <address class="address col-lg-3">
            <p><b>Our address</b></p>
            <p>Wakuu Safaris</p>
            <p>P.O BOX 50483-00100.</p>
            <p>Nairobi, Kenya.</p>
        </address>
        <address class="address col-lg-3">
             <a href="#" class="social-link">
                    <span class="icon">
                    </span>
                    <span><b>Contact Links</b></span>
            </a>
            <a href="tel: +254 790 005787" class="social-link">
                    <span class="icon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <span>+254 790 005787</span>
                </a>
            <a href="mailto:wakuusafariskenyabeyond@gmail.com" class="social-link">
                    <span class="icon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <span>wakuusafariskenyabeyond@gmail.com</span>
                </a>
           <a href="#" class="social-link">
                    <span class="icon">
                        &copy; 
                    </span>
                    <span>Wakuu Safaris, Inc. Privacy</span> 
                </a>
        </address>
        <address class="address col-lg-3">
            <p><b>social links</b></p>
            <p><a href="" class="social-link">
                    <span class="icon">
                        <i class="fa fa-twitter"></i>
                    </span>
                <span>Twitter</span>
            </a></p>
            <p><a href="#!" class="social-link">
                    <span class="icon">
                        <i class="fa fa-facebook"></i>
                    </span>
                    <span>Facebook</span>
            </a></p>
            <p><a href="https://instagram.com/wakuu_safaris_africa?igshid=YmMyMTA2M2Y=" target="_blank" class="social-link">
                    <span class="icon">
                        <i class="fa fa-instagram"></i>
                    </span>
                <span>Instagram</span>
            </a></p>
        </address>
        <address class="address col-lg-3">
            <p>Quick Links</p>
           
            <?php
            $query = mysqli_query($con, "SELECT * FROM tbl_safari WHERE safariname ='Day Trips'");
            while($row = mysqli_fetch_array($query)){?>
             <a href="safari.php?sid=<?php echo $row['id'];?>&safari=<?php echo $row['safariname']; ?>" class="social-link">
                    <span class="icon">
                        <i class="fa fa-safari"></i>
                    </span>
                    <span>Daytrips</span>
            </a>
            </a>
            <?php }?>
            <a href="#" class="social-link" data-toggle="modal" data-target="#carhire">
                    <span class="icon">
                    <i class="fa fa-car"></i> 
                    </span>
                    <span>Car hire services</span> 
            </a>
            <a href="./admin/login.php" target="_blank" class="social-link">
                    <span class="icon">
                    <i class="fa fa-user"></i> 
                    </span>
                    <span>Admin Only</span> 
            </a>
        </address>
    </footer>
    <br>
</div>
<!-- /.footer container -->





<!-- loading gif before page -->
<script>
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('body').style.visibility="hidden";
       document.getElementById('herotext').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('preload').style.visibility="hidden";
         document.getElementById('body').style.visibility="visible";
         document.getElementById('herotext').style.visibility="visible";
      },1000);
  }
}


// change group and single safari
function groupSafari() {
  var s = document.getElementById("single");
  var g = document.getElementById("group");
  if (s.style.display === "none") {
    s.style.display = "block";
    g.style.display = "none";
  } else {
    s.style.display = "none";
    g.style.display = "block";
  }
}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>

