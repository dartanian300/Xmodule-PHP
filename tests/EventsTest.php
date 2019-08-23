<?php

require_once(__DIR__.'/../src/Events.php');

use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase{
    
    public function testProperties()
    {
        $obj = new Events();
        
        $this->assertClassHasAttribute('eventName', Events::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $obj->eventName);
        
        $this->assertClassHasAttribute('targetId', Events::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $obj->targetId);
        
        $this->assertClassHasAttribute('action', Events::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $obj->action);
        
        $this->assertClassHasAttribute('useRelativePathToUpdate', Events::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, $obj->useRelativePathToUpdate);
    }
}