<?php

namespace NicholasBrink;

use PDO;
use PHPUnit\DbUnit\DataSet\YamlDataSet;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    use TestCaseTrait;

    protected function getConnection()
    {
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=postgres');
        return $this->createDefaultDBConnection($pdo);
    }

    protected function getDataSet()
    {
        return new YamlDataSet('./example_data.yml');
    }

    public function testMyExample()
    {
        $this->getConnection()->createDataSet();
        $conn = $this->getConnection()->getConnection();
        $query = $conn->prepare("select * from test where id = 1");
        $query->execute();
        $result = $query->fetch();

        $this->assertEquals($result['id'], 1);
        $this->assertEquals($result['content'], 'Strings are cool');
    }

    protected function tearDown()
    {
        $this->getConnection()->close();
    }
}
