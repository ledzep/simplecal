<?php

//error_reporting(1);

function pf_validate_number($value, $function, $redirect) {
	if(isset($value) == TRUE) {
		if(is_numeric($value) == FALSE) {
			$error = 1;
		}
		if(isset($error)) {
			header("Location: " . $redirect);
		}
		else {
			$final = $value;
		}
	}
	else {
		if($function == 'redirect') {
			header("Location: " . $redirect);
		}
		if($function == 'value') {
			$final = 0;
		}
	}
	return $final;
}

?>
