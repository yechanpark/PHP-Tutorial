<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TestController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('test_model');
    }

    // default call method
    public function index() {
        echo 'foo# index() 호출';
    }

    // http://localhost/index.php/testcontroller/get
    public function get()
    {
        echo "get() called";
    }

    /* php는 오버로딩을 지원하지 않음
    public function get($id) {
        echo "get() with id called";
    }*/

    // http://localhost/index.php/testcontroller/getWithParam/1
    public function getWithParam($id) {
        echo "getWithParam($id) called";
    }

    // http://localhost/index.php/testcontroller/getWithMultiParam/1/2
    public function getWithMultiParam($id1, $id2 ) {
        echo "getWithParam($id1, $id2) called";
    }

    public function getTestView() {
        $this->load->view('head');
        $this->load->view('TestView');
        $this->load->view('footer');
    }

    public function getViewWithParam($id)
    {
        $data = array('key' => $id);

        $this->load->view('head');
        $this->load->view('TestViewWithParam', $data);
        $this->load->view('footer');
    }

    public function getDB(){
        $datas = $this->test_model->gets();

        $this->load->view('head');
        $this->load->view('test_list', array('topics'=>$datas));
        $this->load->view('DBView');
        $this->load->view('footer');
    }
    public function getDBWithId($id){
        $datas = $this->test_model->gets();
        $data = $this->test_model->get($id);

        $this->load->view('head');
        $this->load->view('test_list', array('topics'=>$datas));
        $this->load->view('DBViewWithId', array('topics' => $data));
        $this->load->view('footer');
    }

    public function factoryMethodPattern($potion_code){
        $this->load->model('PotionFactory');
        $potion = $this->PotionFactory->create($potion_code);
        $this->eatPotion($potion);
    }

    public function polymorphism(){
        
        $this->load->model('PotionFactory');
        $potion1 = $this->PotionFactory->create(1);
        $potion2 = $this->PotionFactory->create(2);
        $this->eatPotion($potion1);
        $this->eatPotion($potion2);
        
        $potion3 = $this->load->model('potion/BluePotion');
        $potion3->eat(); // 여기서 에러
        
        //$this->load->model('potion/BluePotion');
        //$this->BluePotion->eat();
        
    }

    // Type Hinting
    private function eatPotion(Potion $potion) {
        $potion->eat();
    }
    
    /* 인자의 타입을 알기가 힘듬
    private function eatPotion($potion) {
        $potion->eat();
    }
    */

}