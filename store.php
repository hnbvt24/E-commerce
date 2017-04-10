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
        <? 
            if (isset($_POST['returntostore'])){
            session_unset(); 
            session_destroy(); // Destroying All Session

            $bresult = mysqli_query($db, 'TRUNCATE TABLE billing_customer');
            $sresult = mysqli_query($db, 'TRUNCATE TABLE shipping_customer');
            $cartresult = mysqli_query($db, 'TRUNCATE TABLE shopping_cart');
        }
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
                <div class="col-xs-8 col-sm-offset-3 col-sm-3 col-md-offset-3 col-md-2">
                    <select id="productselect" class="form-control" name="category">
                        <option value="store.php">All Products</option> 
                        <!-- Populate the listbox with distinct category of items from the database -->

                        <? 
                            do { ?>

                            <option value="<?=$row[0]?>.php"><?= $row[0] ?></option>;

                        <? } while($row = mysqli_fetch_array($result)) ?>

                    </select>
                </div>
                <div class="col-sm-2">
                  <? $z = mysqli_num_rows($result2); ?>
                  <p>Items 1- <?= $z ?></p>
                    <!-- page items, number shown
                         i.e. Items 1-12 -->
                </div>

                <!-- Store items -->

                <div class="items col-sm-11">
                        <? 
                            do { ?>

                            <div class="col-xs-12 col-sm-6 col-md-4 ">
                              <img src="<?= $row2[4] ?>" alt="<?= $row2[1] ?>">
                              <p><?= $row2[1] ?></p>
                              <p class="pull-left"><?= $row2[5] ?></p>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info btn-lg pull-right" id="view" data-toggle="modal" data-target="#myModal" data-id="<?= $row2[0] ?>" data-item="<?= $row2[1] ?>" data-desc="<?= $row2[3] ?>" data-img="<?= $row2[4] ?>" data-price="<?= $row2[5] ?>">View</button>
                           </div>

                        <? } while($row2 = mysqli_fetch_array($result2)) ?>
                </div>
            </div>
       
            <!-- Modal -->
            
            <!--Iterate this set of code for however many number of items there are. 
            This is to populate the modal boxes with the correct item associated with that button.-->
            <form method="post" action="store.php">                
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?= $row3[1] ?></h4>
                    <input type="hidden" id="hiddenName" name="hiddenName" value=""/>
                  </div>
                  <div class="modal-body text-right">
                        <img id="image" src="<?= $row3[4] ?>" alt="<?= $row3[1] ?>" type="image" width: "200px;">
                        <input type="hidden" id="hiddenImage" name="hiddenImage" value=""/>
                        <p id="id"><?= $row3[0] ?></p>
                        <input type="hidden" id="hiddenID" name="hiddenID" value=""/>
                        <p id="description"><?= $row3[2] ?></p>
                        <input type="hidden" id="hiddenDesc" name="hiddenDesc" value=""/>
                        <h3 id="price"><?= $row3[5] ?></h3>
                        <input type="hidden" id="hiddenPrice" name="hiddenPrice" value=""/>
                        <input id="quantity" name="quantity" class="quantity" type="text" value="1" name="quantity">
                  </div>
                  <div class="modal-footer">
                    <input type="submit" id="addtocart" name="addtocart" class="btn btn-default"  value="Add to Cart"/>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!--Shopping Cart Functionality

            i.e. Add an item to the cart -->

          <? 

            if(isset($_POST['addtocart'])) {
            $mysql = "INSERT INTO shopping_cart (item_ID, item_Name, item_Desc, item_Quan, item_Price, item_Image) VALUES (" . $_POST['hiddenID']. ", '" . $_POST['hiddenName']. "', '" . $_POST['hiddenDesc'] . "', " . $_POST['quantity']. ", '" . $_POST['hiddenPrice']. "', '" . $_POST['hiddenImage']. "')";
            $myresult = mysqli_query($db, $mysql);
            }

          ?>
        </main>
        
<?php include 'footer.php';?>
<script>
    //onload event ...
        $( "select" )
          .change(function () {
            var val = "";
            var str1 = "Home";
            var str2 = "Store";

            $( "select option:selected" ).each(function() {
              val = $( this ).text();
            });

            var str3 = str1.link("home.php") + " / " + str2.link("store.php") + " / " + val;

            $( ".breadcrumbs" ).html( str3 );
          })
          .change();
</script>
<script>
      window.onload = (function(){
      var categorylist = document.getElementById('productselect');
      categorylist.options[0].selected = true;

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
<script>
   $('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var name = button.data('item'); // Extract info from data-* attributes
  var id = button.data('id');
  var description = button.data('desc');
  var price = button.data('price');
  var image = button.data('img');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  document.getElementById('id').innerHTML = id;
  var title = modal.find('.modal-title').text(name);
  document.getElementById('image').src= image;
  document.getElementById('description').innerHTML = description;
  document.getElementById('price').innerHTML = price;
  
  document.getElementById('hiddenID').value = id;
  document.getElementById('hiddenName').value = name;
  document.getElementById('hiddenPrice').value = price;
  document.getElementById('hiddenDesc').value = description;
  document.getElementById('hiddenImage').value = image;
})
</script>
<?
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    mysqli_close($db);
?>
