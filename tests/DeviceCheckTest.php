<?php

namespace WeiZhang\Utilities\Tests;


use PHPUnit\Framework\TestCase;
use WeiZhang\Utilities\DeviceCheck;

class DeviceCheckTest extends TestCase
{
    /** @test */
    public function test_is_mobile()
    {
        $deviceCheck = new DeviceCheck();
        $isMobile = $deviceCheck->setServerVar([
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0',
            'HTTP_ACCEPT' => 'text/plain; q=0.5, text/html,text/x-dvi; q=0.8, text/x-c'
        ])->isMobile();
    
        $this->assertFalse($isMobile);
        
        $this->expectException(\Exception::class);
        $deviceCheck->setServerVar([])->isMobile();
    }
}