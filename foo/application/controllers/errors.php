<?php
class Errors extends CI_Controller{
    public function notfound() {
        
        // error ���丮�� 404.php �ε�
        $this->load->view('error/404');
    }
}
?>