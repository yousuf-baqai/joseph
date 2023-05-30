<div class="content-wrapper">
  <section class="content-header">
    <h1>
        <?php echo !empty($title)?$title:'Title';?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data</h3>
          </div>     
          <div class="col-md-8">
            <form role="form" action="<?php echo base_url('admin/profile/');?>" method="post" enctype="multipart/form-data">       
              <div class="box-body">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo !empty($record->user_name)?$record->user_name:''?>" required>
                  <?php echo form_error('user_name'); ?>
                </div>  
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" id="new_password" name="new_password">
                  <?php echo form_error('new_password'); ?>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" id="cnf_password" name="cnf_password">
                  <?php echo form_error('cnf_password'); ?>
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo !empty($record->user_email)?$record->user_email:''?>" required>
                  <?php echo form_error('user_email'); ?>
                 </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control"  id="user_phone" name="user_phone" value="<?php echo !empty($record->user_phone)?$record->user_phone:''?>"  data-inputmask="'mask': '(999) 999-9999'">
                  <?php echo form_error('user_phone'); ?>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3" id="user_address" name="user_address"><?php echo !empty($record->user_address)?$record->user_address:''?></textarea>
                  <?php echo form_error('user_address'); ?>
                </div>
                <div class="form-group">
                  <label>Profile Picture</label>
                  <div class="input-group-btn">
                    <div class="image-upload">                      
                      <img src="<?php echo !empty($record->user_image)?base_url('uploads/user/').$record->user_image:base_url('assets/admin/img/placeholder.png')?>">
                      <div class="file-btn">
                        <input type="file" id="user_image" name="user_image">
                        <input type="text" id="user_image" name="user_image" value="<?php echo !empty($record->user_image)?$record->user_image:''?>" hidden>
                        <label class="btn btn-info">Upload</label>
                      </div>
                    </div>
                  </div>
                   <?php echo form_error('user_image'); ?>                
                </div>              
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="icon-check"></i> Submit</button>
              </div>    
            </form>        
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>
