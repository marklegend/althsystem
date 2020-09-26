<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Client
        <small> Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Clients</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">


        <div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Clients List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="clients" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Address</th>
                            <th>Code</th>
                            <th>Email</th>
                            <th>Cellphone</th>
                            <th>Tel Home</th>
                            <th>Tel Work</th>
                            <th>Reference ID</th>
                            <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Address</th>
                            <th>Code</th>
                            <th>Email</th>
                            <th>Cellphone</th>
                            <th>Tel Home</th>
                            <th>Tel Work</th>
                            <th>Reference ID</th>
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
        url: "../api/client/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var client in data){
                response += "<tr>"+
                "<td>"+data[client].id+"</td>"+
                "<td>"+data[client].name+"</td>"+
                "<td>"+data[client].surname+"</td>"+
                "<td>"+data[client].address+"</td>"+
                "<td>"+data[client].code+"</td>"+
                "<td>"+data[client].email+"</td>"+
                "<td>"+data[client].cell+"</td>"+
                "<td>"+data[client].home+"</td>"+
                "<td>"+data[client].work+"</td>"+
                "<td>"+data[client].reference+"</td>"+
                "<td><a href='update.php?id="+data[client].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[client].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#clients"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the client Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/client/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed client!");
                    window.location.href = '/althealth/clients';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>