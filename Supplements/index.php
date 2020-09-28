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
        <li class="active">Supplements</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">

         <div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Supplements List</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="supplements" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Supplement ID</th>
                        <th>Supplier ID</th>
                        <th>Description</th>
                        <th>Cost Excl</th>
                        <th>Cost Incl</th>
                        <th>Min levels</th>
                        <th>Current Stock Lvls</th>
                        <th>Nappi code</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                      <th>Supplement ID</th>
                        <th>Supplier ID</th>
                        <th>Description</th>
                        <th>Cost Excl</th>
                        <th>Cost Incl</th>
                        <th>Min levels</th>
                        <th>Current Stock Lvls</th>
                        <th>Nappi code</th>
                        <th>Action</th>
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
        url: "../api/supplement/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var supplement in data){
                response += "<tr>"+
                "<td>"+data[supplement].supple+"</td>"+
                "<td>"+data[supplement].supplier+"</td>"+
                "<td>"+data[supplement].descript+"</td>"+
                "<td>"+data[supplement].cost_excl+"</td>"+
                "<td>"+data[supplement].cost_incl+"</td>"+
                "<td>"+data[supplement].min_lvls+"</td>"+
                "<td>"+data[supplement].cur_stock_lvls+"</td>"+
                "<td>"+data[supplement].nappi+"</td>"+
                "<td><a href='update.php?id="+data[supplement].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[supplement].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#supplements"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the supplement Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/supplement/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed supplement!");
                    window.location.href = '/althealth/supplements';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>