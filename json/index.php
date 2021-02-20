<?php

$data = glob("{*.png,*.jpg,*.jpeg,*.img}",GLOB_BRACE);


$count = 0;

for($i = 0 ; $i< sizeof($data); $i++)
{

    
        $arr2 = str_replace("_", " ", $data[$i]);
    
        $store[$i] =  basename($arr2,".png");
    
        $store1[$i] =  basename($arr2);

    $count = $i +1;
    
        $new_data = array(

            'name' => $store[$i],
            'code' => $count,
            'src' => "www.google.com/".$store1[$i]
    
            );

    
    $json_data =  json_encode($new_data,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    
    $current_data = file_put_contents("data.json",$json_data,FILE_APPEND);
    
    

}

echo "<h1>Data stored successfully </h1>";

?>