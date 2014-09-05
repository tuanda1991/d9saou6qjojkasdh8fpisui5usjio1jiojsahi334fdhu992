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
class PageRole extends AppModel{
    public $values= array(
        '1'=> array(
            'name'=>'Users',            
        ),
        '2'=> array(
            'name'=>'UserGoups',                      
        ),        
    ); 
    
}
