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
                <?php echo form_item('seo_page_name','text','required',$record);?>
                <?php echo form_item('seo_page_link','text','required',$record);?>
                <?php echo form_item('seo_page_title','text','',$record);?>
                <?php echo form_item('seo_meta_title','text','',$record);?>
                <?php echo form_item('seo_meta_description','textarea','',$record);?>
                <?php echo form_item('seo_meta_keyword','textarea','',$record);?>
                <?php echo form_item('seo_meta_canonical','text','',$record);?>
                <?php $options = array(
                  'noindex, nofollow' => 'noindex, nofollow',
                  'index, nofollow' => 'index, nofollow',
                  'noindex, follow' => 'noindex, follow',
                  'index, follow' => 'index, follow',
                );?>
                <?php echo form_item('seo_meta_index','option','required',$record,$options);?>
                <?php echo form_item('seo_head_script','textarea','',$record);?>
                <?php echo form_item('seo_footer_script','textarea','',$record);?>
                
                
                
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


