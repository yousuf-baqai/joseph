<?php $filepath = ROOT_DIR.'robots.txt';?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
        Robots.txt
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <?php if(file_exists($filepath)):?>
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data</h3>
          </div>     
          <?php endif;?> 
          <div class="col-md-12">
            <form role="form" action="<?php echo base_url('admin/robots');?>" method="post" enctype="multipart/form-data">   

              <?php if(!file_exists($filepath)):?>
              <div class="box-body no-records">  
                <p class="">robots.txt not found.</p>
                <a class="dt-button btn btn-success" href="<?php echo base_url('admin/robots/create');?>"><span><i class="fa fa-file"></i> Create one?</span></a>
              </div>              

              <?php else:?>    
              <div class="box-body">
                <div class="form-group">                  
                  


                 
                  <label>File Content</label>
                  <textarea class="form-control " id="content" name="content" rows="20"><?php
                    $fh = fopen($filepath,'r'); while ($line = fgets($fh)) {echo $line;}fclose($fh);
                    ?></textarea>
                  
                </div>              
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="icon-check"></i> Submit</button>
                <a href="<?php echo base_url('admin/robots/delete');?>" class="btn delete_confirm btn-danger"><i class="icon-trash"></i> Delete</a>
                <a href="<?php echo base_url('robots.txt');?>" download="robots.txt" class="btn btn-info"><i class="icon-arrow-down-circle"></i> Download</a>
              </div>                  
              
              <?php endif;?>  
            </form>        
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $('.delete_confirm').on('click',function(e){
    e.preventDefault();
    choice = confirm('Are you sure you wanted to delete? This action cannot be undone.');
    if(choice == true){
      window.location.replace($(this).attr('href'));
    }
  });
</script>