<?php
class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        public function get_all()
        {
                $res=$this->db->get('users');
                $rows=$res->result_array();
                return $rows;
        }
        
        public function get($id)
        {
                $res=$this->db->get_where('users',array('id'=>$id));
                $row=$res->row_array();
                return $row;
        }
        
        public function update($id,$arr)
        {
                foreach($arr as $key=>$value)
                {
                    if(is_null($value) || $value == '')
                        unset($arr[$key]);
                }
                $arr['id']=$id;
                $data=array($arr);
                $res=$this->db->update_batch('users',$data,'id');
                return (bool)$res;
        }
        
        public function create($arr)
        {
                $res=$this->db->insert('users',$arr);
                return (bool)$res;
        }
        
        public function delete($id)
        {
                $res=$this->db->delete('users',array('id'=>$id));
                return (bool)$res;
        }

}