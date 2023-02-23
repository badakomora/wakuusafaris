   <!-- modals -->
   
    <!-- safari booking Modal -->
    <div class="modal fade" id="booktour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" style="margin-left:40px;color:#800000;font-family: 'Aileron';font-style: italic;font-weight:bold;">Plan your Safari with Wakuu Safaris</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <div style="background-color:#800000;padding:20px;color:white;border-radius:5px;font-family: 'Aileron';font-style: italic;font-weight:bold;">
                                            Fill in the form to book your Safari
                                        </div>
                                        <div class="panel-body">
                                            <form action="./forms/add.php" method="post">
                                                <div class="form-group">
                                                    <label for="" class="">First Name</label>
                                                    <input type="text" name="fname" class="form-control" placeholder="Enter Your firstname" />
                                                    <br>
                                                    <label for="" class="">Last Name</label>
                                                    <input type="text" name="lname" class="form-control" placeholder="Enter Your lastname" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="">Phone N0.</label>
                                                    <input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone No." />
                                                    <br>
                                                    <label for="" class="">Email Address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" />
                                                </div>


                                                <div class="form-group">
                                                    <label>Package</label>
                                                    <select name="package" onchange="showPackage(this)" class="form-control">
                                                        <option value="#">Select a package(you can only select a package at a time)</option>
                                                        <?php
                                                        include './includes/dbconfiq.php';
                                                        $safari = mysqli_query($con, "SELECT * FROM tbl_packages");
                                                        while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                            <option value="<?php echo $safarisrows['Package'] ?>"><?php echo $safarisrows['Package'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="form-group" id="Resident_groupdiv" style="display:none;">
                                                    <label>Resident (Group Safari)</label>
                                                    <select name="safari" id="groupresident" class="form-control">
                                                        <option value="#">Select category Resident Safari</option>
                                                        <?php
                                                        $safari = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '1'");
                                                        while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                            <option value="<?php echo $safarisrows['safariname'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="form-group" id="Resident_singlediv" style="display:none;">
                                                    <label>Resident (Single Safari)</label>
                                                    <select name="safari" id="singleresident" class="form-control">
                                                        <option value="#">Select category Resident Safari</option>
                                                        <?php
                                                        $safari = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '2'");
                                                        while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                            <option value="<?php echo $safarisrows['safariname'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="form-group" id="Non-Resident_div" style="display:none;">
                                                    <label>Non-Resident Safari</label>
                                                    <select name="safari" id="non-resident" class="form-control">
                                                        <option value="#">Select category Non-resident Safari</option>
                                                        <?php
                                                        $safari = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '3'");
                                                        while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                            <option value="<?php echo $safarisrows['safariname'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="form-group" id="other_div" style="display:none;">
                                                    <label>Other Safari</label>
                                                    <select name="safari" id="other" class="form-control">
                                                        <option value="#">Select category Other Safari</option>
                                                        <?php
                                                        $safari = mysqli_query($con, "SELECT * FROM tbl_safari WHERE pid = '4'");
                                                        while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                            <option value="<?php echo $safarisrows['safariname'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <script type="text/javascript">
                                                    function showPackage(select) {
                                                        if (select.value == 'Resident(Group safari)') {
                                                            document.getElementById('Resident_groupdiv').style.display = "block";
                                                            document.getElementById("groupresident").disabled = false;

                                                            document.getElementById('Resident_singlediv').style.display = "none";
                                                            document.getElementById("singleresident").disabled = true;

                                                            document.getElementById('Non-Resident_div').style.display = "none";
                                                            document.getElementById("non-resident").disabled = true;

                                                            document.getElementById('other_div').style.display = "none";
                                                            document.getElementById("other").disabled = true;
                                                        } else if (select.value == 'Resident(Single safari)') {
                                                            document.getElementById('Resident_singlediv').style.display = "block";
                                                            document.getElementById("singleresident").disabled = false;

                                                            document.getElementById('Resident_groupdiv').style.display = "none";
                                                            document.getElementById("groupresident").disabled = true;

                                                            document.getElementById('Non-Resident_div').style.display = "none";
                                                            document.getElementById("non-resident").disabled = true;

                                                            document.getElementById('other_div').style.display = "none";
                                                            document.getElementById("other").disabled = true;
                                                        } else if (select.value == 'Non-resident') {
                                                            document.getElementById('Non-Resident_div').style.display = "block";
                                                            document.getElementById("non-resident").disabled = false;

                                                            document.getElementById('Resident_singlediv').style.display = "none";
                                                            document.getElementById("singleresident").disabled = true;

                                                            document.getElementById('Resident_groupdiv').style.display = "none";
                                                            document.getElementById("groupresident").disabled = true;

                                                            document.getElementById('other_div').style.display = "none";
                                                            document.getElementById("other").disabled = true;
                                                        } else if (select.value == 'other') {
                                                            document.getElementById('other_div').style.display = "block";
                                                            document.getElementById("other").disabled = false;

                                                            document.getElementById('Resident_groupdiv').style.display = "none";
                                                            document.getElementById("groupresident").disabled = true;

                                                            document.getElementById('Resident_singlediv').style.display = "none";
                                                            document.getElementById("singleresident").disabled = true;

                                                            document.getElementById('Non-Resident_div').style.display = "none";
                                                            document.getElementById("non-resident").disabled = true;
                                                        } else {
                                                            document.getElementById('Resident_groupdiv').style.display = "none";
                                                            document.getElementById("groupresident").disabled = true;

                                                            document.getElementById('Resident_singlediv').style.display = "none";
                                                            document.getElementById("singleresident").disabled = true;

                                                            document.getElementById('Non-Resident_div').style.display = "none";
                                                            document.getElementById("non-resident").disabled = true;

                                                            document.getElementById('other_div').style.display = "none";
                                                            document.getElementById("other").disabled = true;
                                                        }
                                                    }
                                                </script>
                                                <div class="form-group">
                                                    <label for="">Date of Booking</label>
                                                    <input type="date" name="dob" class="form-control" />
                                                    <br>
                                                    <label for="">Date of Safari</label>
                                                    <input type="date" name="dos" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Photo Session</label>
                                                    <select name="ps" class="form-control">
                                                        <option value="inclusive">Inclusive</option>
                                                        <option value="exclusive">Exclusive</option>
                                                    </select>
                                                </div>
                                                <label>Special Request</label>
                                                <textarea name="smthelse" class="form-control">Provide additional information about your tour</textarea>
                                                <br />
                                                <button type="submit" name="booksafari" style="background-color:#800000;width:150px;height:40px;border-radius:8px;border:none;color:white; font-family: 'Aileron';  font-style: italic;">Book &raquo;</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- contact us Modal -->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <div style="background-color:#800000;padding:20px;color:white;border-radius:5px;">
                                            Contact Us
                                        </div>
                                        <div class="panel-body">
                                            <form action="./forms/add.php" method="post">
                                                <div class="form-group">
                                                    <label for="" class="">Email Address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" />
                                                    <label for="" class="">Phone N0.</label>
                                                    <input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone No." />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="">Subject</label>
                                                    <input type="tel" name="subject" class="form-control" placeholder="Enter Your Phone No." />
                                                </div>
                                                <label for="" class="">Your Thoughts</label>
                                                <textarea name="thoughts" class="form-control">Share with us your thoughts...</textarea>
                                                <br />
                                                <button class="btn" type="submit" name="contact" style="background-color:#800000;width:200px;color:white; font-family: 'Aileron';  font-style: italic;">Send &raquo;</button>
                                            </form>
                                            <br />
                                            <a style="color:black;" href="https://api.whatsapp.com/send?phone=254790005787"> <span><i class="fa fa-whatsapp"></i> +254 790 005787</span></a>
                                            <br />
                                            <a style="color:black;" href="tel:+254 790 005787"> <span><i class="fa fa-phone"></i> +254 790 005787</span></a>
                                            <br />
                                            <a style="color:black;" href="mailto:wakuusafariskenyabeyond@gmail.com"> <span><i class="fa fa-envelope"></i> wakuusafariskenyabeyond@gmail.com</span></a>
                                            <br />
                                            <a style="color:black;" href="#"> <span><i class="fa fa-clock"></i> Working Hours 7:30 AM - 5PM(Mon - Mon). </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    



   