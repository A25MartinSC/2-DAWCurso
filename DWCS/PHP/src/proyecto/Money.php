<?php
class Money
{
  private $id;
  private $concept;
  private $amount;
  private $type;
  private $date;


  function __toString()
  {
    return "<br>$this->id, $this->concept, $this->amount, $this->type, $this->date";
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getConcept()
  {
    return $this->concept;
  }

  public function setConcept($concept)
  {
    $this->concept = $concept;

    return $this;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  public function setAmount($amount)
  {
    $this->amount = $amount;

    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($date)
  {
    $this->date = $date;

    return $this;
  }
}
