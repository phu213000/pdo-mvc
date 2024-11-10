<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog e-commerce</title>
</head>

<body>
  <h1>
    <?php  
    spl_autoload_register(function($class_name){
      include 'system/libs/'.$class_name.'.php';
    });

    include 'app/config/config.php';


      $url = isset($_GET['url']) ? $_GET['url'] : NULL;   
      
      if($url != NULL){
        $url = rtrim($url, '/');
        $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
      }
      else{
        unset($url);
      }

      if(isset($url[0])){
        include_once('app/controllers/'.$url[0].'.php');
        $ctrler = new $url[0]();
        if(isset($url[2])){
          $ctrler->{$url[1]}($url[2]);
        }
        else{
          if(isset($url[1])){
            $ctrler->{$url[1]}();
          }
          else{
            // $ctrler->index();
          }
        }
      }
      else{
        include_once('app/controllers/Index.php');
        $index = new Index();
        $index->homepage();
      }
    
    
    // $ctrler = new $url[0]();
    
    // echo '<pre>';
    // print_r($url);
    // echo '</pre>';
    // echo ' class : '.$url[0].'<br>';
    // echo ' method : '.$url[1].'<br>';
    
    ?>
  </h1>
</body>

</html>