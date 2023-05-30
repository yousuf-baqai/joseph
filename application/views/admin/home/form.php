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
										 <?php echo form_item('home_page_section_one_background_image','image','required',$record)?>
										 <?php echo form_item('home_page_section_one_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_spam','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_heading_','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_paragraph','textarea','required',$record)?>
										 <?php echo form_item('home_page_section_one_button','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_button_link','text','not-required',$record)?>
                     <?php echo form_item('home_page_section_one_more_details','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_more_details_link','text','not-required',$record)?>
										 <?php echo form_item('home_page_section_one_main_image','image','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_one_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_one_sub_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_one_spam','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_two_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_two_sub_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_two_spam','text','required',$record)?>
										 <?php echo form_item('home_page_section_one_card_three_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_two_heading_one','text','required',$record)?>
										 <?php echo form_item('home_page_section_two_heading_two','text','required',$record)?>
										 <?php echo form_item('home_page_section_three_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_three_pragraph','textarea','required',$record)?>
										 <?php echo form_item('home_page_section_four_heading','text','required',$record)?>
										 <?php echo form_item('home_page_section_four_paragraph','textarea','required',$record)?>
                
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


