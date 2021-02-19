<?php
namespace Opoink\Cli\Request;

class Param {

    protected $argv = [];
    protected $argc;
    public $nameSpace;
    public $action;

    public function __construct(){
        $this->convert();
    }

    /**
     * convert all arguments as array of key value pair
     */
    protected function convert(){
        global $argv, $argc;

        foreach ($argv as $key => $value) {
            if(substr($value, 0, 2) == '--'){
                $value = '::::' . $value;
                $value = str_replace('::::--', '', $value);
                $value = explode('=', $value);

                if(count($value) == 2){
                    $this->setArgv($value[0], $value[1]);
                }
            } else {
                if($key == 1){
                    $value = explode(':', $value);
                    if(count($value) == 2){
                        list($this->nameSpace, $this->action) = $value;
                    }
                }
            }
        }
    }

    /**
     * set arguments for later use
     */
    protected function setArgv($key, $val){
        $this->argv[$key] = $val;
    }

    /**
     * return argument 
     * @param $key string the name of the param 
     */
    public function getArgv($key=null){
        if($key){
            if(isset($this->argv[$key])){
                return trim($this->argv[$key]);
            } else {
                return null;
            }
        } else {
            return $this->argv;
        }
    }
}
?>