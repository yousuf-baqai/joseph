 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php if($this->adminrole != 'sub admin'):?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo date('d, M');?></h3>
              <p><span class="timeclock"></span></p>
            </div>
            <div class="icon">
              <i class="icon-calendar"></i>
            </div>
          </div>
          <?php endif?>
        </div>   

      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  