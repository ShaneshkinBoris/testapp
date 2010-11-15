<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './mapper/mapper_Post.php';
require_once './mapper/mapper_Comment.php';
require_once './mapper/mapper_CommentCollection.php';
require_once './mapper/mapper_PostCollection.php';
/**
 * Description of domain_HelperFactory
 *
 * @author administrator
 */
class domain_HelperFactory
{
    static function getCollection( $type ) {
        switch( $type ) {
            case 'domain_Comment' :
                return new mapper_CommentCollection();
                break;
            case 'domain_Post' :
                return new mapper_PostCollection();
                break;
        }
    }

    static function getFinder( $type ) {
        switch( $type ) {
            case 'domain_Comment' :
                return new mapper_Comment();
                break;
            case 'domain_Post' :
                return new mapper_Post();
                break;
        }
    }
}
?>
