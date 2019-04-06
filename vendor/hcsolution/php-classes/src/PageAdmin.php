<?php

namespace HCSolution;

class PageAdmin extends Page {

    public function __construct($opts = array(), $tpl_dir = "/views/admin/"){

        //chama o metodo construct da classe pai(Page.php) 
        parent::__construct($opts, $tpl_dir);
    }
}