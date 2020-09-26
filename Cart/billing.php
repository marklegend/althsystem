<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Checking out an order
        <small>Billing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Placing an order</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">
          
         <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Checking out and Billing</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputName1">Order No</label>
                          <input type="text" class="form-control" id="order" placeholder="Order ID">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputName1">Item Descriptions</label>
                          <textarea  id="description" class="form-control" rows="6"  placeholder="list"></textarea>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputName1">Quantity</label>
                          <input type="number" class="form-control" id="item_quantity" placeholder="QTY">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">VAT</label>
                          <input type="number" class="form-control" id="cost_excl" placeholder="15% VAT">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Total Price</label>
                          <input type="number" class="form-control" id="cost_incl" placeholder="Enter Total price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Shipping Address</label>
                          <textarea  id="address" class="form-control" rows="6"  placeholder="Enter Shipping Address" required></textarea>
                        </div>
                        <div class="form-group">
                                <label  for="exampleInputName1">Select Payment Type</label>

                                <select name="payment" id="payment" class="form-control">
                                <option value="Cheque">Cheque</option>
                                <option value="Credit">Credit</option>
                                <option value="Other">Other</option>
                                </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputName1">Comments</label>
                          <textarea  id="comments" class="form-control" rows="6"  placeholder="comments"></textarea>
                        </div>
                                               
                     </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="addcart()" value="Place Order"></input>
                        <a href="/althealth/cart" class="btn btn-info">Cancel Order</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>
</section>
              <?php
              include('../Template/footer.php');
            ?>
<script>

$(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../api/cart/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#name').val(data['name']);
                $('#email').val(data['email']);
                $('#password').val(data['password']);
                $('#phone').val(data['phone']);
                $('#gender'+data['gender']).prop("checked", true);
                $('#specialist').val(data['specialist']);
            },
            error: function (result) {
                console.log(result);
            },
        });
    });

  function addcart(){

        $.ajax(
        {
            type: "POST",
            url: '../api/cart/create.php',
            dataType: 'json',
            data: {
                name: $("#name").val(),
                email: $("#email").val(),        
                password: $("#password").val(),
                phone: $("#phone").val(),
                gender: $("input[name='gender']:checked").val(),
                specialist: $("#specialist").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New cart!");
                    window.location.href = '/althealth/carts';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>