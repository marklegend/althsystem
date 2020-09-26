<?php
include('function.php');
include('../Template/header.php');
include('../Template/sidenav.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Dashboard
        <small>Welcome to AltHealth's Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">

      <div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Unpaid Invoices</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>Client ID </th>
                                   
                                <th>Client</th>
									<th>Invoice No</th>
									<th>Invoice Date</th>
					
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   I.CLIENT_ID 'Client ID',
				   CONCAT(C.C_NAME,' ', C.C_SURNAME) 'Client',
				   I.INV_NUM 'Invoice No',
				   I.INV_DATE 'Invoice Date'
				   FROM
				   invinfo I , clientinfo C
				   WHERE
				   I.inv_date<'2020-01-02' AND I.INV_PAID<>'Y'
				   AND
				   I.Client_id = C.Client_id
				   ORDER BY I.Inv_Date ASC";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['Client ID'];
                            echo '<td>'. $row['Client'];
							echo '<td>'. $row['Invoice No'];
							echo '<td>'. $row['Invoice Date'];
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
				</div>
			</div>

		

		<div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Top Selling Months</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>No of Purchases </th>
                                   
                                <th>Month</th>
									
					
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   count(extract(month from Inv_Date)) 'No of purchases',
				   monthname(Inv_Date) 'Month'
				   FROM invinfo
				   GROUP BY MONTH
				   ORDER BY extract(month from Inv_Date)";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['No of purchases'];
                            echo '<td>'. $row['Month'];
						
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
				</div>
			</div>

		


			<div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Clients todays birthdays</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>Client ID </th>
                                   
                                <th>Client Name</th>
									
					
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   Client_id, CONCAT(C_NAME,' ',C_SURNAME) 'Client name'
				   FROM clientinfo
				   WHERE
				   SUBSTRING(CLIENT_ID,3,2) = EXTRACT(MONTH FROM CURRENT_DATE)
				   AND
				   SUBSTRING(CLIENT_ID,5,2) = EXTRACT(DAY FROM CURRENT_DATE)";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['Client_id'];
                            echo '<td>'. $row['Client name'];
						
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
				</div>
			</div>



		
		<div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Min level Stock</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>Supplement </th>
                                   
                                <th>Supplier infomation</th>
									<th>Min levels</th>
									<th>Current stock</th>
					
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   S.SUPPLEMENT_ID 'Supplement',
				   CONCAT(S.SUPPLIER_ID,' ',C.Contact_Person,' ',C.Supplier_Tel) 'Supplier information',
				   S.Min_levels 'Min levels',
				   S.Current_stock_levels 'Current stock'
				   FROM `supplements` S, supplierinfo C
				   WHERE Current_stock_levels < Min_levels
				   AND S.SUPPLIER_ID = C.Supplier_ID
				   ORDER BY S.SUPPLIER_ID
				   LIMIT 10";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['Supplement'];
                            echo '<td>'. $row['Supplier information'];
							echo '<td>'. $row['Min levels'];
							echo '<td>'. $row['Current stock'];
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
				</div>
			</div>


		<div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Top 10 clients</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>Frequency </th>
                                   
                                <th>Client</th>
									
					
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   count(I.client_id) 'Frequency',
				   concat(I.CLIENT_ID,' ',C.c_name,' ', C.C_surname) 'Client'
				   FROM
				   invinfo I, clientinfo C
				   WHERE
				   extract(year from inv_date) in ('2018','2019')
				   AND
				   I.Client_id = C.Client_id
				   GROUP BY I.client_id
				   ORDER BY count(I.client_id) desc
				   LIMIT 10";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['Frequency'];
                            echo '<td>'. $row['Client'];
                           
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
                    </div>
                </div>
				</div>
			</div>
		
			<div class="col-md-6 ">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Quick Client Contact info</strong></div>
				<div class="panel-body" align="center">
				
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="client_data" class="table table-bordered table-striped">
                    			<thead><tr>
								<th>Client </th>
                                   
                                <th>Home</th>
									<th>Work</th>
					<th>Cell</th>
					<th>E-mail</th>
								</tr></thead>
								<tbody>
								 <?php
                 
                   $pdo = Dash::connect();
				   $sql = "SELECT
				   Client_id 'Client', C_Tel_H 'Home',
				   C_Tel_W 'Work', C_Tel_C 'Cell', C_Email 'E-mail'
				   FROM clientinfo
				   WHERE NULLIF(C_TEL_C,' ') IS NULL
				   AND NULLIF(C_EMAIL,' ') IS NULL";
				   
				   
                   if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                        
                            echo '<td>'. $row['Client'];
                            echo '<td>'. $row['Home'];
							echo '<td>'. $row['Work'];
							echo '<td>'. $row['Cell'];
							echo '<td>'. $row['E-mail'];
                            echo '</tr>';
                   }
                }
            }
                   Dash::disconnect();
                  ?>
								</tbody>
                    		</table>
                    	</div>
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
        url: "../api/user/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].name+"</td>"+
                "<td>"+data[user].email+"</td>"+
                "<td>"+data[user].phone+"</td>"+
                "<td>"+((data[user].gender == 0)? "Male": "Female")+"</td>"+
                "<td>"+data[user].position+"</td>"+
                "<td><a href='update.php?id="+data[user].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[user].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#users"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the user Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/user/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed user!");
                    window.location.href = '/althealth/users';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>