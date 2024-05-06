<?php

namespace App\Facades;

class Request
{
  private $uri;
  private $method;
  private $getParams;
  private $postParams;
  private $id;

  public function __construct()
  {
    $this->uri = $_SERVER['REQUEST_URI'];
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->getParams = $_GET;
    $this->postParams = $this->decodePostData();
    $this->id = $this->getIdFromURI();
  }

  public function getIdFromURI()
  {
    $uri = $this->getUri();
    $parts = explode('/', $uri);

    return isset($parts[2]) ? $parts[2] : null;
  }

  private function decodePostData()
  {
    $postData = $_POST;

    if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
      $postData = json_decode(file_get_contents('php://input'), true);
    }

    return $postData;
  }

  public function getUri()
  {
    return $this->uri;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getMethod()
  {
    return $this->method;
  }

  public function getGetParams()
  {
    return $this->getParams;
  }

  public function getPostParams()
  {
    return $this->postParams;
  }
}
