<?php
class ExPropia extends Exception
{
  function __construct($message = "Se ha producido un error")
  {
    parent::__construct($message);
  }
}
