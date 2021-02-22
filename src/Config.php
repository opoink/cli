<?php
/**
* Copyright 2021 Opoink Framework (http://opoink.com/)
* Licensed under MIT, see LICENSE.md
*/
namespace Opoink\Cli;

class Config {

    public $config;

    public function __construct(){
        $target = ROOT.DS.'etc'.DS.'Config.php';
        if(isset($target)){
            $this->config = include($target);
        }
    }

    public function getConfig(){
        return $this->config;
    }
}
?>