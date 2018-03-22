<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 22/03/2018
 * Time: 16:58
 */

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testHello()
    {
        $_GET['name'] = 'Nico';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals(('Hello Nico'), $content);
    }
}