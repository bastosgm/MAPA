<?php

class Student {
  private $id;
  private $name;
  private $email;
  private $password;
  private $phone;
  private $course;
  private $status;
  private $created_at;
  private $updated_at;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getEmail() {
    return $this->email;
  }
  
  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPhone() {
    return $this->phone;
  }
  
  public function setPhone($phone) {
    $this->phone = $phone;
  }

  public function getCourse() {
    return $this->course;
  }
  
  public function setCourse($course) {
    $this->course = $course;
  }

  public function getStatus() {
    if($this->status === '1') {
      return 1;
    } else {
      return 0;
    }
  }
  
  public function setStatus($status) {
    $this->status = $status;
  }

  public function getCreatedAt() {
    return date('d/m/Y H:i', strtotime($this->created_at));
  }

  public function setCreatedAt($createdAt) {
    $this->created_at = $createdAt;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }
  
  public function setUpdatedAt($updatedAt) {
    $this->updated_at = $updatedAt;
  }
  
}