<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Order Invoices
        <small> Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Order Invoices</li>
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
                      <h3 class="box-title">Update invoice</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        
                        <div class="form-group">
                            <label for="exampleInputName1">Paid</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="paid" id="paid1" value="Y" checked="">
                                Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="paid" id="paid0" value="N">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Received Payment</label>
                          <input type="date" class="form-control" id="paid_date" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Comments</label>
                          <textarea  id="comments" class="form-control" rows="6"  placeholder="comments"></textarea>
                        </div>

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="Updateinvoice()" value="Update"></input>
                        <a href="/althealth/invoices" class="btn btn-info">Back</a>
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
            url: "../api/invoice/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#invnum').val(data['invnum']);
                $('#client').val(data['client']);
                $('#invdate').val(data['invdate']);
                $('#paid').val(data['paid']);
                $('#paid_date').val(data['paid_date']);
                $('#comments').val(data['comments']);
            },
            error: function (result) {
                console.log(result);
            },
           
        });
    });
    function Updateinvoice(){
        $.ajax(
        {
            type: "POST",
            url: '../api/invoice/update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                
                paid: $("input[name='paid']:checked").val(),
                paid_date: $("#paid_date").val(),
                comments: $("#comments").val()

            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated invoice!");
                    window.location.href = '/althealth/invoices';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>