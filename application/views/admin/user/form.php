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
                <?php echo form_item('user_name','text','required',$record);?>
                <?php echo form_item('user_email','email','required',$record);?>
                <?php echo form_item('user_phone','text','',$record);?>
                <?php

                  if($this->user_role == 1){
                    $options = array(
                      'Sub Admin' => '2',
                    );
                  }

                  else if($this->user_role == 3){
                    $options = array(
                      'Moderator' => '4',
                    );
                  }

                ?>
                <?php echo form_item('user_role','option','required',$record,$options);?>
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



<script type="text/javascript">


  $(document).ready(function(){
    uri_segment = "<?php echo $this->uri->segment(4);?>";
    default_value = '';
    if(uri_segment == 'edit'){
      default_value = $('#user_email').val();
    }
    check_slug($('#user_email').val());
  });
  
  $('#user_email').on('change',function(){
    var value = $(this).val().replace(/ /g,"-").toLowerCase();
    $(this).val(value);    
    check_slug(value);
  });

  function check_slug(str){
    if(str != default_value){
      $.ajax({
        type:'get',
        url: '<?php echo base_url('admin/user/check_unique/');?>'+str,
        success: function(response){
          if(response == 'false'){
            $('button[type=submit]').attr('disabled','disabled');
            $('button[type=submit]').data('toggle','tooltip');
            $('button[type=submit]').attr('title','Email already exists.');
            $('button[type=submit]').tooltip('show');
            $('#user_email').parent('.form-group').removeClass('has-success');
            $('#user_email').parent('.form-group').addClass('has-error');
          }else if(response == 'true'){
            $('button[type=submit]').tooltip('destroy');
            $('button[type=submit]').removeAttr('disabled');
            $('#user_email').parent('.form-group').removeClass('has-error');
            $('#user_email').parent('.form-group').addClass('has-success');
          }
        }
      });
    }
  }
</script>