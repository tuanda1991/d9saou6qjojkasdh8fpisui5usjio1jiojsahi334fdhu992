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
    
    private $values=array(        
        array(
            'UserGroup'=>array(
                'id' => '1',
                'name' => 'Admin' 
            )           
        ),
        array(
            'UserGroup'=>array(
                'id' => '2',
                'name' => 'Guests'
            )           
        ),
    );
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
    }
    /**
     * all is a function use to get all object
     * 
     * @return array UserGroup
     */
    public function all(){
        return $this->values;
    }
    public function one($id=0){
        if($id!=0){
            foreach ($this->values as $obj){
                
            }
        }
    }
}
