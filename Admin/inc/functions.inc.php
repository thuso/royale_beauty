<?php
class functions
{
    private $userid;
    private $username;
    

    function  __construct()
    {

    }

function writeShoppingCart()
{
	$cart = $_SESSION['cart'];
        
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="shopping_cart.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="shopping_cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Product WHERE Product_Id = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="shopping_cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$Product_Name.' </td><td> '.$Product_Type.'</td>';
			$output[] = '<td>R'.$Product_Price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3"  style="border: thin solid #800000"/></td>';
			$output[] = '<td>R'.($Product_Price * $qty).'</td>';
			$total += $Product_Price * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>R'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
                $output[] ='<a href="check_out.php">Go to check out</a>';

		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
function showCartFinal() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="shopping_cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Product WHERE Product_Id = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="shopping_cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$Product_Name.' </td><td> '.$Product_Type.'</td>';
			$output[] = '<td>R'.$Product_Price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3"  style="border: thin solid #800000"/></td>';
			$output[] = '<td>R'.($Product_Price * $qty).'</td>';
			$total += $Product_Price * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>R'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
                $output[] ='<a href="check_out.php">Go to check out</a>';

		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
function login($email,$psw)
{
    global $db;
    $sql="select * From customer where customer_password='$psw' and customer_email='$email'";
    $result = $db->query($sql);
    
    $row = $result->fetch();

   

    $this->username=$row['customer_Fname'];


    $this->userid =$row['customer_id'];
   
    if($row>0)
    {
        return true;

    }
    return false;
}
function registerUser($fName,$lName,$email,$pass,$gender)
{
    if(!empty($fName)||!empty($lName)||!empty($gender)||!empty($email)||!empty($pass))
    {
         global $db;
        $sql="insert into customer values(null,'$fName','$lName','$gender','$email','$pass')";
        $result = $db->query($sql);
        $row=mysql_affected_rows();
        if($row>0)
        {
            return true;

        }
       
    }
    
         return  false;
    
   
}
function registerAddress($fName,$lName,$email,$pass,$gender,$street,$province,$post,$houseNumber)
{
  
    global $db;
    if($this->registerUser($fName, $lName, $email, $pass, $gender)==true)
    {
        if(!empty($street)||!empty($post)||!empty($houseNumber))
        {
             $cust_id=mysql_insert_id();
        
            $sql="insert into address values('$cust_id','$street','$province','$post','$houseNumber')";
            $result = $db->query($sql);
            $row=mysql_affected_rows();

            if($row>0)
            {
                 return true;

            }
   
        }
       
    }
  return false;
}
function update($street,$province,$post,$houseNumber,$id)
{
    global $db;

    $sql="Update address set street_name='$street',province='$province',postal_code='$post',house_number=$houseNumber where customer_id=$id";
    $result = $db->query($sql);
    $row =mysql_affected_rows();
            if($row>0)
            {
                 return true;

            }
        return FALSE;
    }
    function getName()
    {
     
        return $this->username;

    }
    function getid()
    {
        return $this->userid;

    }
function generateRefference()
{

     $ranNum=rand(1, 1111115);
     return 'BN'.$ranNum;

}
function putOrder($custId,$orderQty,$productid,$ref)
{

    $sql="insert into orders values(null,'$custId',$orderQty,$productid,'$ref')";
    $result = mysql_query($sql);
    $row =mysql_affected_rows();
            if($row>0)
            {
                 return true;

            }
        return FALSE;
}
}
?>
