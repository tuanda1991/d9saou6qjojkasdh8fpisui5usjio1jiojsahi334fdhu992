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
    public $uses = array('Common'); 
    
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
    }
    
    public function beforeFilter() { 
        parent::beforeFilter();        
     	// check login
        if(!$this->Session->read('Admin')) {
                $currenturl=$this->Common->getCurrentURL();                 
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
    
}
