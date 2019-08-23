<?php

require_once(__DIR__.'/../../src/Forms/Upload.php');

use PHPUnit\Framework\TestCase;

class UploadTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Upload();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('maxFileSize', Upload::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Number::class, self::$obj->maxFileSize);
    }

}