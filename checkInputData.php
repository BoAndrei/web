<?php
  function sanitize($data) {
    $data = trim($data);
    $data = strip_tags($data);
    return $data;
}

function sanitizeNumber($number){
    $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    return $number;
}


?>
