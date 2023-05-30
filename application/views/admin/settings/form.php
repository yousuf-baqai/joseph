<?php 
  $action = base_url('admin/').$this->uri->segment(2).'/form/'.$this->uri->segment(4);
  if($this->uri->segment(4) == 'duplicate' || $this->uri->segment(4) == 'edit'){
    $action .= '/'.$this->uri->segment(5);
  }
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo !empty($title)?$title:ucwords(str_replace('_', ' ', $this->uri->segment(2)));?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo ucwords($this->uri->segment(4)).' Data';?></h3>
          </div>     
          <div class="col-md-8">
            <form role="form" action="<?php echo strtolower($action);?>" method="post" enctype="multipart/form-data">       
              <div class="box-body">


                <?php if($this->user_role == 1):?>
                <?php echo form_item('settings_site_title','text','',$record);?>
                <?php echo form_item('settings_logo','image','',$record);?>
                <?php echo form_item('settings_email_to','text','',$record);?>
                <?php echo form_item('settings_favicon','image','',$record);?>
                <?php echo form_item('settings_sidebar_text','textarea_editor','',$record);?>   
                <?php else:?>

                <?php echo form_item('settings_site_title','text','',$record);?>
                <?php echo form_item('welcome_email_subject','text','',$record);?>   
                <?php echo form_item('settings_email','text','',$record);?>
                <?php echo form_item('settings_email_to','text','',$record);?>
                <?php echo form_item('settings_email_from','text','',$record);?>

                <?php endif;?>  

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


