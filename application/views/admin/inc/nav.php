 <aside class="main-sidebar">
  <section class="sidebar">
    <!--div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo !empty($this->session->userdata('user_image'))?base_url('uploads/admin/').$this->session->userdata('user_image'):base_url('admin/assets/admin/img/placeholder.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo !empty($this->session->userdata('user_name'))?$this->session->userdata('user_name'):'Name';?></p>
      </div>
    </div-->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <?php foreach($this->user_roles[$this->user_role] as $module_slug => $module):if(!empty($module['name'])): ?>
      <li class="<?php echo !empty($module['sub_modules'])?'treeview':''; ?>">
        <a href="<?php echo base_url('admin/'.$module_slug);?>">
          <i class="<?php echo !empty($module['icon'])?$module['icon']:'';?>"></i> <span><?= $module['name']; ?></span>
          <?php if(!empty($module['sub_modules'])):?>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
          <?php endif;?>
          <?php if(!empty($module['sub_modules'])):?>
          <ul class="treeview-menu">
          <?php foreach($module['sub_modules'] as $sub_module_slug => $sub_module_name):?>
          <li><a href="<?php echo base_url('admin/'.$sub_module_slug);?>"><span><?= $sub_module_name; ?></span></a></li>
          <?php endforeach;?>
          </ul>
          <?php endif;?>
        </a>
      </li>
     <?php endif;endforeach; ?> 
    </ul>
  </section>
</aside>
<?php if(isset($output)):?>
  <div class="content-wrapper">    
    <?php echo $output;?>
  </div>
<?php endif;?>




