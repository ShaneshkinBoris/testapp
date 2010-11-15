<?php

require_once 'domain_DomainObject.php';
/**
 * Description of domain_Space
 * @todo create unit tests
 * @todo create doc
 * @author administrator
 */
class domain_Comment extends domain_DomainObject
{
    private $content;

    private $user;

    private $post;

    public function __construct( $id=null, $content=null ) {
        parent::__construct( $id );
        $this->content = $content;
        $this->id_user = null;
    }

    /**
     * klhvsfvh;oeshfo
     * @return <string>
     * @assert
     * @
     */
    public function getContent() {
        return $this->content;
    }

    public function setContent( $content ) {
        $this->content = $content;
    }

    public function getPost() {
        return $this->post;
    }

    public function setPost( domain_Post $post ) {
        $this->post = $post ;
    }

    public function getUser() {
        return $this->id_user;
    }

    public function setUser( $user ) {
        $this->id_user = $user;
    }

}
?>
