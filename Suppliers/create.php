<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Welcome to AltHealth's Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Suppliers</li>
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
                      <h3 class="box-title">Add Supplier</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                      <div class="form-group">
                          <label for="exampleInputName1">Creater ID</label>
                          <input type="text" class="form-control" id="supplier" placeholder="Create Supplier ID">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Suppliers Name</label>
                          <input type="text" class="form-control" id="sname" placeholder="Enter Suppliers Full Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" id="semail" placeholder="Enter Suppliers email">
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputName1">Telephone</label>
                          <input type="text" class="form-control" id="stel" placeholder="Enter Suppliers Telephone">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputName1">Bank</label>
                          <input type="text" class="form-control" id="sbank" placeholder="Enter Suppliers Bank Name">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputName1">Code</label>
                          <input type="number" class="form-control" id="scode" placeholder="Enter Suppliers Bank/Branch Code">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputName1">Account No</label>
                          <input type="number" class="form-control" id="sacc" placeholder="Enter Suppliers Bank Account No">
                        </div>

                        <div class="form-group">
                                <label  for="exampleInputName1">Select Account Type</label>

                                <select name="stype" id="stype" class="form-control">
                                <option value="Cheque">Cheque</option>
                                <option value="Credit">Credit</option>
                                
                                </select>
                            </div>
                        
                       
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="AddSupplier()" value="Submit"></input>
                        <a href="/althealth/suppliers" class="btn btn-info">Back</a>
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
  function AddSupplier(){

        $.ajax(
        {
            type: "POST",
            url: '../api/supplier/create.php',
            dataType: 'json',
            data: {
                supplier: $("#supplier").val(),
                sname: $("#sname").val(),
                semail: $("#semail").val(),        
                stel: $("#stel").val(),
                sbank: $("#sbank").val(),
                scode: $("#scode").val(),
                sacc: $("#sacc").val(),
                stype: $("#stype").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New supplier!");
                    window.location.href = '/althealth/suppliers';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>