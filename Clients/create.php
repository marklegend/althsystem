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
              <li class="active">Create New Client</li>
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
                            <h3 class="box-title">Add Client</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Client Name" maxlength="20" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputName1" >Surname</label>
                                <input type="text"  id="surname" class="form-control" placeholder="Enter Client Surname" maxlength="20" required >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" >Email</label>
                                <input type="email"  id="email" class="form-control" placeholder="Enter Clients Email" maxlength="40" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, }$" >
                            </div>

                            
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date"  id="birth"  class="form-control" placeholder="yyyy/mm/dd" required>
                            </div>

                            <div class="form-group">
                            <label for="exampleInputName1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="optionsRadios2" value="1">
                                Female
                                </label>
                            </div>

                            <div class="form-group">
                                <label  for="exampleInputName1" >Address</label>
                               
                                <textarea  id="address" class="form-control" rows="4"  placeholder="Enter address" maxlength="60" required></textarea>
                            </div>


                            <div class="form-group">
                                <label  for="exampleInputName1" >Code</label>
                                <input type="number" id="code" class="form-control" maxlength="5" placeholder="Enter postal code" >
                            </div>


                            <div class="form-group">
                                <label  for="exampleInputName1" >Mobile No</label>
                                <input type="number"  id="cell" class="form-control" placeholder="Enter cellphone no" maxlength="10" required pattern="[+-]?([0-9]*[.])?[0-9]+" >
                            </div>

                            <div class="form-group">
                                <label  for="exampleInputName1">Tel-Home No</label>
                                <input type="number" id="home" class="form-control"   placeholder="Enter home telephone no" maxlength="10" pattern="[+-]?([0-9]*[.])?[0-9]+" >
                            </div>
                            <div class="form-group">
                                <label  for="exampleInputName1" >Tel-Work No</label>
                                <input type="number"  id="work" class="form-control"  placeholder="Enter work telephone no" maxlength="10"  pattern="[+-]?([0-9]*[.])?[0-9]+" >
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
                          <input type="button" class="btn btn-primary" onClick="AddClient()" value="Submit"></input>
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
<script>
  function AddClient(){

        $.ajax(
        {
            type: "POST",
            url: '../api/client/create.php',
            dataType: 'json',
            data: {
                name: $("#name").val(),
                surname: $("#surname").val(),
                email: $("#email").val(),        
                birth: $("#birth").val(),
                gender: $("input[name='gender']:checked").val(),
                address: $("#address").val(),
                code: $("#code").val(), 
                cell: $("#cell").val(), 
                home: $("#home").val(), 
                work: $("#work").val(), 
                reference: $("#reference").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Added New client!");
                    window.location.href = '/althealth/clients';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  
</script>