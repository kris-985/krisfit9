<?php

function view($templateName, $data = array())
{
  extract($data);
  require 'views/' . $templateName . '.php';
}

function url_match($url)
{
  return $_SERVER["REQUEST_URI"] == $url;
}