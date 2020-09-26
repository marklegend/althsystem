<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Dashboard
              <small>Welcome to AltHealth's Dashboard</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
              <li class="active">Update Client info</li>
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
                            <h3 class="box-title">Update Client</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Client Name" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputName1" >Surname</label>
                                <input type="text"  id="surname" class="form-control" placeholder="Enter Client Surname" required >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" >Email</label>
                                <input type="email"  id="email" class="form-control" placeholder="Enter Clients Email" required >
                            </div>

                            

                            <div class="form-group">
                                <label  for="exampleInputName1" >Address</label>
                               
                                <textarea " id="address" class="form-control" rows="4"  placeholder="Enter address"></textarea>
                            </div>


                            <div class="form-group">
                                <label  for="exampleInputName1" >Code</label>
                                <input type="number" id="code" class="form-control" placeholder="Enter postal code" >
                            </div>


                            <div class="form-group">
                                <label  for="exampleInputName1" >Mobile No</label>
                                <input type="text"  id="cell" class="form-control" placeholder="Enter cellphone no" required pattern="[+-]?([0-9]*[.])?[0-9]+" >
                            </div>

                            <div class="form-group">
                                <label  for="exampleInputName1">Tel-Home No</label>
                                <input type="text" id="home" class="form-control"  placeholder="Enter home telephone no" pattern="[+-]?([0-9]*[.])?[0-9]+" >
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputName1" >Tel-Work No</label>
                                <input type="text"  id="work" class="form-control" placeholder="Enter work telephone no"  pattern="[+-]?([0-9]*[.])?[0-9]+" >
                            </div>

                            <div class="form-group">
                                <label  for="exampleInputName1">Select Reference ID</label>

                                <select name="reference" id="reference" class="form-control">
                                <option value="1">Website</option>
                                <option value="2">Word by mouth</option>
                                <option value="3">Friend</option>
                                <option value="4">Facebook</option>
                                <option value="5">Myself</option>
                                <option value="6">Other</option>
                                </select>
                            </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                          <input type="button" class="btn btn-primary" onClick="updateClient()" value="Submit"></input>
                          <a href="/althealth/clients" class="btn btn-info">Back</a>
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
          <!-- page script -->
          
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "../api/client/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
               
                $('#name').val(data['name']),
                $('#surname').val(data['surname']),
                $('#email').val(data['email']),
                $('#address').val(data['address']),
                $('#code').val(data['code']),
                $('#cell').val(data['cell']),
                $('#home').val(data['home']),
                $('#work').val(data['work']),
                $('#reference').val(data['reference'])
  
            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function updateClient(){
        $.ajax(
        {
            type: "POST",
            url: '../api/client/update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                name: $("#name").val(),
                surname: $("#surname").val(),
                email: $("#email").val(),
                address: $("#address").val(),
                code: $('#code').val(),
                cell: $('#cell').val(),
                home: $('#home').val(),
                work: $('#work').val(),
                reference: $('#reference').val()
                     
                
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated Client!");
                    window.location.href = '/althealth/clients';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>