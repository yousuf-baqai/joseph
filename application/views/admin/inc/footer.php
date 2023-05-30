<div id="gallery" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Gallery</h4>
      </div>
      <div class="modal-body">

<?php
function dirToArray($dir) {
  
   $result = array();

   $cdir = scandir($dir);
   $d = 1;
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[filemtime($dir . DIRECTORY_SEPARATOR . $value)][] = $value;
         }
      }
   }
  
   return $result;
}


$uploads = dirToArray('./uploads');
?>     
    <?php $image_html = '';?>
    <div class="row">      
      <div class="col-sm-12">
        <div class="folder-cont">
          <div class="folder" data-folder-id="*"> 
            <p><i class="icon-picture"></i> All Images</p> 
          </div>

          <?php $i = 0;foreach($uploads as $folder_name => $images):?>
          <div class="folder" data-folder-id="<?php echo $i;?>" data-folder-name="<?php echo $folder_name;?>">
            <p><i class="icon-folder"></i> <?php echo $folder_name;?></p>
          </div>
          <?php $i++;endforeach;?>    
          </div>  

          <div class="sort">
            <span class="upload-gallery-btn"  data-toggle="modal" data-target="#upload-gallery"><span class="fa fa-upload"></span> <small> Upload More</small></span>
            <span class="fa fa-th-large active"></span>
            <span class="fa fa-th"></span>
          </div>

        </div>      
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="image-container">
            <?php echo $image_html;?>
          </div>
        </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="upload-gallery" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <h4 class="modal-title">Gallery</h4>
      </div>
      
      <form action="<?php echo base_url('admin/gallery/form');?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="image-container">             
                    <input type="hidden" name="folder" id="folder_path">
                    <input type="hidden" name="return_url" value="<?php echo current_url();?>">
                    <?php $record;$record->gallery_images = '[]'; echo form_item('gallery_images','multi_image','required',$record);?>
              </div>
            </div>
          </div>
    
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Upload</button>
          </div>
      
      </form>
    </div>

  </div>
</div>




<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; <?php echo date('Y');?> <a href="javascript:;"><?php echo $this->site_title;?></a>.</strong> All rights
	reserved.
  
</footer>


<?php if($this->uri->segment(4) == 'add'):?>
<script type="text/javascript">
  $('form .box-footer').append('&nbsp;<button type="submit" class="btn btn-primary btn-insert-list"><i class="icon-check"></i> Insert Data &amp; Go back to list</button>');
  $('body').on('click','.btn-insert-list',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    var action = '<?php echo current_url();?>';
    form.attr('action',action+'/back-to-list');
    form.submit();
  });
</script>
<?php endif;?>


<?php if(isset($this->orderable) && $this->orderable == TRUE):?>

<script type="text/javascript">
  $('tbody').sortable({
    axis: 'y',
    update: function (event, ui) {  
        
        var sortedIDs = $( "tbody" ).sortable( "toArray" );
        $.ajax({
          url: '<?php echo base_url('admin/'.$this->uri->segment(2).'/sort');?>',
          data: {sort_array:sortedIDs},
          type:'post',
          success: function(response){
            if(response == 'true'){
                alert_success("Order Updated Successfully.");
            } 
          }
        });
        
    }
  });
</script>
<?php endif;?>


<script>
  $.validate({
    lang: 'en'
  });
</script>
<script>	
$(document).ready(function (){
	$(".slug-field").on("keyup",function() {		
		var str = $(this).val();
		var slug_id = $(this).data('slug-id');
		str = str.trim().replace(/\s+/g, '-').toLowerCase();
		$(slug_id).val(str);
	});

	$('.edit_icon').tooltip('hide')
          .attr('data-original-title', 'Edit')
          .tooltip('fixTitle');	

	$('.view_icon').tooltip('hide')
          .attr('data-original-title', 'View')
          .tooltip('fixTitle');	    

	$('.duplicate_icon').tooltip('hide')
          .attr('data-original-title', 'Duplicate')
          .tooltip('fixTitle');	 

	$('.delete_icon').tooltip('hide')
          .attr('data-original-title', 'Delete')
          .tooltip('fixTitle');	           


	$('.option_icon').tooltip('hide')
          .attr('data-original-title', 'Products')
          .tooltip('fixTitle');

	
});
</script>

<script>
$('.folder').on('click',function(){
  var folder_path = $(this).data('folder-name');
  var folder_id = $(this).data('folder-id');

  $('.folder').removeClass('active');
  $(this).addClass('active'); 

  
  $.ajax({
    url:'<?php echo base_url('admin/gallery/fetch');?>',
    type: 'post',
    data: {folder_path:folder_path,folder_id:folder_id},
    success: function(response){
      $('#gallery  .image-container').html('');
      $('#gallery .image-container').html(response);


      $('#folder_path').val(folder_path);
      $('.sort').hide();

      if(folder_id == '*'){
        $('.upload-gallery-btn').hide();
        $('.sort').fadeIn();
        $('body').find('.folder-image').fadeIn().css('display','flex');
      }
      else{
        $('.upload-gallery-btn').show();  
        $('body').find('.folder-image').each(function(){
          if(folder_id == $(this).data('folder-id')){
            $('.sort').fadeIn();
            $(this).fadeIn().css('display','flex');
          }
        })
      }

    }
  });


});


$('.sort .fa-th-large').on('click',function(){
    $('.sort .fa').removeClass('active');
    $(this).addClass('active');
    $('.image-container').removeClass('more');
});


$('.sort .fa-th').on('click',function(){
    $('.sort .fa').removeClass('active');
    $(this).addClass('active');
    $('.image-container').addClass('more');
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});



function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  $('#gallery').modal('hide');
}

// const span = document.querySelectorAll(".folder-image p");

// span.onclick = function() {
//   document.execCommand("copy");
// }

// span.addEventListener("copy", function(event) {
//   event.preventDefault();
//   if (event.clipboardData) {
//     event.clipboardData.setData("text/plain", span.textContent);
//     console.log(event.clipboardData.getData("text"))
//   }
// });






var x = document.querySelectorAll(".folder-image p");
var i;
for (i = 0; i < x.length; i++) {
  // x[i].onclick = function() {
  //   document.execCommand("copy");
  // }

  // x[i].addEventListener("copy", function(event) {
  //   event.preventDefault();
  //   if (event.clipboardData) {
  //     event.clipboardData.setData("text/plain", x[i].textContent);
  //     console.log(event.clipboardData.getData("text"))
  //   }
  // });
}


$('.gallery-btn label').on('click',function(){
  $(this).siblings('input').addClass('active-galery-reciever');
});


$('#gallery').on('hidden.bs.modal', function () {
  $('input').removeClass('active-galery-reciever');
  $('input').removeClass('from-editor');
  $('input').removeAttr('data-id');
});


$('body').on('click','.folder-image img',function(){
    if($('#gallery').hasClass('from-editor')){
        var id = $('#gallery').attr('data-id');
        console.log(editors[id]);
        
        editors[id].selection.insertHTML('<img src="'+$(this).attr('src')+'">');
    }
    else{
        $('body').find('.active-galery-reciever').val($(this).attr('src'));
        $('body').find('.active-galery-reciever').parents('.gallery-btn').siblings('img').attr('src',$(this).attr('src'));
        $('#gallery').modal('hide');
    }
});


$(".image-upload :file").on('change',function(){
  $(this).parents('.file-btn').siblings('.gallery-btn').children('input').val('');
});


$('.checkbox_all').on('change',function(e){
  checkbox_select = [];
  $('.delete_all_btn').hide();
  $('body').find('input[type=checkbox]').not('.checkbox_all').removeAttr('disabled');
  val = $(this).prop('checked');
  if(val == true){
    $('.delete_all_btn').fadeIn();
    $('body').find('input[type=checkbox]').not('.checkbox_all').attr('disabled','disabled');
  }
  $('body').find('input[type=checkbox]').not('.checkbox_all').prop('checked',val);
});

var checkbox_select = [];

$('body').on('change','.checkbox_select',function(e){  
  checkbox_select = [];
  $('.checkbox_select:checkbox:checked').each(function () {
      checkbox_select.push($(this).val());
  });
  if(checkbox_select.length > 0){
    $('.delete_all_btn').fadeIn();
  }
  else{
    $('.delete_all_btn').hide();
  }
});


$('.delete_all_btn').on('click',function(e){
  e.preventDefault();
  if($('.checkbox_all').prop('checked') == true){
    var confirm = window.confirm('Are you sure you wanted to delete all? This action cannot be undone.');
    if(confirm){
      window.location.replace('<?php echo base_url('admin/'.$this->uri->segment(2).'/delete_all');?>');
    }

  }
  else{
    var confirm = window.confirm('Are you sure you wanted to delete all selected records? This action cannot be undone.');
    if(confirm){
      $.ajax({
        url: '<?php echo base_url('admin/'.$this->uri->segment(2).'/delete_all');?>',
        type: 'post',
        data: {ids: checkbox_select},
        success: function(response){
          if(response == 'success'){
            location.reload();
          }
        },
      });
    }
  }
});

</script>

<script>
 $('#our_causes_heading').on('keyup',function(){
var value = $(this).val();
var value = value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    
var value = value.replace(/^\s+|\s+$/gm,'');
 var value = value.replace(/\s+/g, '-'); 
$('#our_causes_slug').val(value);
  } );

 $('#recent_news_heading').on('keyup',function(){
var value = $(this).val();
var value = value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
    
var value = value.replace(/^\s+|\s+$/gm,'');
 var value = value.replace(/\s+/g, '-'); 
$('#recent_news_slug').val(value);
  } );

</script>