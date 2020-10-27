<?php

namespace WeiZhang\Utilities\Tests;

use PHPUnit\Framework\TestCase;
use WeiZhang\Utilities\Requests;

class FileTest extends TestCase
{
    public function test_get_size()
    {
        $file = new Requests();
        $size = $file->getDownloadSize([
            'https://asia.olympus-imaging.com/content/000107506.jpg'
        ]);
        $this->assertIsFloat($size);
    }
}
