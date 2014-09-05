<?php
/**
 * Common Model.
 * 
 * @copyright     Copyright (c) Fingerprint Team Foundation, Inc. (http://cakefoundation.org)
 * @link          http://fingerprint.com.vn/basic_cakephp BasicCakePHP Project
 * @package       app.Model
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class Common extends AppModel{
    public $useTable=false;
    
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
    }
    
    /**
     * this function used to get common values of page
     * 
     * @author tuanda
     * @param String $pageName this is pagename
     * @return array this is all values of page
     */
    
    public function getPageVals($pageName){
        $array=array();
        return $array;
    }
    
/*
 * @param Type [$varname] this is a param of function
 * @return Type return type of function
 * @var Type Documents the data type for a class variable or constant
 * @author Author name <author@email> Documents the author of the current element
 * @copyright Name date Documents copyright information
 * @license URL name 
 * @version Version string Provides the version number of a class or method
 * @since Documents the release version
 * @deprecated Is used to indicate which elements are deprecated and are to be removed in a future version
 * @todo Information string Documents things that need to be done to the code at a later date
 * @example /path/to/example 
 * @link URL link text 
 * @see Documents any element
 * @uses Documents how the element is used
 * @package Name of a package Documents a group of related classes and functions
 * @subpackage 
*/
    
}



