<?php

App::uses('ModelBehavior', 'Model');

/**
 * Validator
 * - Only validate the content of text and textarea fields
 * - Check the type of data, return true if correct, return false otherwise
 * 
 * @author Fingerprint
 * @since version - 2014
 */
class ValidatorBehavior extends ModelBehavior {

    // Class using validate
    public $classValidate = 'Validator';

    /**
     * isEmail return true if string $data is an email address format
     * 
     * @return boolean
     */
    public function isEmail($data) {
        if ($data == "") {
            return true;
        }
        if (preg_match("/^[a-zA-Z0-9_\.\-=]+@[a-zA-z0-9_\-=]+\.[a-zA-Z0-9_\.\-=]+$/", $data)) {
            return true;
        }
        return false;
    }

    /**
     * isUrl return true if string $data is an URL format
     * 
     * @author http://www.phpcentral.com/208-url-validation-php.html
     * @return boolean     
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
     * isPostCode return true if string $data is a post code format in JP
     * 
     * @return boolean
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
     * isTelOrFax return true if $data is telephone number of fax number
     * 
     * @return boolean 
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
     * isNumber return true if string $data is a number format
     * 
     * @return boolean
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
     * isInteger  return true if string $data is an integer format
     * 
     * @return boolean
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
     * isInteger return true if string $data is an integer format
     * 
     * @return boolean
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
     * isIntegerPositive Return true if string $data is an integer positive format
     * Otherwise, return false
     * 
     * @param string $data
     * @return boolean
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
     * Return true if string $data is an integer positive and dot format
     * Otherwise, return false
     * 
     * @param string $data
     * @return boolean
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
    /**
     * isFloat return true if string is float
     * 
     * @param float $numberCheck
     * @param int $charactersRound
     * @return boolean
     */
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
     * Return true if string $data is an integer positive and minus format
     * Otherwise, return false
     * 
     * @param string $data
     * @return boolean
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
     * Return true if string $data is a continuous word
     * Otherwise, return false
     * 
     * @param string $data
     * @param string $special
     * @return boolean
     */
    public function isWord($data, $special = true) {
        if ($data == "") {
            return true;
        }
        if ($special) {
            if (preg_match("/^[a-zA-Z0-9_@\.\+\-]+$/", $data)) {
                return true;
            }
        } else {
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
     * 
     * @param string $data
     * @return boolean
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
     * 
     * @param type $data
     * @return boolean
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
     * 
     * @param type $data
     * @return boolean
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
     * 
     * @param type $data
     * @return boolean
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
     * 
     * @param string $data
     * @return boolean
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
     * 
     * @param type $data
     * @param type $sep
     * @return boolean
     */
    public function isDate2($data, $sep = "-") {
        list($y, $m, $d) = split($sep, $data);
        if (Validator::_isInteger($y) && Validator::_isInteger($m) && Validator::_isInteger($d)) {
            return checkdate($m, $d, $y);
        }
        return false;
    }

    /**
     * isValidIp
     * - Check IP address
     * 
     * @param type $ipAddress
     * @return boolean
     */
    public function isValidIp($ipAddress) {
        $arrayIp = explode(".", $ipAddress);
        if (count($arrayIp) != 4) {
            return false;
        }
        if (!eregi("^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$", $ipAddress)) {
            return false;
        }
        for ($i = 0; $i < 4; $i++) {
            if ($arrayIp[$i] > 255) {
                return false;
            }
        }
        return true;
    }

    /**
     * checkMaxString
     * 
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
     * 
     * @param type $data
     * @return boolean
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
     * 
     * @param type $pass
     * @param type $passRepeat
     * @return boolean
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
     * @author http://programmer-toy-box.sblo.jp/category/412200-1.html
     * 
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
                if (!ereg("^(\xA5[\xA1-\xF6]|\xA1\xBC|\xA1\xA6|\xA1\xA1|\x20)+$", $data)) {
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
     * 
     * @param type $data
     * @return boolean
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
     * 
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
     * 
     * @param type $str
     * @param string $encoding
     * @return type
     */
    public function isZenkaku($str, $encoding = "") {
        if ($encoding == "") {
            $encoding = _SYSTEM_ENCODING_;
        }
        return ($str == mb_convert_kana($str, 'RNASKV', $encoding));
    }

    /**
     * isZenkakuAndLimit
     * - Check if is zenkaku(check is full size) and limit
     * 
     * @return boolean
     */
    public function isZenkakuAndLimit() {
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
     * 
     * @param type $str
     * @param string $encoding
     * @return type
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
     * 
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
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * compareDates
     * - Compare two dates
     * 
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
     * 
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
     * 
     * @param String $numberCheck. Ex: 1,000.53: true
     * @param Integer $charactersRound
     */
    public function isFloatJp($numberCheck, $charactersRound) {
        return self::isFloat(str_replace(',', '', $numberCheck), $charactersRound);
    }
    /**
     * 
     * 
     * @param type $values
     * @param type $validate = array(
     *      'field_name1'=>array(
     *          'isNotnull'=>'msgCode',
     *          'isNumber'=>'NOT_NUMERIC',
     *          'isBetween'=>array(
     *              'msg'=>'NOT_BETWEEN',
     *              'param'=>array(1,10)
     *          )
     *      )
     * )
     */
    public function validation($values=array(),$validate=array()) {
        $err=array();
        foreach ($values as $field=>$val){
            foreach ($validate[$field] as $funcKey=>$item){                
                if(is_array($item)){                     
                    $param=array_merge(array($val),@$item['param']);
                    if(!call_user_func_array($funcKey,$param)){
                        $err[]=@$item['msg'];                        
                    };
                }
                else{
                    if(!$funcKey($val)){
                        $err[]=@$item;
                    }
                }                
            }
        }
        return $err;
    }

}
