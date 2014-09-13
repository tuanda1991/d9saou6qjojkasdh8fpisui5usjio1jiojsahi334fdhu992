<?php

App::uses('Controller', 'Controller');

/**
 * AppController is a parent Controller of all others
 * 
 * @author doanhtuan1991@gmail.com
 * @copyright     never
 * @link          http://fingerprint.com.vn/
 * @package       app.Controller
 * @version       1.0
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class AppController extends Controller {
    
    public $helpers = array('Html');
    public $uses = array('Common'); 
    
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
    }
    
    /**
     * 
     * beforeFilter is a function run before call action in all controller
     * 
     * @return void
     */
    public function beforeFilter() { 
        parent::beforeFilter();        
     	// check login
        if(!$this->Session->read('Admin')) {                
                if(!isset($this->request->query['ajax'])){                    
                      $currenturl=$this->Common->getCurrentURL();                 
                      $this->Session->write('returnUrl',$currenturl);
                      return $this->redirect(array('controller'=>'login', 'action'=>'index'));                    
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
    
}
