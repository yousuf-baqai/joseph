<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_generator extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }  
    public function index(){   


        $feilds_string = '';
        $form_feilds = '';
        $listvisible = 'array(';
        $viewhiddenfields = 'array(';
        $image_string = 'array(';
        $multi_image_string = 'array(';  


        $field_visibility = array();

        if($_POST){    

            $table_prefix = 'class_name_';
            $sql = "CREATE TABLE `{table_name}` (
`{table_name}_id` INT NOT NULL AUTO_INCREMENT ,
`{table_name}_sort_order` INT NULL DEFAULT NULL ,";


            $fields = array();
            $i = 0;
            foreach($_POST['field_name'] as $feild_name){
                $fields[] = array(
                    'field_name' => $feild_name,
                    'field_type' => $_POST['field_type'][$i],
                    'field_required' => $_POST['field_required'][$i],
                );

                $feilds_string .= "\t\t\t\t'$feild_name' => \$this->input->post('$feild_name',TRUE),\n";

                if($_POST['field_type'][$i] == 'image'){
                    $image_string .= "'$feild_name',";
                }

                if($_POST['field_type'][$i] == 'multi_image'){
                    $multi_image_string .= "'$feild_name',";
                }


                if($_POST['field_visibility'][$i] != 'hidden'){
                    $field_visibility = explode("-",$_POST['field_visibility'][$i]);
                }


                if(in_array('form', $field_visibility)){
                    $reqiured = $_POST['field_required'][$i];
                    $form_feilds .= "\t\t\t\t\t\t\t\t\t\t <?php echo form_item('$feild_name','".$_POST['field_type'][$i]."','$reqiured',\$record)?>\n";
                }
                if(in_array('list', $field_visibility)){
                    $listvisible .= "'$feild_name',";
                }

                if(!in_array('view', $field_visibility)){
                    $viewhiddenfields .= "'$feild_name',";
                }

                if($_POST['field_type'][$i] == 'textarea' || $_POST['field_type'][$i] == 'textarea_editor'){
                    $sql .= "\n`$feild_name` TEXT NULL DEFAULT NULL ,";
                }
                else{
                    $sql .= "\n`$feild_name` VARCHAR(300) NULL DEFAULT NULL ,";
                }

                $i++;
            }

            $image_string .= ');';
            $multi_image_string .= ');';
            $listvisible .= ');';
            $viewhiddenfields .= ');';

            $class_data = array(
                'class_name' => ucfirst($this->input->post('class_name',TRUE)),
                'orderable' => ucfirst($this->input->post('orderable',TRUE)),
            );

            $file_data = file_get_contents(ROOT_DIR.'application/controllers/Admin/Crud_template.php');

            $file_data = str_replace('{Class_name}', $class_data['class_name'], $file_data);
            $file_data = str_replace('{fields}', $feilds_string, $file_data);
            $file_data = str_replace('{orderable}', strtolower($class_data['orderable']), $file_data);
            $file_data = str_replace('{listvisible}', $listvisible, $file_data);
            $file_data = str_replace('{viewhiddenfields}', $viewhiddenfields, $file_data);
            $file_data = str_replace('{imagefields}', $image_string, $file_data);
            $file_data = str_replace('{multi_image_fields}', $multi_image_string, $file_data);

            // folder copy
            $file = fopen(ROOT_DIR.'application/controllers/Admin/'.$class_data['class_name'].'.php','w');           
            fwrite($file,$file_data);
            fclose($file);

            $this->full_copy(ROOT_DIR.'application/views/admin/crud_template', ROOT_DIR.'application/views/admin/'.strtolower($class_data['class_name']));


            //form.php
            $file_data = file_get_contents(ROOT_DIR.'application/views/admin/'.strtolower($class_data['class_name']).'/form.php'); 
            $file_data = str_replace('{form_fields}', $form_feilds, $file_data);


            $file = fopen(ROOT_DIR.'application/views/admin/'.strtolower($class_data['class_name']).'/form.php','w');
            fwrite($file,$file_data);
            fclose($file);  


            //Admin Controller
            $file_data = file_get_contents(ROOT_DIR.'application/core/Admin_Controller.php'); 
            
            $new_nav_item = "\t\t\t\t\t\t'".strtolower($class_data['class_name'])."' => '".ucwords(str_replace('_', ' ', $class_data['class_name']))."',\n//DONTREMOVETHISCOMMENT//";

            $file_data = str_replace('//DONTREMOVETHISCOMMENT//', $new_nav_item, $file_data);


            $file = fopen(ROOT_DIR.'application/core/Admin_Controller.php','w');
            fwrite($file,$file_data);
            fclose($file);  


            $sql .="`{table_name}_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`{table_name}_updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`{table_name}_created_by` INT NULL DEFAULT NULL , 
`{table_name}_status` ENUM('enable','disable') NOT NULL DEFAULT 'enable' ,
PRIMARY KEY (`{table_name}_id`));
            ";

            $sql = str_replace('{table_name}',strtolower($class_data['class_name']) , $sql);

            $tables = $this->db->list_tables();

            if(!in_array(strtolower($class_data['class_name']), $tables)){
                $this->db->query($sql);
            }
        }




        $content['main_content'] = $this->uri->segment(2).'/form';           
        $this->load->view('admin/inc/view',$content);   
    } 

    public function full_copy( $source, $target ) {
        if ( is_dir( $source ) ) {
            @mkdir( $target );
            $d = dir( $source );
            while ( FALSE !== ( $entry = $d->read() ) ) {
                if ( $entry == '.' || $entry == '..' ) {
                    continue;
                }
                $Entry = $source . '/' . $entry; 
                if ( is_dir( $Entry ) ) {
                    full_copy( $Entry, $target . '/' . $entry );
                    continue;
                }
                copy( $Entry, $target . '/' . $entry );
            }

            $d->close();
        }else {
            copy( $source, $target );
        }
    }
}


