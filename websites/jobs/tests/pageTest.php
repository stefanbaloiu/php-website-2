<?php
//test for trying to see if the website is reponding properly
class HomePageTest extends \PHPUnit\Framework\TestCase{
    public function testHomePage()
    {
        $url = 'jobs.v.je';
        $response = file_get_contents($url);
        $this->assertEquals('jobs.v.je', $response);
    }
}
?>