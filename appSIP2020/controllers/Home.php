<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$data['banners'] = $this->m_crud->get_list_one_where('banner','banner_status','aktif','banner_id','DESC');

		$data['kreasi'] = $this->m_crud->get_list_one_where_limit('kip_stories','published','1','id','DESC','6');

		$data['inspirasi_first'] = $this->m_crud->get_list_one_where_limit('articles','published','1','date_published','DESC','1');

		$data['inspirasi_second'] = $this->m_crud->get_all_limit_and_offset('articles','published','1','date_published','DESC','4','1');

		$data['promosi'] = $this->m_crud->get_list_two_where_limit('promosi','promosi_status','1','promosi_page','umum','promosi_id','ASC','6');

		$data['tentangheader'] = $this->m_crud->get_list_two_where_limit('about','about_status','1','about_privillige','header','about_id','ASC','1');

		$this->load->view('include/header',$data);
		$this->load->view('beranda');
		$this->load->view('include/footer');
	}


}
