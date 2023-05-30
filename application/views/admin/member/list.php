<?php
 $show_fields = !empty($show_fields)?$show_fields:array();
 $image_fields = !empty($image_fields)?$image_fields:array(); 
 $record_id = $this->uri->segment(2).'_id';
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

            <?php if(!empty($records)):?>
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped" data-add-url="<?php echo base_url('admin/').$this->uri->segment(2).'/form/add';?>">
                <thead>
                <tr>
                  <th>S.No</th>
                  <?php if(!empty($records[0])):foreach($records[0] as $record_th_key => $record_th_val):?>
                    <?php if(in_array($record_th_key, $show_fields) && $record_th_key != $this->uri->segment(2).'_status' && $record_th_key != $this->uri->segment(2).'_id' && $record_th_key != $this->uri->segment(2).'_created_at' && $record_th_key != $this->uri->segment(2).'_updated_at'):?>
                      <th><?php echo ucwords(str_replace('_', ' ', str_replace($this->uri->segment(2), '', $record_th_key)));?></th>
                    <?php endif;?>
                  <?php endforeach;endif;?>
                  <th style="text-align: left;"><input type="checkbox" name="checkbox_all" class="checkbox_all" value="1"> Select All <a href="#" class="delete_all_btn"><span class="delete_icon"><i class="icon-trash" aria-hidden="true"></i></span></a></th>
                </tr>
                </thead>
                <tbody>            
                <?php $i=1; if(empty($records)):?>    
                <tr>
                  <td>No Record Found</td>
                </tr>
                <?php endif;?>
                </tbody>
              </table>
            </div>
            <?php else:?>
            <div class="box-body no-records">  
              <p class="">No record found</p>
              <a class="dt-button btn btn-success" href="<?php echo base_url('admin/').$this->uri->segment(2).'/form/add';?>" tabindex="0" aria-controls="datatable" type="button"><span><i class="icon-plus"></i> Add New</span></a>
            </div>
            <?php endif;?>
         </div>   
      </div>
    </div>
  </section>
</div>