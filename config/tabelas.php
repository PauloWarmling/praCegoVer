<?php

  $tbs[0] = "animais";
  $tbs[1] = "comidas";
  $tbs[2] = "gestos";

  function selectTabela(){
    echo '<select class="form-control mr-sm-2" name="tabela" id="tabela">';
    while($x < 2){
      echo '<option value="'.$tbs[$x].'" id="'.$tbs[$x].'">'.$tbs[$x].'</option>';
      $x++;
    }
    echo '</select>';
  }

?>
