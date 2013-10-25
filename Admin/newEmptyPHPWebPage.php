<?php
// Include MySQL class
require_once('inc/mysql.class.php');
// Include database connection
require_once('inc/global.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
// Process actions
$cart = $_SESSION['cart'];
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $c=1;
        $qty=1;
        		if ($cart) {
			$items = explode(',',$cart);
			
			//foreach ($items as $item) {
                            
                          
                          //  if(($item==$item)&&$item>1)
                           // {
                                //echo "product # $c $item quantity $qty <br/>";
                           // }
                           echo ''.count($items).'<BR />';
                            for($i=0;count($items)>$i;$i++)
                            {
                                //echo ' I '.$items[$i];
                                 for($j=1;count($items)>$j;$j++)
                                 {
                                     if($items[$i]==$items[$j])
                                     {
                                         $qty++;
                                     }
                                     //echo ' J '.$items[$j];
                                 } echo  ' <br /> ';
                            }
                           
                        //}
                        }
        ?>
    </body>
</html>
