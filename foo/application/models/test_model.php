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

    public function add($title, $description){
        // 'now()'를 insert()에서 수행하면 함수가 아닌 문자열로 인식되고, ''를 넣지 않으면 오류가 난다.
        // 따라서 다음 문장은 now()가 DB입장에서 해석가능한 형태로 출력되도록 하는 코드이다.
        $this->db->set('created', 'NOW()', false);
        
        // insert query. 
        $this->db->insert('topic', array(
            'title'=>$title,
            'description'=>$description,
        ));
        
        // 마지막으로 추가한 데이터에 대한 id값을 알아내는 API
        return $this->db->insert_id();
    }
}
?>