<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends Admin_Controller {

	function __construct() {
        parent::__construct();		
    }

    public function index(){
    	if($_POST){
    		$file = fopen(ROOT_DIR.'sitemap.xml', 'w');
    		fwrite($file, $this->input->post('content'));
    		fclose($file);
			redirect('admin/sitemap');
    	}
    	else{
    		$content['main_content'] = 'file/sitemap';           
            $this->load->view('admin/inc/view',$content); 
    	}
    }

    public function create(){
    	$file = fopen(ROOT_DIR.'sitemap.xml', 'w');
		fwrite($file, '');
		fclose($file);
		redirect('admin/sitemap');
    }

    public function delete(){
    	unlink(ROOT_DIR.'sitemap.xml');
		redirect('admin/sitemap');
    }
    
    public function generate(){
        $lastmod = date("Y-m-d\Th:m:s+00:00");
        $sitemap = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        $sitemap .= "<url>\n\t<loc>".base_url()."</loc>\n\t<lastmod>".$lastmod."</lastmod>\n\t<changefreq>daily</changefreq>\n\t<priority>1.0000</priority>\n</url>";
        $sitemap .= "\n<url>\n\t<loc>".base_url('categories')."</loc>\n\t<lastmod>".$lastmod."</lastmod>\n\t<changefreq>daily</changefreq>\n\t<priority>0.8000</priority>\n</url>";

        $data['select'] = 'blog_slug';
        $data['table'] = 'blog';
        $data['output_type'] = 'result'; 
        $data['order_by'] = 'ASC'; 
        $data['order_by_col'] = 'blog_title';
        $stores  = $this->general->get($data);     
        
        foreach($stores as $store){
        $sitemap .= "\n<url>\n\t<loc>".base_url($store->store_slug)."</loc>\n\t<lastmod>".$lastmod."</lastmod>\n\t<changefreq>daily</changefreq>\n\t<priority>0.8000</priority>\n</url>";
        }
        
        echo $sitemap;
    }
}



