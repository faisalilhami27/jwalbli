<?php

use App\Index;
use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
  public function testGetData()
  {
    $data = new Index();
    $decode = json_decode($data->getData(), true);
    $this->assertEquals("success", $decode['status']);
  }

  public function testGetDataById()
  {
    $data = new Index();
    $decode = json_decode($data->getDataById(1), true);
    $this->assertEquals("success", $decode['status']);
  }

  public function testStoreData()
  {
    $data = new Index();
    $decode = json_decode($data->store([
      'name' => "Testing",
      'body' => "lorem ipsum",
      'userId' => 3
    ]), true);
    $this->assertEquals("success", $decode['status']);
  }

  public function testUpdateData()
  {
    $data = new Index();
    $decode = json_decode($data->update([
      'name' => "Testing",
      'body' => "lorem ipsum 123",
      'userId' => 3
    ]), true);
    $this->assertEquals("success", $decode['status']);
  }

  public function testDeleteData()
  {
    $data = new Index();
    $decode = json_decode($data->destroy(1), true);
    $this->assertEquals("success", $decode['status']);
  }
}