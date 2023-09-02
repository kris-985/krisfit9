<?php

class Post {
  private $title;
  private $image_url;
  private $text;
  private $error;
  private $id;

  public function __construct($title, $image_url, $text) {
    $this->setTitle($title);
    $this->image_url = $image_url;
    $this->setText($text);
  }

  public function setId($id) {
    if (empty($text)) {
      $this->error = "Id is required.";
    }
    $this->id = $id;
    $this->error = null;
  }

  private function setTitle($title) {
    if (empty($title)) {
      $this->error = "Title is required.";
    }
    $this->title = $title;
    $this->error = null;
  }

  private function setText($text) {
    if (empty($text)) {
      $this->error = "Text is required.";
    }
    $this->text = $text;
    $this->error = null;
  }

  public function create() {
    global $db;
    $data = array(
      "title" => $this->title,
      "image_url" => $this->image_url,
      "text" => $this->text,
    );
    $db->insert("posts", $data);
    $this->id = $db->lastInsertedId();
  }

  public function edit() {
    global $db;
    $data = array(
      "title" => $this->title,
      "image_url" => $this->image_url,
      "text" => $this->text,
    );
    $id = $this->id;
    $db->update("posts", $data, "id = $id;");
  }

  public function byId() {
    global $db;
    $params = array(":id" => $this->id);
    $items = $db->select("SELECT * FROM posts WHERE id = :id;", $params);
    return $items[0];
  }

  public static function getItems() {
    global $db;
    $items = $db->select("SELECT * FROM posts;");
    return $items;
  }

  public static function getItem($id) {
    global $db;
    $params = array(":id" => $id);
    $items = $db->select("SELECT * FROM posts WHERE id = :id;", $params);
    if (count($items) > 0) {
      return $items[0];
    }
  }

  public static function deleteItem($id) {
    global $db;
    $params = array(":id" => $id);
    $db->select("DELETE FROM posts WHERE id = :id;", $params);
  }
}