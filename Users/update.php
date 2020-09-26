<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Welcome to AltHealth's User Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Update User</li>
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
                      <h3 class="box-title">Update user</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputName1">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">Phone</label>
                          <input type="text" class="form-control" id="phone" placeholder="Enter Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Gender</label>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="gender0" value="0" checked="">
                                Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" name="gender" id="gender1" value="1">
                                Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName1">position</label>
                          <input type="text" class="form-control" id="position" placeholder="Enter Specialization">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="updateUser()" value="Update"></input>
                        <a href="/althealth/users" class="btn btn-primary">Back</a>
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
            url: "../api/user/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#name').val(data['name']);
                $('#email').val(data['email']);
                $('#password').val(data['password']);
                $('#phone').val(data['phone']);
                $('#gender'+data['gender']).prop("checked", true);
                $('#position').val(data['position']);
            },
            error: function (result) {
                console.log(result);
            },
        });
    });
    function updateUser(){
        $.ajax(
        {
            type: "POST",
            url: '../api/user/update.php',
            dataType: 'json',
            data: {
                id: <?php echo $_GET['id']; ?>,
                name: $("#name").val(),
                email: $("#email").val(),        
                password: $("#password").val(),
                phone: $("#phone").val(),
                gender: $("input[name='gender']:checked").val(),
                position: $("#position").val(),
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Updated user!");
                    window.location.href = '/althealth/users';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>