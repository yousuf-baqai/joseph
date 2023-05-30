<?php 
  $action = base_url('admin/').$this->uri->segment(2).'/form/'.$this->uri->segment(4);
  if($this->uri->segment(4) == 'duplicate' || $this->uri->segment(4) == 'edit'){
    $action .= '/'.$this->uri->segment(5);
  }
?>

<style type="text/css">
  .field-row{
    position: relative;
  }
  button.delete-row {
      position: absolute;
      right: 15px;
      background: red;
      color: #fff;
      font-weight: 700;
      border: none;
  }
</style>

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
            <h3 class="box-title">Add Data</h3>
          </div>     
          <div class="col-md-12">
            <form role="form" action="<?php echo current_url();?>" method="post" enctype="multipart/form-data">       
              <div class="box-body box-body2">
                <div class="row">
                  <div class="col-sm-8">
                    <?php echo form_item('class_name','text','required','','','');?>
                  </div>
                  <div class="col-sm-4">
                    <?php

                      $fields = array(
                        'Yes' => 'true',
                        'No' => 'false',
                      );

                    ?>
                    <?php echo form_item('orderable','option','required','',$fields);?>
                  </div>
                  <div class="col-sm-4">

                  </div>
                </div>  
                <hr>        
                <div class="row field-row">
                  <div class="col-sm-3">
                    <?php echo form_item('field_name[]','text','required','','','Field Name <small class="text-danger">( Required )</small>');?>
                  </div>
                  <div class="col-sm-3">
                    <?php

                      $fields = array(
                        'Text' => 'text',
                        'Number' => 'number',
                        'Email' => 'email',
                        'Textarea' => 'textarea',
                        'Textarea Editor' => 'textarea_editor',
                        'Image' => 'image',
                        'Multi Image' => 'multi_image',
                        'Option' => 'option'
                      );

                    ?>
                    <?php echo form_item('field_type[]','option','required','',$fields,'Field Type <small class="text-danger">( Required )</small>');?>
                  </div>
                  <div class="col-sm-3">
                    <?php echo form_item('field_required[]','option','required','',array('Not required' => 'not-required','Required' => 'required'),'Field Required <small class="text-danger">( Required )</small>');?>
                  </div>
                  <div class="col-sm-3">
                    <?php

                      $fields = array(
                        'Hidden' => 'hidden',
                        'List only' => 'view',
                        'Form only' => 'form',
                        'View only' => 'view',
                        'List & View only' => 'list-view',
                        'List & Form only' => 'list-form',
                        'Form & View only' => 'form-view',
                        'All' => 'list-view-form'
                      );

                    ?>
                    <?php echo form_item('field_visibility[]','option','required','',$fields,'Field Visibility <small class="text-danger">( Required )</small>');?>
                  </div>
                  <button type="button" class="delete-row">Delete</button>
                </div> 

              </div>
              <div class="box-footer">
                
                <button type="submit" class="btn btn-success"><?php echo ($this->uri->segment(4) == 'edit')?'<i class="icon-check"></i> Update Data':'<i class="icon-check"></i> Insert Data';?></button>&nbsp;
                <button type="button" class="btn btn-primary add-row"><i class="icon-plus"></i> Add Row</button>

                 


              </div>  
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                    <?php echo form_item('field_names','textarea','','','','Generate Fields from line breaks');?>
                    <button type="button" class="btn btn-primary generate-rows"><i class="icon-plus"></i> Generate</button>
                  </div>
                </div>  
              </div>  
            </form>        
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>


<script type="text/javascript">
  $('.add-row').on('click',function(){
    var html = '<div class="row field-row"> <div class="col-sm-3"> <div class="form-group"> <label>Field Name <small class="text-danger">( Required )</small></label> <input type="text" class="form-control" id="field_name[]" name="field_name[]" data-validation="required" value=""> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Type <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_type[]" name="field_type[]" data-validation="required"><option value="">Select: Field Type ( Required )</option><option value="text">Text</option><option value="number">Number</option><option value="email">Email</option><option value="textarea">Textarea</option><option value="textarea_editor">Textarea Editor</option><option value="image">Image</option><option value="multi_image">Multi Image</option><option value="option">Option</option></select> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Required <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_required[]" name="field_required[]" data-validation="required"><option value="">Select: Field Required ( Required )</option><option value="not-required">Not required</option><option value="required">Required</option></select> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Visibility <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_visibility[]" name="field_visibility[]" data-validation="required"><option value="">Select: Field Visibility ( Required )</option><option value="hidden">Hidden</option><option value="view">List only</option><option value="form">Form only</option><option value="view">View only</option><option value="list-view">List &amp; View only</option><option value="list-form">List &amp; Form only</option><option value="form-view">Form &amp; View only</option><option value="list-view-form">All</option></select> </div> </div> <button type="button" class="delete-row">Delete</button></div>';

    $('.box-body2').append(html);

    $.validate({
      lang: 'en'
    });
  });


  $('.generate-rows').on('click',function(){
    var field_names = $('#field_names').val().split("\n");

    if(field_names != '' && field_names.length != 0){
      for(i = 0; i< field_names.length; i++){
        console.log(field_names[i]);

        if(field_names[i] != '' && field_names[i].length != 0){
          var html = '<div class="row field-row"> <div class="col-sm-3"> <div class="form-group"> <label>Field Name <small class="text-danger">( Required )</small></label> <input type="text" class="form-control" id="field_name[]" name="field_name[]" data-validation="required" value="'+field_names[i]+'"> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Type <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_type[]" name="field_type[]" data-validation="required"><option value="">Select: Field Type ( Required )</option><option value="text" selected>Text</option><option value="number">Number</option><option value="email">Email</option><option value="textarea">Textarea</option><option value="textarea_editor">Textarea Editor</option><option value="image">Image</option><option value="multi_image">Multi Image</option><option value="option">Option</option></select> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Required <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_required[]" name="field_required[]" data-validation="required"><option value="">Select: Field Required ( Required )</option><option value="not-required" selected>Not required</option><option value="required">Required</option></select> </div> </div> <div class="col-sm-3"> <div class="form-group"> <label>Field Visibility <small class="text-danger">( Required )</small></label> <select class="form-control" id="field_visibility[]" name="field_visibility[]" data-validation="required"><option value="">Select: Field Visibility ( Required )</option><option value="hidden">Hidden</option><option value="view">List only</option><option value="form">Form only</option><option value="view">View only</option><option value="list-view">List &amp; View only</option><option value="list-form">List &amp; Form only</option><option value="form-view">Form &amp; View only</option><option value="list-view-form" selected>All</option></select> </div> </div> <button type="button" class="delete-row">Delete</button></div>';

          $('.box-body2').append(html);
        }

      }
    }


  });

  $('body').on('click','.delete-row',function(){
    $(this).parents('.field-row').remove();
  });

</script>
