<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
             Supplement
              <small> Dashboard</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
              <li class="active">Create New Supplement</li>
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
                      <h3 class="box-title">Add Supplement</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputName1">Supplement ID</label>
                          <input type="text" class="form-control" id="supple" placeholder="Enter Supplement ID" required>
                        </div>

                        <div class="form-group">
                                <label  for="exampleInputName1">Select Supplier ID</label>

                                <select name="supplier" id="supplier" class="form-control">
                                <option value="SUPPLIER A">Supplier A</option>
                                <option value="SUPPLIER B">Supplier B</option>
                                <option value="SUPPLIER C">Supplier C</option>
                                <option value="SUPPLIER D">Supplier D</option>
                                <option value="SUPPLIER E">Supplier E</option>
                                <option value="SUPPLIER F">Supplier F</option>
                                <option value="SUPPLIER G">Supplier G</option>
                                <option value="SUPPLIER H">Supplier H</option>
                                <option value="SUPPLIER J">Other</option>
                                </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputName1">Description</label>
                          <textarea  id="descript" class="form-control" rows="4"  placeholder="Enter Supplement Description" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Cost</label>
                          <input type="number" class="form-control" id="cost_excl" placeholder=" Enter price" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Min Levels</label>
                          <input type="number" class="form-control" id="min_lvls" placeholder="Enter Min levels" required>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputName1">Current Stock Levels</label>
                          <input type="number" class="form-control" id="cur_stock_lvls" placeholder="Enter Current Stock Levels"required>
                        </div>
                     

                        <div class="form-group">
                          <label for="exampleInputName1">Nappi Code</label>
                          <input type="text" class="form-control" id="nappi" placeholder="Enter Nappi Code">
                        </div>
                      </div>
                      
                      
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="addSupplement()" value="Submit"></input>
                        <a href="/althealth/supplements" class="btn btn-info">Back</a>
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
  function addSupplement(){

        $.ajax(
        {
            type: "POST",
            url: '../api/supplement/create.php',
            dataType: 'json',
            data: {
               supple: $("#supple").val(),
               supplier: $("#supplier").val(),        
               descript: $("#descript").val(),
               cost_excl: $("#cost_excl").val(),
               min_lvls: $("#min_lvls").val(),
               cur_stock_lvls: $("#cur_stock_lvls").val(),
               nappi: $("#nappi").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New Supplement!");
                    window.location.href = '/althealth/supplements';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>