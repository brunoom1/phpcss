<?php

  class Element{

    protected $elements = array();
    private $elements_count = 0;
    public $data = array();

    public function __construct($element = "", $configuration = array()){
      $this ->data[$element] = $configuration;
    }

    public function e($element, $configuration = array(), $extend_element_name = ""){
      // setiver algo a ser extendido

      if($extend_element_name){
        if(array_key_exists($extend_element_name, $this->elements)){
          $configuration = array_merge($this->elements[$extend_element_name]->data[$extend_element_name],$configuration);
        }
      }

      $this->elements[$element] = new Element($element, $configuration);
      return $this;
    }
  }

  class CSS extends Element{

    private $vars = array();

    public function v($varname, $varvalue=""){
      if(!$varvalue && $varname && array_key_exists($varname, $this->vars))
        return $this->vars[$varname];

      if($varname)
        $this->vars[$varname] = $varvalue;

      return $this;
    }

    public function __toString(){
      $str = "";

      foreach($this->elements as $el){
        $str .= $this->mountElementStr($el);
      }

      return $str;

    }

    private function mountElementStr($element){
      $str = "";

      foreach($element -> data as $key => $element){
        $str .= $key . '{';
          foreach($element as $key => $v){

            // verifica se tem variaveis no valor
            if(strstr($v, '@') != false){
              $v = $this->v(substr($v, 1, strlen($v)-1));
            }

            $str .= $key . ":" . $v . ";";
          }
        $str .= "}";
      }
      return $str;
    }
  }





?>
