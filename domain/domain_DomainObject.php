<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface IDomainObjectCollection
{
    /**
     * Добавить доменный объект к коллекции объектов
     */
    function add(domain_DomainObject $obj);
}

interface IMapper
{
    function find( $id );
    function update( domain_DomainObject $obj );
    function insert( domain_DomainObject $obj );
}

require_once 'domain_HelperFactory.php';

/**
 * Description of domain_DomainObject
 *
 * @author administrator
 */
abstract class domain_DomainObject
{
    private $id;

    public function getId() {
        return $this->id;
    }

    public function setId( $id ) {
        $this->id = $id;
    }

    public function __construct( $id=null ) {
        $this->id = $id;
    }
    
    static function getCollection( $type ) {
        return domain_HelperFactory::getCollection( $type );
    }

    public function collection() {
        return self::getCollection( get_class($this) );
    }

    public function finder() {
        return domain_HelperFactory::getFinder( get_class($this) );
    }

    static function getFinder( $type ) {
        return domain_HelperFactory::getFinder( $type );
    }
}
?>
