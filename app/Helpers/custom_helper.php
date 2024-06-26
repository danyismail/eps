<?php

// app/Helpers/custom_helper.php

if (!function_exists('CheckDB')) {
    function CheckDB($db_conn) {
        // Your custom function logic here
        $selected = "";
    switch ($db_conn) {
        case "ra":
            return $selected = "Replica Amazon";
        case "re":
          return $selected =  "Replica EPS";
        case "da":
          return $selected =  "Digipos Amazon";
        case "de":
          return $selected =  "Digipos EPS";
    }
    }
}

if (!function_exists('FormatNumber')) {
  function FormatNumber($num) {
    return number_format($num,0, '.', '.');
  }
}

if (!function_exists('FormatNumberWithComma')) {
  function FormatNumberWithComma($num) {
    return number_format($num, 2, ',', '.');
  }
}

function CheckStatusResponAPI($statusCode) {
  if($statusCode == '403') {
    $session = session();   
    $session->remove(['data', 'isLoggedIn']);
    echo "<script type='text/javascript'> console.log('test'); location.reload(); </script>"; 
    exit;
  }
}

?>