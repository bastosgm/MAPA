<?php

class Courses {
  private $id;
  private $nameCourse;
  private $description;
  private $dateStart;
  private $dateFinish;
  private $status;
  private $created_at;
  private $updated_at;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNameCourse() {
    return $this->nameCourse;
  }

  public function setNameCourse($name) {
    $this->nameCourse = $name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDateStart() {
    return date("d-m-Y", strtotime($this->dateStart));
  }

  public function setDateStart($dateStart) {
    $this->dateStart = $dateStart;
  }

  public function getDateFinish() {
    return date("d-m-Y", strtotime($this->dateFinish));
  }

  public function setDateFinish($dateFinish) {
    $this->dateFinish = $dateFinish;
  }

  public function getStatus() {
    if($this->status === '1') {
      return 1;
    } else {
      return 0;
    }
  }

  public function setStatus($Status) {
    $this->status = $Status;
  }

  public function getCreatedAt() {
    return date("d-m-Y H:i", strtotime($this->created_at));
  }

  public function setCreatedAt($CreatedAt) {
    $this->created_at = $CreatedAt;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($UpdatedAt) {
    $this->updated_at = $UpdatedAt;
  }
}