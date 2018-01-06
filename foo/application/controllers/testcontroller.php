<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// 위 코드는 직접적으로 이 스크립트를 실행하게 할 수 없도록 하는 코드이다.

class TestController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
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
        $this->load->view('header');
        $this->load->view('TestView');
        $this->load->view('footer');
    }

    public function getViewWithParam($id)
    {
        $data = array('key' => $id);

        $this->load->view('header');
        $this->load->view('TestViewWithParam', $data);
        $this->load->view('footer');
    }

    public function getDB(){
        $this->load->database();
        $datas = $this->test_model->gets();

        $this->load->view('header');
        $this->load->view('test_list', array('topics'=>$datas));
        $this->load->view('DBView');
        $this->load->view('footer');
    }
    public function getDBWithId($id){
        $this->load->database();
        $datas = $this->test_model->gets();
        $data = $this->test_model->get($id);

        $this->load->view('header');
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
        
        // model을 로드하는 것은 객체를 DI받는 것이 아니므로, 다음과 같은 방법은 사용할 수 없음.
        //$potion3 = $this->load->model('potion/BluePotion');
        //$potion3->eat(); // 여기서 에러
        
        
        $this->load->model('potion/BluePotion');
        $this->BluePotion->eat();

        
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

    public function viewCSS(){
        $this->load->view('header');
        $this->load->view('TestView');
        $this->load->view('footer');
    }
    
    public function helper(){
        $this->load->view('header');
        $this->load->helper('url');
        $data = array('title'=> '타이틀', 'description'=>'www.naver.com');
        $this->load->view('helperOutput', $data);
        $this->load->view('footer');
    }
    
    public function customHelper(){
        $this->load->view('header');
        // custom_help.php, url_helper.php를 로드한다.
        // Custom을 불러도 custom_helper.php가 로드된다.(case-insensitive)
        $this->load->helper('Custom', 'url');
        $title = '타이틀';
        $description = 'www.naver.com';
        // 시간값은 DB를 활용한다면 UNIX_TIMESTAMP(created) AS created 로 sql 셀렉트 시 가져온다.
        // 아래는 php함수를 사용한 것이다.
        // strtotime() : Parse about any English textual datetime description into a Unix timestamp
        //$created = strtotime('2018-01-06 12:34:56'); 
        $created = strtotime('now');
        $data = array('title'=> $title, 'description'=>$description, 'created'=>$created);
        $this->load->view('CustomHelperOutput', $data);
        $this->load->view('footer');
    }
}