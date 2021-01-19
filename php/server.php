<?php
require_once 'ATM.php';

$denomination = explode(",", $_POST["in_cash"]);
$our_cash = (int) $_POST["our_cash"];

$atm = new ATM();
$atm->set_sum($our_cash);

$type_comper = 0;
$min = 5;

if (strlen($_POST["in_cash"])==0) {
  $denomination = $atm->get_array_denomination();
}
else {
  $denomination = explode(",", $_POST["in_cash"]);
  $atm->set_min_nominal(min($denomination));
  $type_comper = 1;
}

// выдаём отчет об ошибке
if(!$atm->validate_sum()){
  echo json_encode($atm->print_error());
  exit;
}

// Соотносим наминалы купюр и выводим ответ
echo json_encode($atm->correlate_denomination($denomination,$type_comper));

?>
