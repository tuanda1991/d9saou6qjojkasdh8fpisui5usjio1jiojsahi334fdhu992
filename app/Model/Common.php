<?php
App::uses('AppModel', 'Model');
/**
 * Common Model is a model content all common values of project
 * 
 * @author doanhtuan1991@gmail.com
 * @copyright     never
 * @link          http://fingerprint.com.vn/
 * @package       app.Model
 * @version       1.0
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class Common extends AppModel{
    
/**
* this mean is model don't use any real table in database.
* 
* @var boolean 
*/
    public $useTable=false; 
    
    public function __construct($id = false, $table = null, $ds = null){
        parent::__construct($id, $table, $ds);
    }  
}



