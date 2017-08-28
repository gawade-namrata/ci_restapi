<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_client extends CI_Controller {

	public function index()
	{
		$data=array();
                
                $this->load->model('api_connect_model');
                
                $data['get_all']=$this->api_connect_model->get_all();
                
                $data['get_user']=$this->api_connect_model->get_user(5);
                
                $data['post_user']=$this->api_connect_model->post_user(array('id'=>6,'name'=>'ww'));
                
                $data['put_user']=$this->api_connect_model->put_user(array('name'=>'pp','email'=>'qq'));
                
                $data['delete_user']=$this->api_connect_model->delete_user(20);
            
                $this->load->view('rest_client',$data);
	}
}
