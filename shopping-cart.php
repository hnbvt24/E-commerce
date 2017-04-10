<?php include 'header.php'; ?>
<? require_once("connect_to_DB.php"); //inserts contents of this file here ?>

<!-- Main page info -->
    <main>
        <div class="bWhite row">
            <div class="shoppingcart col-sm-offset-1 col-sm-9">
              <div class="title row">
                <div class="col-sm-10">
                  <h2>Shopping Cart</h2>
                </div>
                
                <? 
                    connectDB();

                    $sql = "SELECT item_ID, item_Name, item_Desc, item_Image, item_Quan, item_Price
                            FROM shopping_cart";
                    
                    $result = mysqli_query($db, $sql) or die("SQL error: " . mysqli_error());
                    
                    $row = mysqli_fetch_array($result);
                  
////////////////////////////////////////////////////////////////////////////////////
                    if ($row) { ?>
                     <div class="accountLink col-sm-2 pull-right">
                        <a href="sign-in.php">

                            <? 
                            if(isset($_SESSION['user'])){
                                
                                $username = $_SESSION['user'];

                                print $username;

                            } elseif(isset($_SESSION['login_member'])) {

                                $username = $_SESSION['login_member'];

                                print $username;

                            } else {

                                print "Login";

                            }
                            ?>

                        </a>
                      </div>
                      <form method="post" action="shopping-cart.php">
                        <? $i = 1; ?>
                        <? do { ?>
                          <div id="myItem<?= $i ?>" class="box col-sm-10">
                             <div class="shopping cartImage col-sm-offset-1 col-sm-3">
                                  <img src="<?= $row[3] ?>" alt="<?= $row[1] ?>" type="image">
                             </div>
                             <div class="description col-sm-5">
                                  <h4><?= $row[1] ?></h4>
                                  <p><?= $row[0] ?></p>
                                  <input type="hidden" name="cartid<?= $i ?>" value="<?= $row[0] ?>" />
                                  <p><?= $row[2] ?></p>
                                  <p><?= $row[5] ?></p>
                             </div>
                             <div class="cartInfo col-sm-2">
                                  <p>Quantity: <?= $row[4] ?></p>
                                  <input id="removebtn<?= $i ?>" type="submit" name="removeItem<?= $i ?>" class="btn btn-info btn-md pull-right" value="Remove Item" />
                      </form>
                                  <button type="button" class="btn btn-info btn-md pull-right" id="viewproduct" data-toggle="modal" data-target="#myModal" data-item="<?= $row[1] ?>" data-desc="<?= $row[2] ?>" data-img="<?= $row[3] ?>" data-quan="<?=$row[4] ?>" data-price="<?= $row[5] ?>">View Product</button>
                             </div>
                          </div>
                      <? 
                        if(isset($_POST['removeItem'.$i])) {
                          $removeSQL = "DELETE FROM shopping_cart WHERE item_ID= '" . $_POST['cartid'.$i] . "'";
                          $removeresult = mysqli_query($db, $removeSQL);
                        }
                        $i += 1;
                        } while($row = mysqli_fetch_array($result)) ?>
                      <form method="request" action="checkout.php">
                      <div class="checkout col-sm-10">
                        <div class="col-sm-10 text-right">
                          <h5>Ready to checkout?</h5>
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-default pull-right">Checkout</button>
                        </div>
                      </div>
                      </form>

                      <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><?= $itemName ?></h4>
                            </div>
                            <div class="modal-body text-right">
                                  <img id="image" src="<?= $itemImg ?>" alt="<?= $row[1] ?>" type="image" width: "200px;">
                                  <p id="description"><?= $itemDesc ?></p>
                                  <h3 id="price"><?= $itemPrice ?></h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" name="closemodal" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
              
          <? } else { ?>

          <div class="accountLink col-sm-2 text-right">
                          <a href="sign-in.php">

                          <? 
                          if(isset($_SESSION['user'])){
                              
                              $username = $_SESSION['user'];

                              print $username;

                          } elseif(isset($_SESSION['login_member'])) {

                              $username = $_SESSION['login_member'];

                              print $username;

                          } else {

                              print "Login";

                          }
                          ?>

                          </a>
                        </div>
                  </div>

                  <div id="myItem" class="box col-sm-10">
                     
                     <div class="description col-sm-10">
                          <h4>There are no items in your cart</h4>
                          <a href="store.php">Click Here to go to the Store</a>
                          
                     </div>
                  </div>
                </div>
          </form>
      <? } ?>
  <?
      mysqli_free_result($result);
      mysqli_close($db);

      if(isset($_POST['removeItem'])) {
        unset($_SESSION['shoppingcart']);
      }
  ?>
  </main>
<?php include 'footer.php'; ?>

<script>
   $('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var name = button.data('item'); // Extract info from data-* attributes
  var description = button.data('desc');
  var quantity = button.data('quan');
  var price = button.data('price');
  var image = button.data('img');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(name);
  document.getElementById('image').src=image;
  document.getElementById('quantity').innerHTML = quantity;
  document.getElementById('description').innerHTML = description;
  document.getElementById('price').innerHTML = price;
  
});
</script>