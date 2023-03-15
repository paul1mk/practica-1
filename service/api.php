<?php
   function API()
   {
     
       $res = json_decode(file_get_contents("https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items"), true);
   
       $arr_output = array_filter($res, function($item){
           if($item['color'] == 'green'){
             return $item;
           }
         });
   
     return  $arr_output;
   }
   
   ?>