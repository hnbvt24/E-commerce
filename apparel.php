<?php include 'header.php';?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>
<!-- Main Content of the page -->
        <main>
            
                <? 
                    connectDB();

                    $sql = "SELECT DISTINCT category FROM items";
                    $sql2 = "SELECT * FROM items";
                    $sql3 = "SELECT * FROM items";
                    
                    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());
                    $result2 = mysqli_query($db, $sql2) or die("SQL error: " . mysqli_error());
                    $result3 = mysqli_query($db, $sql3) or die("SQL error: " . mysqli_error());

                    $row = mysqli_fetch_array($result);
                    $row2 = mysqli_fetch_array($result2);
                    $row3 = mysqli_fetch_array($result3);
                   
                ?>

                <figure class="pic">
                    <img src="images/cookies.jpg" alt="Store pastries">
                </figure>
                <div class="bWhite row">
                    <div class="store col-sm-offset-1 col-sm-11">
                        <div class="breadcrumbs col-sm-4">
                            <!-- Update this based on the selected box using the script at the bottom of the page-->
                            <!-- bread crumbs -->
                        </div>
                        <div class="col-sm-offset-3 col-sm-2">
                            <select id="productselect" class="form-control" name="category">
                                <option value="store.php">All Products</option> 
                                <!-- Populate the listbox with distinct category of items from the database -->

                                <? 
                                    do { ?>

                                    <option value="<?=$row[0]?>.php"><?= "$row[0]" ?></option>;

                                <? } while($row = mysqli_fetch_array($result)) ?>

                            </select>
                        </div>
                         <div class="col-sm-2">
                          <?
                             $sql4 = "SELECT * FROM items WHERE category='apparel'";
                             $result4 = mysqli_query($db, $sql4) or die("SQL error: " . mysqli_error());
                             $row4 = mysqli_fetch_array($result4);
                          ?>
                          <? $z = mysqli_num_rows($result4); ?>
                          <p>Items 1- <?= $z ?></p>
                        </div>

                        <!-- Store items -->

                        <div class="items col-sm-11">
                                <? 
                                    do { ?>

                                    <div class="col-xs-12 col-sm-6 col-md-4 itembox">
                                      <img src="<?= $row4[4] ?>" alt="<?= $row4[1] ?>">
                                      <p><?= $row4[1] ?></p>
                                      <p class="pull-left"><?= $row4[5] ?>/dozen</p>
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal<?= $x ?>">View</button>
                                   </div>

                                <? } while($row4 = mysqli_fetch_array($result4)) ?>
                            
                    </div>
                </div>
               
                <!-- Modal -->
                <div id="myModal<?= $x ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?= $row3[1] ?></h4>
                      </div>
                      <div class="modal-body text-right">
                            <img src="<?= $row3[4] ?>" alt="<?= $row3[1] ?>">
                            <p>Some description if necessary.</p>
                            <h3><?= $row3[5] ?></h3>
                            <input class="quantity" type="text" value="1" name="quantity">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="addtocart" class="btn btn-default" data-dismiss="modal">Add to Cart</button>
                      </div>
                    </div>

                  </div>
                </div>
                    
        </main>
        <?
          mysqli_free_result($result);
          mysqli_free_result($result2);
          mysqli_close($db);
        ?>
        <?php include 'footer.php';?>
        <script>
          window.onload = (function(){
          var categorylist = document.getElementById('productselect');
          categorylist.options[2].selected = true;

          var val = "";
          var str1 = "Home";
          var str2 = "Store";

          $( "select option:selected" ).each(function() {
            val = $( this ).text();
          });

          var str3 = str1.link("home.php") + " / " + str2.link("store.php") + " / " + val;

          $( ".breadcrumbs" ).html( str3 );

          });

          $(document).ready(function() {
        $("#productselect").change(function() {
            location = $("#productselect option:selected").val();
        });
      });
        </script>
    
