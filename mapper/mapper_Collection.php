<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mapper_Collection
 *
 * @author administrator
 */
abstract class mapper_Collection implements Iterator, IDomainObjectCollection
{
    private $mapper;
    private $objects = array();
    private $raw = array();
    private $total = 0;
    private $pointer;

    public function __construct( Array $raw=null, mapper_Mapper $mapper=null ) {
        if( !is_null($raw) && !is_null($mapper) ) {
            $this->raw    = $raw;
            $this->total  = count( $raw );
        }
        $this->mapper = $mapper;
    }

    abstract function targetClass();

    protected function notifyAccess() {}    

    public function add( domain_DomainObject $obj ) {
        $class = $this->targetClass();
        if( ! ($obj instanceof  $class) ) {
            throw new Exception('Это коллекция ' . $class);
        }
        $this->notifyAccess();
        $this->objects[$this->total] = $obj;
        $this->total++;
    }

    private function getRow( $num ) {
        if( $num < 0 || $num > $this->total ) {
            return null;
        }
        if( isset($this->objects[$num]) ) {
            return $this->objects[$num];
        }
        if( isset($this->raw[$num]) ) {
            $this->objects[$num] = $this->mapper->createObject( $this->raw[$num] );
            return $this->objects[$num];
        }
        return null;
    }

    public function current() {
        return $this->getRow( $this->pointer );
    }

    public function key() {
        return $this->pointer;
    }

    public function next() {
        $row = $this->getRow($this->pointer);
        if( $row ) { $this->pointer++; }
        return $row;
    }

    public function rewind() {
        $this->pointer = 0;
    }

    public function valid() {
        return ( !is_null( $this->current() ) );
    }

    public function count() {
        return $this->total;
    }

//    public function elementAt( $num ) {
//        return $this->getRow($num);
//    }
//
//    public function deleteAt( $num ) {
//
//    }



    

}
?>
