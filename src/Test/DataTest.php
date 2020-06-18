<?php
use PHPUnit\Framework\TestCase;
class DataTest extends TestCase
{
    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }
    

    /**
     * @dataProvider additionProvider
     * @test
     * key "@test" only when the function's name hasn't test<function's name>
     */
    public function testadd($a, $b, $result){
        $addObject = new App\Main\AddOPeration();
        $value = $addObject->add($a, $b);
        $this->assertSame($result, $value);
    }
}