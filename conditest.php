<!DOCTYPE html>
<head></head>
<body>
    <?php 
    $var1 = 4;
    $var2 = 3;

    if(($var1 > $var2) && ($var1 > 0)){
        echo '<h1> hello </h1>';
    }else{
        if($var1 > $var2){
            echo '<h1> error 1 </h1>';
        }elseif($var1 <= 0){
            echo '<h1> error 2 </h1>';
        }
    }
    ?>
</body>
