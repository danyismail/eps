<?php

function CheckDB($currentDB){
    $selected = "";
    switch ($currentDB) {
      case "ra":
          return $selected = "Replica Amazon";
      case "re":
        return $selected =  "Replica EPS";
      case "da":
        return $selected =  "Digipos Amazon";
      case "de":
        return $selected =  "Digipos EPS";
      case "od":
        return $selected =  "Otodev";
      default:
        return $selected = "Replica Amazon";
  }
}