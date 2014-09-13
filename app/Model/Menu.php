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

class Menu extends AppModel {
    
    public $useTable=false;
    
    public $values=array(
        'Dashboard'=>array(            
            array(
                'gName' => 'Posts',
                'subMenu' => array(
                    array('link' => 'posts/index', 'name' => 'Posts List'),
                    array('link' => 'posts/add', 'name' => 'New Post'),                    
                )
            ),
            array(
                'gName' => 'Users',
                'subMenu' => array(
                    array('link' => 'users', 'name' => 'Users List'),
                    array('link' => 'users/add', 'name' => 'New User'),
                ),
            ),
        ),        
    );
}
