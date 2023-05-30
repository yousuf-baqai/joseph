<?php
 $show_fields = !empty($show_fields)?$show_fields:array();
 $image_fields = !empty($image_fields)?$image_fields:array(); 
 $record_id = $this->uri->segment(2).'_id';
?>
<style type="text/css">

	.placeholder {
		outline: 1px dashed #4183C4;
	}
	
	.mjs-nestedSortable-error {
		background: #fbe3e4;
		border-color: transparent;
	}
	
	#tree {
		width: 550px;
		margin: 0;
	}
	
    ol {
        max-width: 800px;
        padding-left: 30px;
    }
    	
	ol.sortable,ol.sortable ol {
		list-style-type: none;
	}
	
    .sortable li {
        border: 1px solid #d4d4d4;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 0px;
        cursor: move;
        border-color: #D4D4D4 #D4D4D4 #BCBCBC;
        margin: 10px 0px;
        padding: 0px;
	}
	
    .sortable li li {
        border: 1px dashed #d4d4d4;
            margin: 5px 5px;
	}
	
	
	
	.sortable li h4{margin: 0px;}
	
	
	.sortable li div {
        background: #ecececb8;
        padding: 5px;
    }
    
    .sortable li a {
        padding: 10px 5px;
    }
	
	li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
		border-color: #999;
	}
	
	.disclose, .expandEditor {
		cursor: pointer;
		width: 20px;
		display: none;
	}
	
	.sortable li.mjs-nestedSortable-collapsed > ol {
		display: none;
	}
	
	.sortable li.mjs-nestedSortable-branch > div > .disclose {
		display: inline-block;
	}
	
	.sortable span.ui-icon {
		display: inline-block;
		margin: 0;
		padding: 0;
	}
	
	.menuDiv {
		background: #EBEBEB;
	}
	
	.menuEdit {
		background: #FFF;
	}
	
	.itemTitle {
		vertical-align: middle;
		cursor: pointer;
	}
	
	.deleteMenu {
		float: right;
		cursor: pointer;
	}
	
	.notice {
		color: #c33;
	}

</style>

<link rel="stylesheet" href="https:////code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
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
            <div class="box-body">
                <div id="demo">
                    <?php    
                    
                    function prepareList(array $items, $pid = 0) {
                        $output = array();
                    
                        foreach ($items as $item) {
                            if ((int) $item['header_navbar_parent_id'] == $pid) {
                                if ($children = prepareList($items, $item['header_navbar_id'])) {
                                    $item['children'] = $children;
                                }
                                $output[] = $item;
                            }
                        }
                        return $output;
                    }
                    
                    function nav($menu_items, $child = false){
                        $output = '';
                    
                        if (count($menu_items)>0) {
                            $output .= ($child === false) ? '<ol class="sortable">' : '<ol>' ;
                            foreach ($menu_items as $item) {
                                $output .= '<li id="list_' . $item['header_navbar_id'] . '">';
                                $output .= '<div>' . $item['header_navbar_text'] . '<a href="'.base_url('admin/header_navbar/form/edit/').$item['header_navbar_id'].'"><span class="edit_icon" data-original-title="Edit"><i class="icon-pencil"></i></span></a></div>';
                                $output .= '<a href="'.$item['header_navbar_link'].'" taget="_blank">' . $item['header_navbar_link'] . '</a>';
                    
                                //check if there are any children
                                if (isset($item['children']) && count($item['children'])) {
                                    $output .= nav($item['children'], true);
                                }
                                $output .= '</li>';
                            }
                            $output .= '</ol>';
                        }
                        return $output;
                    }
                    
                    $tree = prepareList($records);
                    echo nav($tree); 
                    
                    ?>


                </div>
            </div>

			<div class="box-footer"> 
				<button type="button" href="#"  id="serialize" class="btn btn-success"><i class="icon-check"></i> Save Orders & Sorting</button>  
			</div>            
         </div>   
      </div>
    </div>
  </section>
</div>


<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/nestedSortable/');?>jquery.mjs.nestedSortable.js"></script>

	<script>
		$().ready(function(){
			var ns = $('ol.sortable').nestedSortable({
				forcePlaceholderSize: true,
				handle: 'div',
				helper:	'clone',
				items: 'li',
				opacity: .6,
				placeholder: 'placeholder',
				revert: 250,
				tabSize: 25,
				tolerance: 'pointer',
				toleranceElement: '> div',
				maxLevels: 2,
				isTree: true,
				expandOnHover: 700,
				startCollapsed: false,
				change: function(){
					console.log('Relocated item');
				}
			});
			
			$('.expandEditor').attr('title','Click to show/hide item editor');
			$('.disclose').attr('title','Click to show/hide children');
			$('.deleteMenu').attr('title', 'Click to delete item.');
		
			$('.disclose').on('click', function() {
				$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
				$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
			});
			
			$('.expandEditor, .itemTitle').click(function(){
				var id = $(this).attr('data-id');
				$('#menuEdit'+id).toggle();
				$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
			});
			
			$('.deleteMenu').click(function(){
				var id = $(this).attr('data-id');
				$('#menuItem_'+id).remove();
			});
				
			$('#serialize').click(function(){
			    var _this = $(this);
			    _this.html('<i class="fa fa-save"></i> Saving...');
	            _this.toggleClass('btn-success');
	            _this.toggleClass('btn-warning');
			    
				serialized = $('ol.sortable').nestedSortable('serialize');
				$.ajax({
				    url : '<?php echo base_url('admin/header_navbar/sort');?>',
				    data : serialized,
				    type: 'post',
				    success : function(response){
				        if(response == 'success'){
				            _this.html('<i class="fa fa-save"></i> Save Orders & Sorting');
				            _this.toggleClass('btn-success');
	                        _this.toggleClass('btn-warning');
				        }
				    }
				    
				});
				console.log(serialized);
			})
	
			$('#toHierarchy').click(function(e){
				hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});

				console.log(hiered);
				// hiered = dump(hiered);
				// (typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
				// $('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
			})
	
			$('#toArray').click(function(e){
				arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
				arraied = dump(arraied);
				(typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
				$('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;
			});
		});			
	
		function dump(arr,level) {
			var dumped_text = "";
			if(!level) level = 0;
	
			//The padding given at the beginning of the line.
			var level_padding = "";
			for(var j=0;j<level+1;j++) level_padding += "    ";
	
			if(typeof(arr) == 'object') { //Array/Hashes/Objects
				for(var item in arr) {
					var value = arr[item];
	
					if(typeof(value) == 'object') { //If it is an array,
						dumped_text += level_padding + "'" + item + "' ...\n";
						dumped_text += dump(value,level+1);
					} else {
						dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
					}
				}
			} else { //Strings/Chars/Numbers etc.
				dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
			}
			return dumped_text;
		}
	</script>