<?php
class Api_connect_model extends CI_Model {

        private $username='admin';
        private $password='1234';
    
        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        public function get_all()
        {
                $ch= curl_init();
                curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:8012/ci_restapi/api/users');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//                curl_setopt($ch,CURLOPT_POST,1);
//                curl_setopt($ch,CURLOPT_PUT,1);
//                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
//                curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
//                curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
                $result=curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
        }
        
        public function get_user($id)
        {
                $ch= curl_init();
                curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:8012/ci_restapi/api/user/id/'.$id);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//                curl_setopt($ch,CURLOPT_POST,1);
//                curl_setopt($ch,CURLOPT_PUT,1);
//                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
//                curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
//                curl_setopt($curl_handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
                $result=curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
        }
        
        public function post_user($arr)
        {
                $ch= curl_init();
                curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:8012/ci_restapi/api/user');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch,CURLOPT_POST,1);
//                curl_setopt($ch,CURLOPT_PUT,1);
//                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
                curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
//                curl_setopt($curl_handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
                $result=curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
        }
        
        public function put_user($arr)
        {
                $ch= curl_init();
                curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:8012/ci_restapi/api/user');
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//                curl_setopt($ch,CURLOPT_POST,1);
//                curl_setopt($ch,CURLOPT_PUT,1);
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen(json_encode($arr))));
                curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($arr));
//                curl_setopt($curl_handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
                $result=curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
        }
        
        public function delete_user($id)
        {
//                $arr=array('id'=>$id);
            
                $ch= curl_init();
                curl_setopt($ch,CURLOPT_URL,'http://127.0.0.1:8012/ci_restapi/api/user/id/'.$id);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//                curl_setopt($ch,CURLOPT_POST,1);
//                curl_setopt($ch,CURLOPT_PUT,1);
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
//                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen(json_encode($arr))));
//                curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($arr));
//                curl_setopt($curl_handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);
                $result=curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
        }

}