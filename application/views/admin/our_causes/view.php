<?php
 $hidden_fields = !empty($hidden_fields)?$hidden_fields:array();
 $image_fields = !empty($image_fields)?$image_fields:array();
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
            <h3 class="box-title"><?php echo ucwords($this->uri->segment(3)).' Data';?></h3>
          </div>     
          <div class="col-md-12">
              <div class="box-body box-body-view">


                <small class="text-success"><i class="fa fa-calendar"></i> Created on: <?php  
                $created_at = $this->uri->segment(2).'_created_at';
                $db = $record->$created_at;
                $timestamp = strtotime($db);
                echo date("F j, Y, g:i a",$timestamp);?></small> <br>

                <small class="text-info"><i class="fa fa-calendar"></i> Updated on: <?php  
                $update_at = $this->uri->segment(2).'_updated_at';
                $db2 = $record->$update_at;
                $timestamp2 = strtotime($db2);
                echo date("F j, Y, g:i a",$timestamp2);?></small> 

                <?php if(!empty($record)):foreach($record as $record_key => $record_val):?>
                  <?php if(!empty($record_val)):?>
                    <?php if(!in_array($record_key, $hidden_fields) && $record_key != $this->uri->segment(2).'_status' && $record_key != $this->uri->segment(2).'_id' && $record_key != $created_at && $record_key != $update_at):?>
                    <div class="form-group clearfix">
                        <span class="col-md-2 view_label"><?php echo ucwords(str_replace('_', ' ', str_replace($this->uri->segment(2), '', $record_key)));?></span>
                        <?php if(in_array($record_key, $image_fields)):?>
                        <span class="col-md-10 view_details"><img height="100" src="<?php echo !empty($record_val)?base_url('uploads/').$this->uri->segment(2).'/'.$record_val:base_url('assets/admin/img/placeholder.png')?>"></span>
                        <?php else:?>
                        <span class="col-md-10 view_details"><?php echo !empty($record_val)?$record_val:'';?></span>
                        <?php endif;?>
                    </div>                      
                    <?php endif;?>
                  <?php endif;?> 
                <?php endforeach;endif;?>
             
              </div>      
          </div>
        </div>   
      </div>
    </div>
  </section>
</div>