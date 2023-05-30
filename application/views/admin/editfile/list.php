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
          <div class="col-md-6">            
              <div class="box-body">
                <div class="form-group">
                  <?php 
                    $filepath = $_SERVER["DOCUMENT_ROOT"].'/eventeca_dev/application/views/front/';
                    $files = scandir($filepath);
                    foreach($files as $file) {
                        if(is_file($filepath.$file)){
                          echo '<a href="'.base_url().'admin/editfile/edit/'.$file.'">'.$file.'</a><br>';
                        }
                    } 
                  ?>
                </div>              
              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>
