<?php

function CheckDB($currentDB){
    $selected = "";
    switch ($currentDB) {
      case "ra":
          return $selected = "Amazon";
      case "re":
        return $selected =  "EPS";
      case "da":
        return $selected =  "Digipos Amazon";
      case "de":
        return $selected =  "Digipos";
      case "od":
        return $selected =  "Otodev";
      default:
        return $selected = "Amazon";
  }
}