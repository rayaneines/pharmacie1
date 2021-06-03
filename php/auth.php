<?php 
/**
* 
*/
class Auth 
{
	
	static function isLogged(){
       if (isset($_SESSION['auth']) &&
        ((isset($_SESSION['auth']['email']) && isset($_SESSION['auth']['mdp'])) ||(isset($_SESSION['auth']['email']) && isset($_SESSION['auth']['mdp1'])&& isset($_SESSION['auth']['email1'])) )



    ) {
              return true; 
        }else{
        	 return false;
        }
	}

	/*static function logout(){
if (isset($_POST['deconnecter'])) {
		session_destroy();
		header('location:login.php');
}
	}*/
}


?>