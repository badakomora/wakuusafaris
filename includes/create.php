<!-- Photo Modal -->
<div class="modal fade" id="photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="" class="">Content</label>
            <input type="text" name="title" class="form-control" maxlength="100" />
            <label for="" class="">Upload photo</label>
            <input type="file" name="images" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="postimage" class="btn btn-primary">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Article Modal -->
<div class="modal fade" id="article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post an article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../forms/add.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="" class="">Article Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" />
            <label for="" class="">Inspiration behind</label>
            <br>
            <textarea name="inspiration" cols="58" rows="3" maxlength="400" style="border: lavender 1px solid;"></textarea>
          </div>
          <div class="form-group">
            <label for="" class="">Article Content</label>
            <br>
            <textarea name="body" cols="58" rows="3" maxlength="800" style="border: lavender 1px solid;"></textarea>
          </div>
          <div class="form-group">
            <label for="" class="">Upload photo</label>
            <input type="file" name="images" class="form-control" />
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="postarticle" class="btn btn-primary">Post</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Safari Modal -->
<div class="modal fade" id="safari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Safari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">


          <div class="form-group p-2">

            <div class="form-group">
              <div class="col-sm-12">
                <label>Package</label>
                <select name="package_id" class="form-control" style="height:45px;">
                  <option value="#">Choose a package...</option>
                  <?php
                  include '../includes/dbconfiq.php';
                  $safari = mysqli_query($con, "SELECT * FROM tbl_packages");
                  while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                    <option value="<?php echo $safarisrows['id'] ?>"><?php echo $safarisrows['Package'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Name of Safari.</p>
                <input type="text" name="safariname" class="form-control border-bottom" placeholder="e.g 11Days 10Nights Unforgettable E.African Safari Mt.Kenya, Amboseli Masai Mara, Coast!" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Name of itinerary.</p>
                <input type="text" name="itineraryname" class="form-control border-bottom" placeholder="e.g Amboseli (group safari)" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Areas of visit(Locations).</p>
                <input type="text" name="location" class="form-control border-bottom" placeholder="e.g Aberdare and Diani beach." style="height:45px;">
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Few words about the areas of visit.</p>
                <input type="text" name="content" class="form-control border-bottom" placeholder="Do not quote or use brackets." style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Itinerary images(Three images only).</p>
                <input type="file" name="file[]" class="form-control" multiple>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Image 1 Caption.</p>
                <input type="text" name="caption1" placeholder="e.g Hakuna Matata!" class="form-control border-bottom" style="height:45px;">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Image 2 Caption.</p>
                <input type="text" name="caption2" placeholder="e.g  Game drives and impeccable tours" class="form-control border-bottom" style="height:45px;">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Image 3 Caption.</p>
                <input type="text" name="caption3" placeholder="e.g Embrace adventures, love nature." class="form-control border-bottom" style="height:45px;">
              </div>
            </div>
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addsafari">Create Safari</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- itinerary Modal -->
<div class="modal fade" id="itinerary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add itinerary to safari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="post">
        <div class="modal-body">


        <div class="form-group">
                        <div class="col-sm-12">
                        <label>Safari</label>
                        <select name="sid" class="form-control" style="height:45px;">
                        <option value="#">Choose a safari to add itinerary...</option>
                        <?php
                            include '../includes/dbconfiq.php';
                            $safari = mysqli_query($con, "SELECT * FROM tbl_safari ORDER BY id DESC");
                            while($safarisrows = mysqli_fetch_array($safari)) {?>
                            <option value="<?php echo $safarisrows['id']?>"><?php echo $safarisrows['safariname']?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <br>
                    <h4>Itinerary Content.</h4>
                    <div class="form-group p-2">
                        
                        <div class="form-group">
                        <div class="col-sm-12">
                        <label>Day.</label>
                        <select name="day" class="form-control" style="height:45px;">
                        <option value="#">Choose day to add itinerary...</option>
                        <option value="1">Day 1 of Safari</option>
                        <option value="2">Day 2 of Safari</option>
                        <option value="3">Day 3 of Safari</option>
                        <option value="4">Day 4 of Safari</option>
                        <option value="5">Day 5 of Safari</option>
                        <option value="6">Day 6 of Safari</option>
                        <option value="7">Day 7 of Safari</option>
                        <option value="8">Day 8 of Safari</option>
                        <option value="9">Day 9 of Safari</option>
                        <option value="10">Day 10 of Safari</option>
                        <option value="11">Day 11 of Safari</option>
                        </select>
                        </div>
                    </div>
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary title.</p>
                                <input type="text" name="title" class="form-control border-bottom" placeholder="e.g Game drive across the Mara." style="height:45px;">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Time for Description 1.</p>
                                <input type="text" name="time1" class="form-control border-bottom" placeholder="e.g 7:30 AM" style="height:45px;">
                            </div>
                        </div>
                
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary Description 1 (Upto 1000 characters)</p>
                                <textarea name="descr1" id="" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Time for Description 2.</p>
                                <input type="text" name="time2" class="form-control border-bottom" placeholder="e.g 10:00 AM" style="height:45px;">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary Description 2 (Upto 1000 characters)</p>
                                <textarea name="descr2" id="" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Time for Description 3.</p>
                                <input type="text" name="time3" class="form-control border-bottom" placeholder="e.g 12 Noon" style="height:45px;">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary Description 3 (Upto 1000 characters)</p>
                                <textarea name="descr3" id="" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Time for Description 4.</p>
                                <input type="text" name="time4" class="form-control border-bottom" placeholder="e.g 5:30 PM" style="height:45px;">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary Description 4 (Upto 1000 characters)</p>
                                <textarea name="descr4" id="" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Time for Description 5.</p>
                                <input type="text" name="time5" class="form-control border-bottom" placeholder="e.g 7:30 PM" style="height:45px;">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-sm-12">
                                <br>
                                <p class="ml-5">Itinerary Description 5 (Upto 1000 characters)</p>
                                <textarea name="descr5" id="" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="itinerarybtn">Create Itinerary</button>
        </div>
      </form>
    </div>
  </div>
</div>





<!-- Itinerary Table  Modal -->
<div class="modal fade" id="table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Safari Itinerary Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">


          <div class="form-group p-2">

            <div class="form-group">
              <div class="col-sm-12">
                <label>Safari</label>
                <select name="sid" class="form-control" style="height:45px;">
                  <option value="#">Choose the safari to add itinerary table...</option>
                  <?php
                  include '../includes/dbconfiq.php';
                  $safari = mysqli_query($con, "SELECT * FROM tbl_safari order by id desc");
                  while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                    <option value="<?php echo $safarisrows['id'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-12">
                <label>Accommodation</label>
                <select name="accom" class="form-control" style="height:45px;">
                  <option value="">Choose the accommodation...</option>
                    <option value="Standard">Standard</option>
                    <option value="Delux">Delux</option>
                    <option value="Exceptional">Exceptional</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <label>Meal Plan (Column 1).</label>
                <select name="mealplan1" class="form-control" style="height:45px;">
                  <option value="">Choose the meal plan for column 1...</option>
                    <option value="Half-board">Half-board</option>
                    <option value="Full-board">Full-board</option>
                    <option value="--"> -- </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <label>Meal Plan (Column 2).</label>
                <select name="mealplan2" class="form-control" style="height:45px;">
                  <option value="">Choose the meal plan for column 2...</option>
                    <option value="Half-board">Half-board</option>
                    <option value="Full-board">Full-board</option>
                    <option value="--"> -- </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Dec-Feb (column 1).</p>
                <input type="text" name="decfeb1" class="form-control border-bottom" placeholder="e.g Ksh54,542" style="height:45px;">
              </div>
              
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Dec-Feb (column 2).</p>
                <input type="text" name="decfeb2" class="form-control border-bottom" placeholder="e.g --" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Mar-May (column 1).</p>
                <input type="text" name="marmay1" class="form-control border-bottom" placeholder="e.g Ksh 67,772" style="height:45px;">
              </div>
              
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Mar-May (column 2).</p>
                <input type="text" name="marmay2" class="form-control border-bottom" placeholder="e.g Ksh 67,772" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Jun-Aug (column 1).</p>
                <input type="text" name="junaug1" class="form-control border-bottom" placeholder="e.g --" style="height:45px;">
              </div>
              
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Jun-Aug (column 2).</p>
                <input type="text" name="junaug2" class="form-control border-bottom" placeholder="e.g --" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Sep-Nov (column 1).</p>
                <input type="text" name="sepnov1" class="form-control border-bottom" placeholder="e.g Ksh 67,772" style="height:45px;">
              </div>
              
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Sep-Nov (column 2).</p>
                <input type="text" name="sepnov2" class="form-control border-bottom" placeholder="e.g Ksh 67,772" style="height:45px;">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Description (column 1).</p>
                <input type="text" name="descr1" class="form-control border-bottom" placeholder="e.g Safari lodge" style="height:45px;">
              </div>
              
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Description (column 2).</p>
                <input type="text" name="descr2" class="form-control border-bottom" placeholder="e.g Tented camp" style="height:45px;">
              </div>
            </div>

          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addtable">Add table</button>
        </div>
      </form>
    </div>
  </div>
</div>










<!-- Incluives Modal -->
<div class="modal fade" id="gateway" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Gateway</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
              <div class="col-sm-12">
                <label>Safari</label>
                <select name="sid" class="form-control" style="height:45px;">
                  <option value="#">Choose the safari to add inclusives or exclusives...</option>
                  <?php
                  include '../includes/dbconfiq.php';
                  $safari = mysqli_query($con, "SELECT * FROM tbl_safari order by id desc");
                  while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                    <option value="<?php echo $safarisrows['id'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-12">
                <label>Gateway</label>
                <select name="gateway" class="form-control" style="height:45px;">
                  <option value="">Choose the gateway...</option>
                    <option value="Incluive">Incluive</option>
                    <option value="Excluive">Excluive</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <br>
                <p class="ml-5">Add gateway content.</p>
                <input type="text" name="content" class="form-control border-bottom" placeholder="e.g Transport in a luxury 4X4" style="height:45px;">
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addgateway" class="btn btn-primary">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>



 <!-- Prices Modal -->
 <div class="modal fade" id="prices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Prices</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/add.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
                                                <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label>Safari</label>
                                                    <select name="sid" class="form-control" style="height:45px;">
                                                    <option value="#">Choose the safari to add price...</option>
                                                    <?php
                                                    include '../includes/dbconfiq.php';
                                                    $safari = mysqli_query($con, "SELECT * FROM tbl_safari order by id desc");
                                                    while ($safarisrows = mysqli_fetch_array($safari)) { ?>
                                                        <option value="<?php echo $safarisrows['id'] ?>"><?php echo $safarisrows['safariname'] ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="">Area of Viewing</label>
                                                    <input type="text" name="area" class="form-control" placeholder="e.g Diani" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="">Span Plan</label>
                                                    <input type="text" name="plan" class="form-control" placeholder="From 2(pax) 44,000sh" />
                                                </div>
                                              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addprice" class="btn btn-primary">Add Plan</button>
        </div>
      </form>
    </div>
  </div>
</div>



















 <!-- Account Modal -->
 <div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change my password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../forms/update.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="" class="">New Password</label>
                                                    <input type="text" name="password" class="form-control" placeholder="Enter new password" />
                                                </div>
                                              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="changepass" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>