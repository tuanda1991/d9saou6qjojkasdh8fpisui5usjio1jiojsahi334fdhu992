<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $helpers = array('Html');
    
    // <editor-fold defaultstate="collapsed" desc="common variable">   
    
    /**
     * pageVals was used for render table, action of page
     * 
     * @var Distionary 
     */
    public $pageVals=array(
            'DailyChances'=> array(
                        'pageName'=> 'デイリーチャンス',
                        'validation'=> '/daily_chances/checkData',
                        'dialog'=>array(
                            'add'=>'Add質問',
                            'edit'=>'Edit質問',
                            'search'=>'検索'
                        ),
                        'button'=>array(
                            'add'=> '/daily_chances/add/',
                            'search'=> '/daily_chances/search/',
//                            'copy'=> '/daily_chances/search/',
                            'edit'=> '/daily_chances/edit/',
                            'delete'=> '/daily_chances/delete/'
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
    
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
    }
    
    public function beforeFilter() { 
        parent::beforeFilter();        
     	// check login
        if(!$this->Session->read('Admin')) {
                $currenturl=$this->_getCurrentURL();                 
                $this->Session->write('returnUrl',$currenturl);
                if(!isset($this->request->query['ajax'])){
                    return $this->redirect(array('controller'=>'web', 'action'=>'login'));
                }
                else $rs['error']="You must Re-Login!";
        }
        else {  
                $page_url=$this->params['controller'].'/'.$this->params['action'];
                $user=$this->Session->read('Admin');
                if(!$this->checkPermission($user['id'],$page_url))
                {                    
                    $rs['error']="You don't have an access right";                    
                }
        }
        if(isset($rs)){
            header('Content-Type: application/json');
            echo json_encode($rs);
            exit();
        }
    }
    
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
