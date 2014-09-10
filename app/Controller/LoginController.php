<?php
App::uses('AppController', 'Controller');

/**
 * LoginController is a Controller use to process login page
 * 
 * @author doanhtuan1991@gmail.com
 * @copyright     never
 * @link          http://fingerprint.com.vn/
 * @package       app.Controller
 * @version       1.0
 * @since         BasicCakePHP v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class LoginController extends Controller{
    
    /**
     * Define all components will use in Controller
     * 
     * @var Components 
     */
    public $components = array('Session', 'Cookie');
    
    public $uses = array('Common','Company');
    
    /**
     * Login function used to view login page
     * 
     * @param type $language
     */
    public function index ($language='') {  
        
        //Start change language
        if(!$this->Session->read('locale')&&$language==''){
            CakeSession::write('Config.language', $language);
            $this->Session->write('locale',$this->Common->locale['default']);            
        }
        else if($language!=''&&isset($this->Common->locale[$language])){
            CakeSession::write('Config.language', $language);
            $this->Session->write('locale',$language);
        }
        //end change language        
        $this->autoLayout=FALSE;
        $this->Session->delete('User');
        if ($this->request->is('post')) {
                #print_r($this->request->data);exit;
                $this->loadModel('AdminUser');
                $userData = array();

                // Validate data
                $this->AdminUser->set($this->request->data);
                $username = $this->request->data['AdminUser']['username'];
                $userpass = $this->request->data['AdminUser']['password'];
                if (!$this->AdminUser->validates()) {
                        $this->errorMsg = $this->AdminUser->validationErrors;
                }else{
                        // Check login
                        $userData = $this->checkAdminLog($username, $userpass);
                        if ($userData) {
                            $this->Session->write('Admin', $userData['AdminUser']);
                            $this->Session->write('Admin.timeout', date("YmdHis"));
                            if($this->Session->read('returnUrl')){
                                $curentUrl = $this->Session->read('returnUrl');
                                $this->Session->delete('returnUrl');
                                $this->redirect($curentUrl);
                            }else{ // login success, redirect to medias                        
                                $this->redirect(array('controller'=>'Ads', 'action'=>'index'));
                            }						
                        }
                        else {
                                $errorMsg = __("ログインできませんでした");
                        }
                }
        }	
        //set default code  
        $code=$this->Company->one(1);
        $this->set('code',@$code['Company']['code']);
        $this->set('lang',@$this->Session->read('locale'));
    }
	
    public function checkAdminLog($username, $userpass){
            $conditions = array('AdminUser.username' => $username,
            'AdminUser.password' => md5($userpass));
            $this->loadModel('AdminUser');
            return $this->AdminUser->find('first', array('conditions'=>$conditions));

    }
    public function logout(){
            $this->Session->delete('Admin');
            $this->Session->delete('returnUrl');
            return $this->redirect(array('controller'=>'web','action' => 'login'));
    }
    
}
