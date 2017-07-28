<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller
{
    function users_get()
    {
        $this->load->model('user_model');
        $users = $this->user_model->get_all();
         
        if($users)
        {
            $this->response($users, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    function user_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $this->load->model('user_model');
        $user = $this->user_model->get( $this->get('id') );
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    function user_post()
    {
        $this->load->model('user_model');
        $result = $this->user_model->update( $this->post('id'), array(
            'name' => $this->post('name'),
            'email' => $this->post('email')
        ));
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
         
    }
     
    function user_put()
    {
        $this->load->model('user_model');
        $result = $this->user_model->create( array(
            'name' => $this->put('name'),
            'email' => $this->put('email')
        ));
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
         
    }
     
    function user_delete()
    {
        $this->load->model('user_model');
        $result = $this->user_model->delete($this->get('id'));
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
         
    }
}
?>