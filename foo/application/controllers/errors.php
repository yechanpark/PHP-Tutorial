<?php
class Errors extends CI_Controller{
    public function notfound() {
        
        // error 디렉토리의 404.php 로드
        $this->load->view('error/404');
    }
}
?>