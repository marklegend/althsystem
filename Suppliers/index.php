<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suppliers
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Suppliers</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">



  <div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Suppliers List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="suppliers" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                          <th>Supplier ID</th>
                          <th>Supplier Contact Name</th>
                          <th>Supplier Tel</th>
                          <th>Supplier Email</th>
                          <th>Bank</th>
                          <th>Bank code</th>
                          <th>Bank No</th>
                          <th>Bank Type</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Supplier ID</th>
                        <th>Supplier Contact Name</th>
                        <th>Supplier Tel</th>
                        <th>Supplier Email</th>
                        <th>Bank</th>
                        <th>Bank code</th>
                        <th>Bank No</th>
                        <th>Bank Type</th>
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
<!-- page script -->
<script>
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../api/supplier/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var supplier in data){
                response += "<tr>"+
                "<td>"+data[supplier].supplier+"</td>"+
                "<td>"+data[supplier].sname+"</td>"+
                "<td>"+data[supplier].stel+"</td>"+
                "<td>"+data[supplier].semail+"</td>"+
                "<td>"+data[supplier].sbank+"</td>"+
                "<td>"+data[supplier].scode+"</td>"+
                "<td>"+data[supplier].sacc+"</td>"+
                "<td>"+data[supplier].stype+"</td>"+
                "<td><a href='update.php?id="+data[supplier].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[supplier].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#suppliers"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the supplier Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/supplier/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed supplier!");
                    window.location.href = '/althealth/suppliers';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>