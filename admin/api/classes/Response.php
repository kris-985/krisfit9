<?php

class Response
{
  private $statusCode;
  private $data;
  private $headers;

  const HTTP_OK = 200;
  const HTTP_CREATED = 201;
  const HTTP_NO_CONTENT = 204;
  const HTTP_BAD_REQUEST = 400;
  const HTTP_UNAUTHORIZED = 401;
  const HTTP_FORBIDDEN = 403;
  const HTTP_NOT_FOUND = 404;
  const HTTP_METHOD_NOT_ALLOWED = 405;
  const HTTP_INTERNAL_SERVER_ERROR = 500;

  public function __construct($statusCode = 200, $data = null, $headers = array())
  {
    $this->statusCode = $statusCode;
    $this->data = $data;
    $this->headers = $headers;
  }

  public function setStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

  public function setHeader($name, $value)
  {
    $this->headers[$name] = $value;
  }

  public function send()
  {
    http_response_code($this->statusCode);

    foreach ($this->headers as $name => $value) {
      header("$name: $value");
    }

    if ($this->data !== null) {
      echo $this->data;
    }
  }

  public function sendJson()
  {
    header("Content-Type: application/json");
    http_response_code($this->statusCode);
    $json = json_encode($this->data);
    echo $json;
    exit;
  }

  public function sendError($message, $statusCode = 500)
  {
    $this->setStatusCode($statusCode);
    $errorResponse = array('error' => $message);
    $this->setData($errorResponse);
    $this->sendJson();
  }
}