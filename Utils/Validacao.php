<?php  

//Validação
class Validacao{
	static function clean($str){
		$str = trim($str);
		$str = stripcslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}

    static function name($str){
		# Letters Only 
		$name_regex = "/^([a-zA-Z' ]+)$/";
		if (preg_match($name_regex, $str)) 
			return true;
        else return false;
	}
	static function username($str){
		// Deve começar com a letra [A-Za-z]
		// 6-8 caracteres {5,8}
		// Apenas letras e números [A-Za-z0-9]
		$username_regex = "/^[A-Za-z][A-Za-z0-9]{5,8}$/";
		if (preg_match($username_regex, $str)) 
			return true;
        else return false;
	}
	static function email($str){
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) 
			return true;
        else return false;
	}
	static function password($str){

	    // Possui no mínimo 4 caracteres. Ajuste-o modificando {4,}
	    // Pelo menos uma letra maiúscula em inglês. (?=.*?[A-Z])
	    // Pelo menos uma letra minúscula em inglês.  (?=.*?[a-z])
	    //  Pelo menos um dígito. (?=.*?[0-9])
	    // Pelo menos um caractere especial, (?=.*?[#?!@$%^&*-])
	    
		$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/"; 

		if (preg_match($password_regex, $str)) 
			return true;
        else return false;
	}
	static function match($str1, $str2){
		if ($str1 === $str2) 
			return true;
        else return false;
	}

}