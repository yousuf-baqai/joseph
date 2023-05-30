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
          <div class="col-md-12">
            <form role="form" action="<?php echo base_url('admin/editfile/edit/').$page;?>" method="post" enctype="multipart/form-data">       
              <div class="box-body">
                <div class="form-group">
                  <label>File Content</label>
                  <textarea class="form-control " id="filecontent" name="filecontent" rows="20"><?php
                    $filepath = $_SERVER["DOCUMENT_ROOT"].'/eventeca_dev/application/views/front/'.$page;
                    $fh = fopen($filepath,'r'); while ($line = fgets($fh)) {echo $line;}fclose($fh);
                    ?></textarea>
                    <input type="hidden" name="pagename" value="<?php echo  $page;?>">
                    <input type="hidden" name="filename" value="<?php echo  $filepath;?>">
                </div>              
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success"><?php echo ($this->uri->segment(4) == 'edit')?'<i class="icon-check"></i> Update Data':'<i class="icon-check"></i> Insert Data';?></button>
              </div>       
            </form>        
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>
