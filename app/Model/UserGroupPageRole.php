<?php
App::uses('AppModel', 'Model');

/**
 * Description UserGroupPageRole Model is a model content all UserGroup_PageRole of project
 * 
 * @author doanhtuan1991@gmail.com
 * @copyright     never
 * @link          http://fingerprint.com.vn/
 * @package       app.Model
 * @version       1.0
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class UserGroupPageRole {
    
    public $useTable=false;
    
    public $values= array(         
        array(
            'UserGroupPageRole'=> array(
                'id'=>'1',
                'page_role_id'=>'1',
                'user_group_id'=>'1',
                'is_del'=>'1',
                'is_create'=>'1',
                'is_edit'=>'1',
                'is_view'=>'1',
                'is_export'=>'1',
            ),
            'UserGroupPageRole'=> array(
                'id'=>'2',
                'page_role_id'=>'2',
                'user_group_id'=>'1',
                'is_del'=>'1',
                'is_create'=>'1',
                'is_edit'=>'1',
                'is_view'=>'1',
                'is_import'=>'1',
                'is_export'=>'1',
            ),
            'UserGroupPageRole'=> array(
                'id'=>'3',
                'page_role_id'=>'2',
                'user_group_id'=>'2',
                'is_del'=>'0',
                'is_create'=>'1',
                'is_edit'=>'0',
                'is_view'=>'1',
                'is_import'=>'0',
                'is_export'=>'0',
            )
        )     
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
     * @param int $userGroupID
     * @return array UserGroup
     */
    public function all($userGroupID=0){
        $rs=array();
        if($userGroupID!=0){           
           foreach ($this->values as $obj){
                if(@$obj['UserGroupPageRole']['user_group_id']==$userGroupID){
                    $rs[]=$obj;
                }
           }           
        }
        return $rs;
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
            foreach ($this->values as $obj){
                if(@$obj['UserGroupPageRole']['id']==$id){
                    return $obj;
                }
            }            
        }
        return array();
    }    
}
