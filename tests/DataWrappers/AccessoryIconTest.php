<?php

require_once(__DIR__.'/../../src/DataWrappers/AccessoryIcon.php');

use PHPUnit\Framework\TestCase;

class AccessoryIconTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\AccessoryIcon();
        $this->values = [
            'drilldown', 'phone', 'sms', 'comment', 'email', 'email_open',
            'reply', 'calendar', 'people', 'map', 'secure', 'unlock', 'external',
            'attachment', 'download', 'upload', 'camera', 'print', 'favorite',
            'bookmark', 'share', 'rotate', 'plus', 'minus', 'button_add', 'button_remove',
            'flag', 'delete', 'reset', 'reload', 'like', 'unlike', 'checkbox',
            'checkbox_on', 'previous', 'next', 'none'
        ];
    }
    
    public function testSetters()
    {
        foreach($this->values as $value){
            $this->obj->{$value}();
            $this->assertSame($this->obj->get(), $value);
        }
    }
}