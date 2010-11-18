<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'mapper_Mapper.php';
require_once 'mapper_PostCollection.php';
/**
 * Description of mapper_Venue
 *
 * @author administrator
 * @todo create stmt in constructor!!!???
 * @todo names of database rows
 */
class mapper_Post extends mapper_Mapper
{
    private $selectStmt;
    private $selectAllStmt;
    private $insertStmt;
    private $updateStmt;
    public function __construct() {
        parent::__construct();
        $this->selectStmt    = self::$PDO->prepare(
                                            "SELECT id_post, name, create_date, content, id_user
                                             FROM post
                                             WHERE id_post=?"
                                           );

        $this->selectAllStmt = self::$PDO->prepare(
                                            "SELECT id_post, name, create_date, content, id_user
                                            FROM post"
                                           );

        $this->insertStmt    = self::$PDO->prepare(
                                            "INSERT INTO post
                                            (name, create_date, content, id_user)
                                            values(?,?,?,?)"
                                           );

        $this->updateStmt    = self::$PDO->prepare(
                                            "UPDATE post
                                             SET name=?,create_date=?, content=?, id_user=?
                                             WHERE id_post=?"
                                           );
    }
    
    protected function doCreateObject(array $fields) {
        return new domain_Post(
                                $fields['id_post'],
                                $fields['name'],
                                $fields['content'],
                                $fields['create_date'],
                                $fields['id_user']
                              );
    }

    protected function doInsert(domain_DomainObject $obj) {
        $values = array( $obj->getName(), $obj->getCreateDate(), $obj->getContent(), $obj->getIdUser() );
        $this->insertStmt->execute( $values );
        $obj->setId( self::$PDO->lastInsertId() );
    }

    protected function selectAllStmt() {
        return $this->selectAllStmt;
    }

    protected function selectStmt() {
        return $this->selectStmt;
    }

    public function update(domain_DomainObject $obj) {
        $values = array(
                        $obj->getName(),
                        $obj->getCreateDate(),
                        $obj->getContent(),
                        $obj->getIdUser(),
                        $obj->getId(),
                  );
        $this->updateStmt->execute( $values );
    }

    protected function getCollection( Array $raw ) {
        return new mapper_PostCollection( $raw, $this );
    }

    public function findByUser( $user_id ) {
        $findstmt = self::$PDO->prepare(
                                            "SELECT id_post, name, create_date, content, id_user
                                             FROM post
                                             WHERE id_user=?"
                                           );
        $findstmt->execute( array($user_id) );
        return $this->getCollection( $findstmt->fetchAll( PDO::FETCH_ASSOC ) );
        
    }

    protected function targetClass() {
        return "domain_Post";
    }

    public function getIdSell() {
        return 'id_post';
    }

}
?>
