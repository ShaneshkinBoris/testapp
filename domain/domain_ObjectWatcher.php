<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Pattern IDENTITY MAP
 * domain_ObjectWatcher
 *
 * @author administrator
 */
class domain_ObjectWatcher {

    private $all = array();

    private static $instaice;

    private function  __construct() {}

    static function instance() {
        if(! isset( self::$instaice) ) {
            //self::$instaice = new domain_ObjectWatcher();
            self::$instaice = new self();
        }
        return self::$instaice;
    }

    private function globalKey( domain_DomainObject $obj ) {
        $key = get_class( $obj ). " . " . $obj->getId();
        return $key;
    }

    static function add( domain_DomainObject $obj ) {
        $inst = self::instance();
        print("Добавляем " . $inst->globalKey($obj));
        $inst->all[ $inst->globalKey($obj) ] = $obj;
    }

    static function exists( $classname, $id ) {
        $inst = self::instance();
        $key = $classname . " . " . $id;
        if( isset($inst->all[$key]) ) {
            print("возвращаем " . $key);
            return $inst->all[$key];
        }
        return null;
    }
}
?>
