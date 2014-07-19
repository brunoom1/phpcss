Class CSS
==

Class for css create using simple php.
This class cause possible the css element extensible.

Using samples:
---

###In HTML Document

```html
<html>
<head>
  <title>
    Class PHPCSS
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- import php sript for create css -->
  <link rel="stylesheet" href="css/style.css.php" type="text/css" />

</head>
  <body>
    <div id="estilo1">
    </div>
    <div id="estilo2">
    </div>
  </body>
</html>
```  

###In CSS Document

```php
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
  $css -> v("width","400px")
    -> v("height", "400px");

  /*
    Create element
    $css -> e("element",array $configurations[]);
    @return CSS Object
  */

  $css -> e("#estilo1",array(
    "float" => "left",
    "width" => "@width",
    "height" => "@height",
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
```
