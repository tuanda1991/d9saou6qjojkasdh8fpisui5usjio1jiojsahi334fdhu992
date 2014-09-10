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

class Company extends AppModel {
    
    public $useTable=false;
    
    public $values=array(
        '1'=>array(            
            'id' => 1,
            'code' =>'fingerprint',
            'name'=>'Fingerprint',            
        ),        
    );
    
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
