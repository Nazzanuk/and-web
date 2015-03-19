<?php
/**
 * jobvite jobs class. 
 *
 */
class Jobvite_Job implements ArrayAccess {
  protected $data;
  
  public function __construct($data) {
    $this->data = $data;
    $this->data['date'] = strtotime($this->data['date']);

    //url
    $url = strtolower(preg_replace('/-+/', '-', preg_replace('/[^\wáéíóú]/', '-', $this->data['title'])));
    $this->data['url'] = $url;
  }

  public function __get($name) {
    if (array_key_exists($name, $this->data)) {
      return $this->data[$name];
    }
    throw new Jobvite_Exception("Field '$name' is not a valid property of a job.");
  }
  
  public function __set($name, $value)
  {
    throw new Jobvite_Exception("You cannot set properties on jobs.");
  }
  
  public function offsetExists($offset) {
    return array_key_exists($offset, $this->data);
  }
  
  public function offsetGet($offset) {
    return $this->$offset;
  }
  
  public function offsetSet($offset, $value) {
    $this->$offset = $value;
  }
  
  public function offsetUnset($offset) {}
}

?>