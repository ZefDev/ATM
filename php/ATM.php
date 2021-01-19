<?php
  /**
   *
   */
  class atm
  {
    private $array_denomination;
    private $min_nominal;

    function __construct()
    {
        $this->array_denomination = array('5' => 0, '10' => 0, '20' => 0, '50' => 0, '100' => 0, '200' => 0, '500' => 0);
        $this->sum = 0;
        $this->min_nominal = 5;
    }

    function get_array_denomination()
    {
      return $this->array_denomination;
    }
    function set_array_denomination($value)
    {
      $this->array_denomination = $value;
    }
    function get_sum()
    {
      return $this->sum;
    }
    function set_sum($value)
    {
      $this->sum = $value;
    }
    function get_min_nominal()
    {
      return $this->min_nominal;
    }
    function set_min_nominal($value)
    {
      $this->min_nominal = $value;
    }

    function validate_sum()
    {
       if (($this->sum % $this->min_nominal) == 0)
        {
          return true;
        }
        return false;
    }
    function print_error()
    {
      $min = $this->min_nominal * round($this->sum / $this->min_nominal);
      $max = ($this->min_nominal* round($this->sum / $this->min_nominal)) + $this->min_nominal;
      $string_answer = "Неверная сумма. Выберите $min или $max";
      return array('answer' => false,'text_error' =>$string_answer);
    }

    function correlate_denomination($denomination,$type_comper=0)
    {
      $name_method_comper = null;
      if ($type_comper==1) {
        $name_method_comper = "in_array";
      }
      else {
          $name_method_comper = "array_key_exists";
      }
      krsort($this->array_denomination);
      foreach ($this->array_denomination as $key => $value) {

        if (!$name_method_comper($key, $denomination)) {
          //echo "я тут работаю $name_method_comper";
          continue;
        }
        while ($this->sum-$key>=0) {
          $this->sum -= $key;
          $this->array_denomination[$key] += 1;
        }
      }
      arsort($this->array_denomination);
      return array('answer' => true,'array_denomination' =>$this->array_denomination);
    }


  }

 ?>
