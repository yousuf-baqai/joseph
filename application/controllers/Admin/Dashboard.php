<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{
	
	public function index()
	{	
		$content['main_content'] = 'dashboard/dashboard';		
		$content['title'] = 'Dashboard';
		$this->load->view('admin/inc/view',$content);
	}
	
	
	public function test(){
	    $data = array();
	    $data['select'] = "offer.*, store.store_name,store.store_logo";
	    $data['table'] = 'offer';
	    $data['join'] = 'store.store_id = offer.store_id';
        $data['join_table'] = 'store';
        $data['join_type'] = 'LEFT';    			    
        $data['limit'] = '5';    			    
        $data['order_by'] = 'DESC';			    
        $data['order_by_col'] = 'offer_views';
	    $record = $this->general->get($data);
	    
	    echo "<pre>";
	    
	    print_r( $record);
	}



	
}
