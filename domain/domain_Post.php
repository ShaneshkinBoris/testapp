<?php
require_once 'domain_DomainObject.php';

/**
 * Пост - базовый объект области определения логики программы
 *
 * @author administrator
 */
class domain_Post extends domain_DomainObject
{
    private $id_user;
    /**
     * Имя поста/заголовок
     * @var <type>
     */
    private $name;
    /**
     * Содержание поста
     * @var <string>
     */
    private $content;

    /**
     * Дата создания поста
     * @var <string> 
     */
    private $create_date;
    /**
     * Коллекция объектов "Комментарий"
     * @var <collection>
     */
    private $comments;

    public function __construct( $id=null, $name=null, $content=null, $create_date=null, $id_user=null ) {
        parent::__construct( $id );
        $this->id_user      = $id_user;
        $this->name         = $name;
        $this->content      = $content;
        $this->create_date  = (!$create_date) ? date('d-m-y') : $create_date;
    }

    public function getName() {
        return $this->name;
    }

    public function setName( $name ) {
        $this->name = $name;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent( $content ) {
        $this->content = $content;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser( $id_user ) {
        $this->id_user = $id_user;
    }

    public function getCreateDate() {
        return $this->create_date;
    }

    public function setCreateDate( $date ) {
        $this->create_date = $date;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments( IDomainObjectCollection $comments ) {
        $this->comments = $comments;
    }

    public function addComment(domain_Comment $comment ){
        $this->getComments()->add( $comment );
        $comment->setPost( $this );
    }
}
?>
