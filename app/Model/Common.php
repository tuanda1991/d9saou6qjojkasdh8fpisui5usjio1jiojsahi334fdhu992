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
    
    // <editor-fold defaultstate="collapsed" desc="common variable">
    
    /**
     * this mean is model don't use any real table in database.
     * 
     * @var boolean 
     */
    public $useTable=false; 
    
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
    
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
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
    
    //</editor-fold>
    
}



