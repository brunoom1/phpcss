<?php
  /*
    Set header content type css and import library.
  */

  header("Content-Type: text/css; charset=\"utf-8\"");
  $dir = dirname(__FILE__);
  include $dir.'./../lib/css/CSS.php';

  $css = new CSS();

  /*
    Create vars
    $css -> v("var_name","value");
    @return CSS Object
  */
  $css -> v("game_width","400px")
    -> v("game_height", "400px");

  /*
    Create element
    $css -> e("element",array $configurations[]);
    @return CSS Object
  */

  $css -> e("#estilo1",array(
    "float" => "left",
    "width" => "200px",
    "height" => "100px",
    "background-color" => "blue"
  ));

  /*
    Extends object
    $css -> e("element", array configurations[], "element_extends")
  */

  $css -> e("#estilo2", array(
    "background-color"=>"red"
  ),"#estilo1");

  // print css
  echo $css;
?>
