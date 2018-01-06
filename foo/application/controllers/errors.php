<?php
class Errors extends CI_Controller{
    public function notfound() {
        
        // error 404.php 호출
        $this->load->view('error/404');
    }
}
?>