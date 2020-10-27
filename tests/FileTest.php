<?php

namespace WeiZhang\Utilities\Tests;

use PHPUnit\Framework\TestCase;
use WeiZhang\Utilities\Requests;

class FileTest extends TestCase
{
    public function test_get_size()
    {
        $file = new Requests();
        $size = $file->getDownloadSize(['https://asia.olympus-imaging.com/product/dslr/em1mk3/sample.html']);

        $this->assertIsFloat($size);
    }
}
