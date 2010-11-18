<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mapper_AbstractMapper
 *
 * @author administrator
 */
require_once './domain/domain_ObjectWatcher.php';
/**
 * Реализует ORM уровень, шаблон Data Mapper, точка где объекты приложения преобразуются в строки таблиц БД
 * abstract class mapper_AbstractMapper
 */
abstract class mapper_Mapper {

    protected static $PDO;

    public function __construct() {
        if (!isset(self::$PDO)) {
            /**
             * @todo Application Registry
             */
            $dsn = "mysql:host=localhost;dbname=test";
            self::$PDO = new PDO($dsn, 'root', '517671');
            self::$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        
    }

    public function find( $id ) {

        $old = $this->getFromMap( $id );
        if( $old ) return $old;

        $this->selectStmt()->execute( array($id) );
        $array = $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();
        if (!is_array($array)) {
            return null;
        }
        $object = $this->createObject( $array );
        return $object;
    }

    public function findAll()
    {   
        $this->selectAllStmt()->execute( array() );
        return $this->getCollection( $this->selectAllStmt()->fetchAll( PDO::FETCH_ASSOC ) );
    }


    public function createObject($array) {

        $old = $this->getFromMap( $array[ $this->getIdSell() ] );
        if( $old ) return $old;

        $obj = $this->doCreateObject( $array );

        $this->addToMap( $obj );
        return $obj;
    }

    public function insert(domain_DomainObject $obj) {
        $targetClass = $this->targetClass();
        if (!$obj instanceof $targetClass) {
            throw new Exception();
        }
        return $this->doInsert($obj);
    }

    abstract function getIdSell();

    protected abstract function getCollection(array $raw);

    abstract function update(domain_DomainObject $obj);

    protected abstract function selectStmt();

    protected abstract function selectAllStmt();

    protected abstract function targetClass();

    protected abstract function doInsert(domain_DomainObject $obj);

    /**
     * Template Method
     * overridden in parent class
     */
    protected abstract function doCreateObject(Array $fields);

    private function getFromMap( $id ) {
        return domain_ObjectWatcher::exists($this->targetClass(), $id);
    }

    private function addToMap( domain_DomainObject $obj ) {
        return domain_ObjectWatcher::add( $obj );
    }
}

?>
