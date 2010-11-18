<?php
date_default_timezone_set('Europe/Moscow');

require_once 'domain/domain_Comment.php';
require_once 'domain/domain_Post.php';

$finder = domain_Post::getFinder( 'domain_Post' );
$post = $finder->find(9);
$post2 = $finder->find(9);
print_r($post2);








