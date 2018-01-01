<?php

class test_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function gets() {
        echo "Test_model# gets() called";
        // result()는 리스트를 반환하므로 iteration이 반드시 필요하다.
        return $this->db->query('SELECT * FROM topic')->result();
    }

    public function get($test_id){        
        //아래 2개 는 같은 결과를 반환한다. row()는 한 개의 레코드를 반환한다.
        // return $this->db->query('SELECT * FROM topic WHERE id='.$test_id);
        return $this->db->get_where('topic', array('id'=>$test_id))->row();
    }

}
?>