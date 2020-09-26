<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cart
        <small> Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Shop</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">
      <div style="float: right; cursor: pointer; margin: 10px 5px;">
         <i class="fa fa-shopping-cart fa-2x my-cart-icon"> <span class="badge badge-notify my-cart-badge"></span></i>
      </div>

        <div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Shop</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="clients" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                            <th>Supplier ID</th>
                            <th>Description</th>
                            <th>Price</th>
                           
                            <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <td>SUPPLIER A</td>
                      <td>Omega 3 Double Strength 60's</td>
                      <td>R356.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="1" data-name="Omega 3 Double Strength 60's" data-summary="Omega 3 Double Strength 60's" 
                    data-price="356.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Anti-Anxiety tables 30's</td>
                      <td>R223.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="2" data-name="Anti-Anxiety tables 30's" data-summary="Anti-Anxiety tables 30's" 
                    data-price="223.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Babies 60's</td>
                      <td>R145.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="3" data-name="Babies 60's" data-summary="Babies 60's" 
                    data-price="145.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Curcumin 60s</td>
                      <td>R270.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="4" data-name="Curcumin 60s" data-summary="Curcumin 60s" 
                    data-price="270.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Vitamin C</td>
                      <td>R226.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="5" data-name="Vitamin C" data-summary="Vitamin C" 
                    data-price="226.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Vitamin K2 30's</td>
                      <td>R632.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="6" data-name="Vitamin K2 30's" data-summary="Vitamin K2 30's" 
                    data-price="632.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Vitamin Double C</td>
                      <td>R413.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="7" data-name="Vitamin Double C" data-summary="Vitamin Double C" 
                    data-price="413.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Men Adult 50+ 60's</td>
                      <td>R308.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="8" data-name="Men Adult 50+ 60's" data-summary="Men Adult 50+ 60's" 
                    data-price="308.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Folic Acid 60's</td>
                      <td>R303.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="9" data-name="Folic Acid 60's" data-summary="Folic Acid 60's" 
                    data-price="303.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Ginkgo Biloba Extract 30 x 200</td>
                      <td>R303.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="10" data-name="Ginkgo Biloba Extract 30 x 200" data-summary="Ginkgo Biloba Extract 30 x 200" 
                    data-price="303.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER H</td>
                      <td>Men Teens 120's</td>
                      <td>R253.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="11" data-name="Men Teens 120's" data-summary="Men Teens 120's" 
                    data-price="253.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Airmune Effervescent</td>
                      <td>R220.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="12" data-name="Airmune Effervescent" data-summary="Airmune Effervescent" 
                    data-price="220.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Burnout Support 60's</td>
                      <td>R168.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="13" data-name="Burnout Support 60's" data-summary="Burnout Support 60's" 
                    data-price="168.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Garcinia Tablets 60's</td>
                      <td>R242.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="14" data-name="Garcinia Tablets 60's" data-summary="Garcinia Tablets 60's" 
                    data-price="242.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Breather Inhaler</td>
                      <td>R140.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="15" data-name="Breather Inhaler" data-summary="Breather Inhaler" 
                    data-price="140.0" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Green tea extract 60's</td>
                      <td>R422.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="16" data-name="Green tea extract 60's" data-summary="Green tea extract 60's" 
                    data-price="422.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Calmag 120's</td>
                      <td>R219.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="17" data-name="Calmag 120's" data-summary="Calmag 120's" 
                    data-price="219.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER H</td>
                      <td>Olive healing gel</td>
                      <td>R348.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="18" data-name="Olive healing gel" data-summary="Olive healing gel" 
                    data-price="348.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER I</td>
                      <td>Krill Oil 30's</td>
                      <td>R361.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="19" data-name="Krill Oil 30's" data-summary="Krill Oil 30's" 
                    data-price="361.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Natural sleep formula 120's</td>
                      <td>R307.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="20" data-name="Natural sleep formula 120's" data-summary="Natural sleep formula 120's" 
                    data-price="307.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Appetite control chewies 40's</td>
                      <td>R164.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="21" data-name="Appetite control chewies 40's" data-summary="Appetite control chewies 40's" 
                    data-price="164.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Natural Antibiotics 120's</td>
                      <td>R230.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="22" data-name="Natural Antibiotics 120's" data-summary="Natural Antibiotics 120's" 
                    data-price="230.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Coffee scrub</td>
                      <td>R255.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="23" data-name="Coffee scrub" data-summary="Coffee scrub" 
                    data-price="255.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Skin Formula 60's</td>
                      <td>R247.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="24" data-name="Skin Formula 60's" data-summary="Skin Formula 60's" 
                    data-price="247.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER I</td>
                      <td>Women Adult 70+ 60's</td>
                      <td>R278.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="25" data-name="Women Adult 70+ 60's" data-summary="Women Adult 70+ 60's" 
                    data-price="278.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER H</td>
                      <td>Aloe Vera scrub</td>
                      <td>R435.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="26" data-name="Aloe Vera scrub" data-summary="Aloe Vera scrub" 
                    data-price="435.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER C</td>
                      <td>Vitamin D3 60's</td>
                      <td>R250.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="27" data-name="Vitamin D3 60's" data-summary="Vitamin D3 60's" 
                    data-price="250.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Women Teens 120's</td>
                      <td>R191.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="28" data-name="Women Teens 120's" data-summary="Women Teens 120's" 
                    data-price="191.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Curcumin 30's</td>
                      <td>R307.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="29" data-name="Curcumin 30's" data-summary="Curcumin 30's" 
                    data-price="307.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER I</td>
                      <td>Glucose</td>
                      <td>R271.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="30" data-name="Glucose" data-summary="Glucose" 
                    data-price="271.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Homocysteine lowering support</td>
                      <td>R265.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="31" data-name="Homocysteine lowering support" data-summary="Homocysteine lowering support" 
                    data-price="265.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Hormone balance 120's</td>
                      <td>R221.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="32" data-name="Hormone balance 120's" data-summary="Hormone balance 120's" 
                    data-price="221.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER E</td>
                      <td>Inflammation and pain support</td>
                      <td>R390.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="33" data-name="Inflammation and pain support" data-summary="Inflammation and pain support" 
                    data-price="390.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER G</td>
                      <td>Iron Plus 30's</td>
                      <td>R273.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="34" data-name="Iron Plus 30's" data-summary="Iron Plus 30's" 
                    data-price="273.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>
                    <tr>
                      <td>SUPPLIER B</td>
                      <td>Natural Probiotic 120's</td>
                      <td>R196.00</td>
                    <td> <button class="btn btn-success my-cart-btn" data-id="34" data-name="Natural Probiotic 120's" data-summary="Natural Probiotic 120's" 
                    data-price="196.00" data-quantity="1" data-image="images/drugs.png">Add to Cart</button> </td>
                    </tr>

                      </tbody>
                      <tfoot>
                      <tr>
                             <th>Supplier ID</th>
                            <th>Description</th>
                            <th>Price</th>
                           
                            <th>Actions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>
 </section>
 <?php
include('../Template/footer.php');
?>

<script src="js/jquery-2.2.3.min.js"></script>
<script type='text/javascript' src="js/bootstrap.min.js"></script>
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      currencySymbol: 'R',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [
      
        {}
      ],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });
       
        console.log("checking out", products, totalPrice, totalQuantity);
     
      },
     
    });

    
  });

  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../api/cart/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var invoice in data){
                response += "<tr>"+
                "<td>"+data[invoice].invnum+"</td>"+
                "<td>"+data[invoice].client+"</td>"+
                "<td>"+data[invoice].invdate+"</td>"+
                "<td>"+data[invoice].paid+"</td>"+
                "<td>"+data[invoice].paid_date+"</td>"+
                "<td>"+data[invoice].comments+"</td>"+
                "<td><a href='update.php?id="+data[invoice].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[invoice].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#Invoices"));
        }
    });
  });
  </script>

