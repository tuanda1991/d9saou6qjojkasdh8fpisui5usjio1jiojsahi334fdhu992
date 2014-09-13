<?php
App::uses('ModelBehavior', 'Model');
/**
 * Validator
 * - Only validate the content of text and textarea fields
 * - Check the type of data, return true if correct, return false otherwise
 * @author RUNSYSTEM
 * @since version - 2011/08/04
 */
class ValidatorBehavior extends ModelBehavior{
    // Class using validate
	public $classValidate = 'Validator';
	/**
	 * isEmail
	 * - Return true if string $data is an email address format
	 * - Otherwise, return false
	 */
	public function isEmail($data) {
		if ($data == ""){
			return true;
		}
		if (preg_match("/^[a-zA-Z0-9_\.\-=]+@[a-zA-z0-9_\-=]+\.[a-zA-Z0-9_\.\-=]+$/", $data)) {
			return true;
		}
		return false;
	}
	/**
	 * isUrl
	 * - Return true if string $data is an URL format
	 * - Otherwise, return false
	 * - This function if fetch from http://www.phpcentral.com/208-url-validation-php.html
	 */
	public function isUrl($data) {
		if ($data == "") {
			return true;
		}
		$urlregex = "^(https?)\:\/\/";
		if (eregi($urlregex, $data)) {
			return true;
		}
		return false;
	}
	/**
	 * isPostCode
	 * - Return true if string $data is a post code format in JP
	 * - Otherwise, return false
	 */
	public function isPostCode($data) {
		if ($data == "") {
                    return true;
		}
		if (eregi("^[0-9]{3}([.-][0-9]{4})$", $data)) {
                    return true;
		}
		return false;
	}
	/**
	 * isTelOrFax
	 * - Return true if $data is telephone number of fax number
	 * - Otherwise, return false
	 */
	public function isTelOrFax($data) {
		if ($data == "") {
			return true;
		}
		if (eregi("^[0-9]{1,}([.-][0-9]{1,}){0,}$", $data)) {
			return true;
		}
		return false;
	}
	/**
	 * isNumber
	 * - Return true if string $data is a number format
	 * - Otherwise, return false
	 */
	public function isNumber($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^-{0,1}[0-9]*\.{0,1}[0-9]*$/", $data)) {
			return true;
		}
		return false;
	}
	/**
	 * isInteger
	 * - Return true if string $data is an integer format
	 * - Otherwise, return false
	 */
	public function isInteger($data) {
		if ($data == "") {
                    return true;
		}		
		if (preg_match("/^-{0,1}[0-9]*$/", $data)) {
                    return true;
		}
		return false;
	}
	/**
	 * _isInteger
	 * - Return true if string $data is an integer format
	 * - Otherwise, return false
	 */
	public function _isInteger($data) {
		if ($data) {
			if (preg_match("/^-{0,1}[0-9]*$/", $data)) {
				return true;
			}
		}
		return false;
	}
	/**
	 * isFloat
	 * - Return true if $numberCheck is float number or string null
	 * - Otherwise, return false
	 */
        /**
	 * isIntegerPositive
	 * - Return true if string $data is an integer positive format
	 * - Otherwise, return false
	 */
	public function isIntegerPositive($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^[0-9]*$/", $data)) {
			return true;
		}
		return false;
	}
        /**
	 * isIntegerPositiveAndDot
	 * - Return true if string $data is an integer positive and dot format
	 * - Otherwise, return false
	 */
	public function isIntegerPositiveAndDot($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^[0-9]+(\.[0-9]+)?$/", $data)) {
			return true;
		}
		return false;
	}
	public function isFloat($numberCheck, $charactersRound) {
		if ($numberCheck == "") {
			return true;
		}
		if (preg_match("/^[0-9]{1,}+(.[0-9]{1,$charactersRound})?$/", $numberCheck)) {
			return true;
		}
		return false;
	}
	
	/**
	 * isIntegerPositiveAndMinus
	 * - Return true if string $data is an integer positive and minus format
	 * - Otherwise, return false
	 */
	public function isIntegerPositiveAndMinus($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^[0-9]+(-[0-9]+)?(-[0-9]+)?(-[0-9]+)?$/", $data)) {
			return true;
		}
		return false;
	}
        /**
	 * isWord
	 * - Return true if string $data is a continuous word
	 * - Otherwise, return false
	 */
	public function isWord($data, $special = true) {
		if ($data == "") {
			return true;
		}
		if($special) {
			if (preg_match("/^[a-zA-Z0-9_@\.\+\-]+$/", $data)) {
				return true;
			}
		}
		else {
			if (preg_match("/^[A-Za-z0-9]+$/", $data)) {
				return true;
			}
		}
		return false;
	}
        /**
	 * isFormatDate
	 * - Return true if string $data is a date format
	 * - Otherwise, return false
	 */
	function isFormatDate($data) {
		if ($data == "") {
			return true;
		}
		// Check number sep
		$sep = '-';
		$data = str_replace('/', $sep, $data);
		$arrDate = explode($sep, $data);
		if (count($arrDate) != 3) {
			return false;
		}
		// Check format date
		list($y, $m, $d) = $arrDate;
		//$m = sprintf("%02d", $m);
		//$d = sprintf("%02d", $d);
		$data = $y . $sep . $m . $sep . $d;
		$strValidate = "/^(\d\d\d\d)" . $sep . "(\d\d)" . $sep . '(\d\d)$/';
		if (!preg_match($strValidate, $data, $ary)) {
			return false;
		}
		return true;
	}
        /**
         * isIntegerPositiveOrMinus
         * - Return true if string $data is an integer positive or minus format
         * - Otherwise, return false
         */
        public function isIntegerPositiveOrMinus($data) {
            if ($data == "") {
                return true;
            }
            if (preg_match("/^[0-9-%]+$/", $data)) {
                return true;
            }
            return false;
        }
	/**
	 * isAlphabet
	 * - Check if is alphabet a-z, A->Z
	 */
	public function isAlphabet($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^[a-zA-Z ]+$/", $data)) {
			return true;
		}
		return false;
	}
	
	/**
	 * isNumberOrAlphabet
	 * - Return true if string $data is an integer positive and alphabet format and space
	 * - Otherwise, return false
	 */
	public function isNumberOrAlphabet($data) {
		if ($data == "") {
			return true;
		}
		if (preg_match("/^[0-9a-zA-Z ]+$/", $data)) {
			return true;
		}
		return false;
	}	
	/**
	 * isDate
	 * - Return true if string $data is a date
	 * - Otherwise, return false
	 */
	public function isDate($data) {
		if ($data == "") {
			return true;
		}
		// Check number sep
		$sep = '-';
		$data = str_replace('/', $sep, $data);
		$arrDate = explode($sep, $data);
		if (count($arrDate) != 3) {
			return false;
		}
		// Check format date
		list($y, $m, $d) = $arrDate;
		// Add: 2013/10/10
		if (strlen($m) == 1) {
			$m = '0' . $m;
		}
		if (strlen($d) == 1) {
			$d = '0' . $d;
		}
		$data = $y . $sep . $m . $sep . $d;
		$strValidate = "/^(\d\d\d\d)" . $sep . "(\d\d)" . $sep . '(\d\d)$/';
		if (!preg_match($strValidate, $data, $ary)) {
			return false;
		}
		// Check logic date
		return checkdate($ary[2], $ary[3], $ary[1]);
	}	
	/**
	 * _isDate
	 * - Return true if string $data is a dte
	 * - Otherwise, return false
	 */
	public function _isDate($data, $sep = "-") {
		list($y, $m, $d) = split($sep, $data);
		if (Validator::_isInteger($y) && Validator::_isInteger($m) && Validator::_isInteger($d)) {
			return checkdate($m, $d, $y);
		}
		return false;
	}
        
        /**
        * isValidIp
        * - Check IP address
        * @param String $ipAddress
        * @return Boolean If is IP address return true; else return false
        */
       public function isValidIp($ipAddress) {
           $arrayIp = explode(".", $ipAddress);
           if (count($arrayIp) != 4) {
               return false;
           }
           if (!eregi("^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$", $ipAddress)) {
                           return false;
           }
           for($i = 0; $i < 4; $i++) {
               if ($arrayIp[$i] > 255) {
                   return false;
               }
           }
           return true;
       }    
       /**
        * checkMaxString
        * @param String $data
        * @param Integer $number
        * @return Boolean If max length of string is greater than $number return false; else return true
        */
       public function checkMaxString($data, $number) {

           if ($data == null) {
                   return true;
           }
           if (mb_strlen($data, 'UTF-8') > $number) {
               return false;
           }
           return true;
       }

       /**
        * isNotNull
        * - Return true if $data is not null
            * - Otherwise, return false
        */
       public function isNotNull($data) {
           if ($data === null || $data == '') {
               return false;
           }
           return true;
       }
       /**
        * checkPassword
        * - Return true if $data is not null
            * - Otherwise, return false
        */
       public function checkPassword($pass, $passRepeat) {
               if ($passRepeat == null || $passRepeat == "") {
                       return false;
               }
               return $pass != $passRepeat ? false : true;
       }
        
	/**
	 * isKatakana
	 * - Return true if value is katakana
	 * - User for both fullsize and half size kana
	 * - Source code consult from http://programmer-toy-box.sblo.jp/category/412200-1.html
	 * @param String $data string check data
	 * @param Integer $charset charset of string data (1:UTF-8, 2:EUC-JP, 3:SJIS)
	 * @return Boolean true if string is katakana string
	 */
	public function isKatakana($data, $charset) {
		if ($data == "") {
			return true;
		}
		switch ($charset) {
			// UTF-8 string
			case 1:
				if (!preg_match("/^(?:\xE3\x82[\xA1-\xBF]|\xE3\x83[\x80-\xB6]|\xEF\xBD[\xA1-\xBF]|\xEF\xBE[\x80-\x9F]|ー|ｰ)+$/", $data)) {
					return false;
				}
				break;
			// EUC-JP String
			case 2:
				if (!ereg( "^(\xA5[\xA1-\xF6]|\xA1\xBC|\xA1\xA6|\xA1\xA1|\x20)+$", $data)) {
					return false;
				}
				break;
			// SJIS string
			case 3:
				break;
		}
		return true;
	}
	/**
	 * isContainKatakana
	 * - Return true if value contains 2bytes characters string.
	 * - The name of function is not accurate.
	 */
	public function isContainKatakana($data) {
		if ($data == "") {
			return true;
		}
		if (mb_strlen($data) == strlen($data)) {
			return false;
		}
		return true;
	}
	/**
	 * isEmailMobileDomain
	 * - Check email mobile domain
	 * @param String $strEmail
	 * @return Boolean
	 */
	public function isEmailMobileDomain($strEmail) {
		global $domainMobile;
		$start = strpos($strEmail, '@');
		$strDomain = substr($strEmail, $start + 1);
		if (in_array($strDomain, $domainMobile)) {
			return true;
		}
		return false;
	}
	/**
	 * isZenkaku
	 * - Check if is zenkaku(check is full size)
	 */
	public  function isZenkaku($str, $encoding = "") {
	 	if ($encoding == "") {
	 		$encoding = _SYSTEM_ENCODING_;
	 	}
		return ($str == mb_convert_kana($str, 'RNASKV', $encoding));
	 }

	/**
     * isZenkakuAndLimit
     * - Check if is zenkaku(check is full size) and limit
     */
    public  function isZenkakuAndLimit() {
        $args = func_get_args();
        $data = $args[0];
        $limit = isset($args[1]) ? $args[1] : NULL;
        $encoding = isset($args[2]) ? $args[2] : NULL;
        if ($encoding = "" || !isset($encoding)) {
            $encoding = _SYSTEM_ENCODING_;
        }
        if (self::isZenkaku($data, $encoding)) {
            $array = preg_split('/(?<!^)(?!$)/u', $data);
            if (isset($limit) && count($array) > $limit) {
                return false;
            }
            return true;
        }
        return false;
     }

    /**
     * isHankaku
     * - Check if is Hankaku(check is half size)
     */
    public function isHankaku($str, $encoding = "") {
            if ($encoding == "") {
                    $encoding = _SYSTEM_ENCODING_;
            }
            return ($str == mb_convert_kana($str, 'rnaskv', $encoding));
     }	
    /**
    * isTime
    * - Check value is time or not
    * @param String $time The time to be checked
    * @return Boolean
    * @author Ngo Thanh Phat
    * @since 1.0 2011/11/24
    */
   public function isTime($time) {
           if (isset($time)) {
                   $arrTime = explode(":", $time);
                   if (count($arrTime) == 3) {
                           if (($arrTime[0] !== "00" && Validator::isInteger($arrTime[0]) == false) || intval($arrTime[0]) < 0 || intval($arrTime[0]) > 23) {
                                   return false;
                           }
                           if (($arrTime[1] !== "00" && Validator::isInteger($arrTime[1]) == false) || intval($arrTime[1]) < 0 || intval($arrTime[1]) > 59) {
                                   return false;
                           }
                           if (($arrTime[2] !== "00" && Validator::isInteger($arrTime[2]) == false) || intval($arrTime[2]) < 0 || intval($arrTime[2]) > 59) {
                                   return false;
                           }
                   }
                   else {
                           return false;
                   }
           }
           return true;
   }
   /**
    * compareDates
    * - Compare two dates
    * @return Boolean
    * @author TanLV
    * @since 1.0 2012/02/03
    */
    public function compareDates() {
            $params = func_get_args();
            $fromDate = $params[0];
            $toDate = $params[1];
            if (strtotime($fromDate) > strtotime($toDate)) {
                    return false;
            }
            return true;
    }
    /**
     * isDateTime
     * - Check input is datetime
     * @param String $input. ex: YYYY/m/d H:i:s
     */
    public function isDateTime($input) {
            $datetime = explode(" ", trim($input));
            $date = trim($datetime[0]);
            $time = trim(isset($datetime[1]) ? $datetime[1] : '');

            if (!self::isDate($date) || !self::isTime($time)) {
                    return false;
            }
            return true;
    }
    /**
     * isFloatJp
     * - Check input is float Jp
     * @param String $numberCheck. Ex: 1,000.53: true
     * @param Integer $charactersRound
     */
    public function isFloatJp($numberCheck, $charactersRound) {
            return self::isFloat(str_replace(',', '', $numberCheck), $charactersRound);
    }
}
