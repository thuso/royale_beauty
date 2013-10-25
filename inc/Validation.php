<?php
//class to validate text boxes
class Validation
{
        
	function validateEmpty($values)
	{

		if(!empty($value))
		{

			return ' ';
		}
		else
		{
			return 'Required';
		}
	}
	function validateEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			return true;
			exit;
		}
		return false;
	}
//	function validatePass($var)
//	{
//			$arr=str_split($var);
//			$strnum=strlen($var);
//			if($strnum <6 || $strnum >15)
//			{
//				return false;
//				exit;
//			}
//		for($i=0;$i<$arr.length;$i++)
//		{
//			if((!$arr[$i]>='A')&&(!$arr[$i]<='Z'))
//			{
//				return false;
//				exit;
//			}
//			else if((!$arr[$i]>='a')&&(!$arr[$i]<='z'))
//			{
//				return false;
//				exit;
//			}
//			else if((!$arr[$i]>='0')&&(!$arr[$i]<='9'))
//			{
//
//				return false;
//				exit;
//			}
//		}
//
//
//	}
        function ConfirmPass($pass1,$pass2)
        {
            if($pass1==$pass2)
            {
                return true;
                exit;
            }
            return FALSE;
        }


}
?>