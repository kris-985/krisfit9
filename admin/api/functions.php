<?php

function view($templateName, $data = array())
{
  extract($data);
  require 'views/' . $templateName . '.php';
}