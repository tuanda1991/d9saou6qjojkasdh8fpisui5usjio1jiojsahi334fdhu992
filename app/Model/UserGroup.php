<?php
App::uses('AppModel', 'Model');
/**
 * Description PageRole Model is a model content all page of project
 * 
 * @author doanhtuan1991@gmail.com
 * @copyright     never
 * @link          http://fingerprint.com.vn/
 * @package       app.Model
 * @version       1.0
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
class UserGroup extends AppModel {
    
    public $useTable=false;
    
    /**
     * $values is store all value of this object
     * 
     * @author doanhtuan1991@gmail.com
     * @var array UserGroup 
     */
    private $values=array(        
        '1' => array(
            'UserGroup'=>array(
                'id' => '1',
                'name' => 'Admin' 
            )           
        ),
        '2' => array(
            'UserGroup'=>array(
                'id' => '2',
                'name' => 'Guests'
            )           
        ),
    );
    
    /**
     * 
     * @param type $id
     * @param type $table
     * @param type $ds
     */
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
    }
    
    /**
     * all is a function use to get all object
     * 
     * @author doanhtuan1991@gmail.com
     * @return array UserGroup
     */
    public function all(){
        return $this->values;
    }
    
    /**
     * one is a function use to get a object have id = $id
     * 
     * @author doanhtuan1991@gmail.com
     * @param int $id
     * @return array
     */
    public function one($id=0){
        if($id!=0){            
            return $values[$id];        
        }
        return array();
    }
}
