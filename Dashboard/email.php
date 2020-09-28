<?php
include('../Template/header.php');
include('../Template/sidenav.php');
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Let us know
        <small> Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> AltHealth</a></li>
        <li class="active">Email</li>
      </ol>
    </section>
    
  <!-- Main content -->
  <section class="content container-fluid">

    <!-- quick email widget -->
    <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="processemail.php" method="post">
              <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea id="message" class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                <div class="box-footer">
            <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
           
            <!-- /.box-body -->
            
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
            </div>
              </form>
            </div>
            
          </div>
          </div>

          </section>
            <?php
            include('../Template/footer.php');
          ?>

<script>
  $(function () {
    //Add text editor
    $(".textarea").wysihtml5();
  });
</script>

