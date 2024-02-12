<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
class UserTableWrapperTest extends TestCase
{
    public function testInsert()
    {
        $table = new UserTableWrapper();
        $table->insert(['id' => 1, 'name' => 'John']);

        $this->assertEquals([['id' => 1, 'name' => 'John']], $table->get());
    }

    public function testUpdate()
    {
        $table = new UserTableWrapper();
        $table->insert(['id' => 1, 'name' => 'John']);

        $result = $table->update(1, ['name' => 'Updated John']);

        $this->assertEquals(['id' => 1, 'name' => 'Updated John'], $result);
        $this->assertEquals([['id' => 1, 'name' => 'Updated John']], $table->get());
    }

    public function testDelete()
    {
        $table = new UserTableWrapper();
        $table->insert(['id' => 1, 'name' => 'John']);

        $table->delete(1);

        $this->assertEquals([], $table->get());
    }

    public function testGet()
    {
        $table = new UserTableWrapper();
        $table->insert(['id' => 1, 'name' => 'John']);

        $result = $table->get();

        $this->assertEquals([['id' => 1, 'name' => 'John']], $result);
    }

    // Тесты для методов insert, update, delete, get
}
