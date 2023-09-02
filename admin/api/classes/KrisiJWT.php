<?php

class KrisiJWT
{
  private $secretKey;

  public function __construct($secretKey)
  {
    $this->secretKey = $secretKey;
  }

  public function encode($payload, $expiration, $salt)
  {
    $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
    $payload['exp'] = $expiration;
    $encodedHeader = $this->base64UrlEncode($header);
    $encodedPayload = $this->base64UrlEncode(json_encode($payload));
    $signature = hash_hmac('sha256', "$encodedHeader.$encodedPayload.$salt", $this->secretKey, true);
    $encodedSignature = $this->base64UrlEncode($signature);
    return "$encodedHeader.$encodedPayload.$encodedSignature.$salt";
  }

  public function decode($token)
  {
    list($encodedHeader, $encodedPayload, $encodedSignature, $salt) = explode('.', $token);
    json_decode($this->base64UrlDecode($encodedHeader), true);
    $payload = json_decode($this->base64UrlDecode($encodedPayload), true);
    $signature = $this->base64UrlDecode($encodedSignature);
    
    if ($this->verifySignature("$encodedHeader.$encodedPayload.$salt", $signature)) {
        return $payload;
    } else {
      throw new \Exception("Invalid JWT signature", 401);
    }
  }

  private function base64UrlEncode($data)
  {
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
  }

  private function base64UrlDecode($data)
  {
    return base64_decode(str_replace(['-', '_'], ['+', '/'], $data));
  }

  private function verifySignature($data, $signature)
  {
    $expectedSignature = hash_hmac('sha256', $data, $this->secretKey, true);
    return hash_equals($expectedSignature, $signature);
  }
}