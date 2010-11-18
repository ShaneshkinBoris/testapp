<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mapper_Collection.php';
/**
 * Description of mapper_PostCollection
 *
 * @author administrator
 */
class mapper_PostCollection extends mapper_Collection
{
    public function targetClass() {
        return 'domain_Post';
    }

}
?>
