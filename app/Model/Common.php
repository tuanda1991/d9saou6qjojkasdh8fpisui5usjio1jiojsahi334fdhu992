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
    
    // <editor-fold defaultstate="collapsed" desc="common variable">   
    /**
     * $locale is a value use to multi Language
     * 
     * @var list 
     */
    public $locale=array(
        'default'=>array( 
            'id'=> 'vie',
            'name' => 'default'
        ),
        'vie'=>array( 
            'id'=> 'vie',
            'name' => 'Vietnamese'
        ),
        'eng'=>array( 
            'id'=> 'eng',
            'name' => 'English'
        ),
    );
    //@todo check validate for login
    /**
     *
     * @var type 
     */
    public $loginValidate=array(
        'txtCode'=>array('notNull','codeIsExist'),
        'txtEmail'=>array('notNull','IsEmail'),
        'txtPass'=>array('notNull')
    );


    /**
     * pageVals was used for render table, action of page
     * 
     * @var Distionary 
     */
    public $pageVals=array(
            'Users'=> array(
                    'pageName'=> 'Users List',
                    'validation'=> '/users/checkData',
                    'dialog'=>array(
                        'add'=>'New User',
                        'edit'=>'Edit User',
                        'Filter'=>'Filter User'
                    ),
                    'button'=>array(
                        'add'=> '/users/add/',
                        'filter'=> '/users/filter/',
                        'copy'=> '/users/copy/',
                        'edit'=> '/users/edit/',
                        'delete'=> '/users/delete/'
                    ),
                    'table'=>array(
                        'title'=>'デイリーチャンス',
                        'obj_name'=>'Question',
                        'primary'=>'question_id',
                        'fields'=>array(
                            'question_id'=>array('header' => 'ID','width'=>'5%'),
                            'question'=>array('header' => '質問','width'=>'20%'),
                            'sort_id'=>array('header' => 'ソートID','width'=>'5%'),
                            'date'=>array('header' => '日時','width'=>'10%'),
                            'point'=>array('header' => 'ポイント','width'=>'5%'),
                            'answers'=>array('header' => '回答','width'=>'20%'),
                            'created'=>array('header' => '更新日時','width'=>'10%'),
                            'modified'=>array('header' => '作成日時','width'=>'10%'),
                        )
                    )        
            ),        
    );

    //</editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="common function">
    
    /**
     * getCurrentURL used to get current url
     * 
     * @author doanhtuan1991@gmail.com
     * @param type $onlyRoot
     * @return string
     */
    public function getCurrentURL($onlyRoot='')
    {
        $currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $currentURL .= $_SERVER["SERVER_NAME"];

        if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
        {
            $currentURL .= ":".$_SERVER["SERVER_PORT"];
        }
        if($onlyRoot==''){
            $currentURL .= $_SERVER["REQUEST_URI"];
        }
        return $currentURL;
    }
    
    /**
     * shortcutString is a function used to get shortcut
     * 
     * @author doanhtuan1991@gmail.com
     * @param string $str
     * @param int $max this is max length of Return-String
     * @param bit $isHover if you want show tooltip when user hover it, you need set 1 else 0
     * @return string
     */    
    public function shortcutString($str="",$max=15,$isHover=1){
        $item=$str;        
        if(strlen($item)<$max) return $item;                                                               
        if($isHover!=1)
        {
            return substr(htmlentities($item), 0,$max)." (...)";
        }
        return '<a title="'.htmlentities($item).'" >'.substr(htmlentities($item), 0,$max)." (...)</a>";
    }
    
    /**
     * checkPermission is a function used to check user have right to access this action
     * 
     * alway check before excure any function,
     * 
     * @param type $userID
     * @param type $pageRoleID
     */
    public function checkPermission($userID=0,$pageUrl=''){
        if($userID!=0&&$pageUrl!=""){
            return true;
        }
        return FALSE;
    }
    
    //</editor-fold>
    
}



