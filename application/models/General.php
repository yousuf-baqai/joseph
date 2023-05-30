<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Model {

	public function get($data)
	{		
		if(isset($data['select']) && !empty($data['select'])){
			$this->db->select($data['select']);
		}
		if(isset($data['select_max']) && !empty($data['select_max'])){
			$this->db->select_max($data['select_max']);
		}
		if(isset($data['select_min']) && !empty($data['select_min'])){
			$this->db->select_min($data['select_min']);
		}
		
		if(isset($data['select_avg']) && !empty($data['select_avg'])){
			$this->db->select_avg($data['select_avg']);
		}
		if(isset($data['select_sum']) && !empty($data['select_sum'])){
			$this->db->select_sum($data['select_sum']);
		}
		if(!empty($data['join_array']) && is_array($data['join_array'])){
	      foreach($data['join_array'] as $record){
	        $this->db->join($record['join_table'],$record['join'],$record['join_type']);
	        $this->db->where($record['join_table'].'_status','enable');
	      }
	    }
		if(!empty($data['join'])){   			
      		$this->db->join($data['join_table'],$data['join'],$data['join_type']);			
		}
		if(isset($data['where']) && !empty($data['where'])){
			$this->db->where($data['where']);
		}
		
		if(isset($data['where_in_array']) && !empty($data['where_in_field'])){
			$this->db->where_in($data['where_in_field'], $data['where_in_array']);
		}	
		
		
		if(isset($data['or_where']) && !empty($data['or_where'])){
			$this->db->or_where($data['or_where']);
		}
		if(isset($data['or_where_in']) && !empty($data['or_where_in'])){
			$this->db->or_where_in($data['or_where_in']);
		}		
		if(isset($data['where_not_in']) && !empty($data['where_not_in'])){
			$this->db->where_not_in($data['where_not_in']);
		}		
		if(isset($data['like']) && !empty($data['like'])){
			$this->db->like($data['like']);
		}		
		if(isset($data['like_col']) && !empty($data['like_col'])){
			$this->db->like_col($data['like_col']);
		}		
		if(isset($data['or_like']) && !empty($data['or_like'])){
			$this->db->or_like($data['or_like']);
		}		
		if(isset($data['not_like']) && !empty($data['not_like'])){
			$this->db->not_like($data['not_like']);
		}		
		if(isset($data['or_not_like']) && !empty($data['or_not_like'])){
			$this->db->or_not_like($data['or_not_like']);
		}
		if(isset($data['group_by']) && !empty($data['group_by'])){
			$this->db->group_by($data['group_by']);
		}		
		if(isset($data['distinct']) && !empty($data['distinct'])){
			$this->db->distinct($data['distinct']);
		}		
		if(isset($data['having']) && !empty($data['having'])){
			$this->db->having($data['having']);
		}
		if(isset($data['order_by_col']) && !empty($data['order_by_col'])){
			$this->db->order_by($data['order_by_col'],!empty($data['order_by'])?$data['order_by']:'ASC');
		}
		if(isset($data['having']) && !empty($data['having'])){
			$this->db->having($data['having']);
		}
		if(isset($data['limit']) && !empty($data['limit'])){
			if(!empty($data['offset'])){
			    $this->db->limit($data['limit'],$data['offset']);
			}
			else{
			    $this->db->limit($data['limit']);
			}
		}
		if(isset($data['count_all']) && !empty($data['count_all'])){
			$this->db->count_all($data['count_all']);
		}
		
		$this->db->where($data['table'].'_status','enable');
		$query = $this->db->get($data['table']);	
		
		if(isset($data['output_type']) && $data['output_type'] == 'row'){
			$result = $query->row();
		}
		elseif(isset($data['output_type']) && $data['output_type'] == 'result'){
			$result = $query->result();
		}
		else{
			$result = $query->result_array();
		}		
		
		return $result; 
	}	
	
	public function get_single_field($tabel="",$where="",$field="")		
	{
		$this->db->select('*');
		$this->db->from($tabel);	
		if(!$where){
			$where = $tabel.'_id > 0';
		}	
		$this->db->where($where);	
		$this->db->where($tabel.'_status','enable');
		$query = $this->db->get();
		$result = $query->row();
		if($result)
		{
			$output = $result->$field;			
			return $output;  
		}else{
			return;
		}  
	}

    public function insert($data,$content)
	{				     
	
		$result = $this->db->insert($data['table'],$content);			
		return $this->db->insert_id();
    
	}	
	
  public function insert_batch($data,$content)
	{				     
		$result = $this->db->insert_batch($data['table'],$content);			
		return $result; 
	}	
	     
  public function update($data,$content)
	{				     
		if(isset($data['where']) && !empty($data['where'])){
			$this->db->where($data['where']);
		}
		$this->db->where($data['table'].'_status','enable');
		$result = $this->db->update($data['table'],$content);			
		return $result; 
	}	 


	public function get_list($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="",$group_by="")
	{
		$this->db->select('*');
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status','enable');		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($order_by){
			$this->db->order_by($order_col, $order_by);
		}	
		if($like){
			$this->db->like($order_col,$like);
		}	
		if($group_by){
			$this->db->group_by($group_by);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}	
	
	
	public function search($data){
	    
	    $this->db->select('store.*,offer.*, datediff(offer.offer_expiry_date, now()) as offer_expiry_date_days_left')->from('store')
                ->group_start()
                        ->like(array('offer.offer_title' => $data['query']))
                        ->or_like(array('store.store_name' => $data['query']))
                ->group_end()
                ->where(array('store.store_status' => 'enable','offer.offer_status' => 'enable'))
                ->join('offer','offer.store_id = store.store_id','LEFT');
        
	    if(!empty($data['cat'])){
	        $this->db->where('store.category_id',$data['cat']);
            $this->db->join('category','store.category_id = category.category_id','LEFT');
	    }	     
	    
	    if(!empty($data['limit'])){
	        $this->db->limit($data['limit']);
	    }
     
        $query = $this->db->get();
		$result = $query->result();
		$result = $query->result_array();
		return $result; 	
	    
	}
  
  
	public function search_store($data){
	    $this->db->select('store.*')->from('store')
                ->group_start()
                        ->or_like(array('store.store_name' => $data['query']))
                ->group_end()
                ->where(array('store.store_status' => 'enable'));
                
	    if(!empty($data['limit'])){
	        $this->db->limit($data['limit']);
	    }                

        $query = $this->db->get();
		$result = $query->result();
		$result = $query->result_array();
		return $result; 	
	}  
  
}


