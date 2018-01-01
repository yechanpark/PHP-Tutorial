<?php

include 'potion/Potion.php';
require('potion/RedPotion.php');

class PotionFactory extends CI_Model{

    public function create($potion_code){
        if($potion_code == 1)
            return new Potion();
        else
            return new RedPotion();
    }
}
?>