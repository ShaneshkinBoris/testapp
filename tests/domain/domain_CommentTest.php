<?php
require_once dirname(__FILE__) . '/../../domain/domain_Comment.php';

/**
 * Test class for domain_Comment.
 * Generated by PHPUnit on 2010-11-11 at 13:43:51.
 */
class domain_CommentTest extends PHPUnit_Framework_TestCase {

    /**
     * @var domain_Comment
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new domain_Comment;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * 
     */
    public function testSetAndGetContent() {
        $this->object->setContent('test_content');
        $this->assertEquals($this->object->getContent(),'test_content');
    }

    

    /**
     * @todo Implement testGetPost().
     */
    public function testGetPost() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testSetPost().
     */
    public function testSetPost() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetUser().
     */
    public function testGetUser() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testSetUser().
     */
    public function testSetUser() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}

?>