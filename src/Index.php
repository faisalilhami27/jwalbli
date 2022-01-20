<?php

namespace App;

use Unirest\Request;
use Unirest\Request\Body;

class Index
{
  protected $url;

  public function __construct()
  {
    $this->url = 'https://jsonplaceholder.typicode.com/posts';
  }

  /**
   * get data
   * @return string
   */
  public function getData()
  {
    $response = Request::get($this->url);

    if ($response->code != 200) {
      return json_encode([
        'code' => $response->code,
        'status' => 'There is an error on the server',
      ]);
    }

    $result = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Data found',
      'data' => $response->body
    ];

    return json_encode($result, JSON_PRETTY_PRINT);
  }

  /**
   * get data by id
   * @return string
   */
  public function getDataById($id)
  {
    $response = Request::get($this->url . '/' . $id);

    if ($response->code != 200) {
      return json_encode([
        'code' => $response->code,
        'status' => 'There is an error on the server',
      ]);
    }

    $result = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Data found',
      'data' => $response->body
    ];

    return json_encode($result, JSON_PRETTY_PRINT);
  }

  /**
   * store data
   * @param array|null $data
   * @return false|string
   */
  public function store(array $data = null)
  {
    $headers = array('Accept' => 'application/json');
    $body = Body::form($data);
    $response = Request::post($this->url, $headers, $body);

    if ($response->code != 200) {
      return json_encode([
        'code' => $response->code,
        'status' => 'failed',
        'message' => 'There is an error on the server'
      ]);
    }

    $result = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Data success added',
      'data' => $response->body
    ];

    return json_encode($result, JSON_PRETTY_PRINT);
  }

  /**
   * update data
   * @param array|null $data
   * @return false|string
   */
  public function update(array $data = null, $id = null)
  {
    $headers = array('Accept' => 'application/json');
    $body = Body::form($data);
    $response = Request::put($this->url . '/' . $id, $headers, $body);

    if ($response->code != 200) {
      return json_encode([
        'code' => $response->code,
        'status' => 'failed',
        'message' => 'There is an error on the server'
      ]);
    }

    $result = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Data success updated',
      'data' => $response->body
    ];

    return json_encode($result, JSON_PRETTY_PRINT);
  }

  /**
   * delete data
   * @return string
   */
  public function destroy($id)
  {
    $response = Request::delete($this->url . '/' . $id);

    if ($response->code != 200) {
      return json_encode([
        'code' => $response->code,
        'status' => 'There is an error on the server',
      ]);
    }

    $result = [
      'code' => 200,
      'status' => 'success',
      'message' => 'Data found',
      'data' => $response->body
    ];

    return json_encode($result, JSON_PRETTY_PRINT);
  }
}