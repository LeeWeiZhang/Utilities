<?php

namespace WeiZhang\Utilities\Tests;

use PHPUnit\Framework\TestCase;
use WeiZhang\Utilities\DeviceCheck;
use WeiZhang\Utilities\WhatsApp;

class WhatsAppTest extends TestCase
{
    public function test_direct_message()
    {
    	$phoneNo = "60163716773";
    	$message = "Hi, How are you?";
        $link = WhatsApp::directMessage($phoneNo, $message);

        $this->assertEquals("https://web.whatsapp.com/send?phone={$phoneNo}&text=$message", $link);
    }
}
