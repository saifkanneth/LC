<?php
//if(!isset($_COOKIE["PHPSESSID"]))
//{
session_set_cookie_params(0);
  session_start();
//}
/*if (!session_is_registered('user')) 
		    session_register('user');*/
	
class sessionsetting
{
	
	private static $Instance;
	private $username;
	private static $password;
	
 private function __construct() {}
	
	public static function getInstance(){
			 if (self::$Instance == null){
            $className = __CLASS__;
            self::$Instance = new $className;
        }

        return self::$Instance;
	}
 	function setsession($username,$password,$remember)
	{		
			
			$_SESSION['user_name']	=	$username;
		//	session_unset();
			//session_destroy();
			if($remember==1){
					setcookie('username', $username, time()+365*24*60*60,'127.0.0.1',false,false);
					setcookie('password', $password, time()+365*24*60*60,'127.0.0.1',false,false);
			}
			else
			{
				if(isset($_COOKIE['username'])){
						setcookie('username', $username, time()-365*24*60*60,'127.0.0.1',false,false);
						setcookie('password', $password, time()-365*24*60*60,'127.0.0.1',false,false);
					
				//	echo "destroy Cookie";
				}
			}
	}
	function setCookie($password){
     if(isset($_COOKIE['username'])){
         					setcookie('password', $password, time()+365*24*60*60,'127.0.0.1',false,false);

     }
 }
	
	function getCookie(){
		if(isset($_COOKIE['username'])){
			$cookieArr[0]=$_COOKIE['username'];
			$cookieArr[1]=$_COOKIE['password'];
				echo json_encode($cookieArr);
		}
	
	}
	function destroysession()
	{	
					session_unset();
		session_destroy();
			
			//header("Location:login.php?msg=Sucessful Logged out"); 
	}
	
	//Checks for admin user 
	function adminlogin()
	{
		//	if($_SESSION['login_id']!=1 && $_SESSION['login_id']!=12)
				//header("Location:index.php?msg=User does not exist"); 
	}
	
	//Cheecks for any user
	function chekuser()
	{
	//	echo $_SESSION['user_name'];
			if(isset($_SESSION['user_name']))
				echo "true";
		else{
			//	print $_SESSION['user_name']
				 echo "false";//$_SESSION['user_name'];
				//header("Location:index.php?msg=User does not exist"); 
			}
	}
	
	
		
}
?>