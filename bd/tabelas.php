<?php

  $tb_animal = "animais";
  $tb_comidas = "comidas";
  $tb_gestos = "gestos";
  $tbs[]=array('animais', 'comidas', 'gestos');
  function selectTabela(){
    echo '<select class="form-control mr-sm-2" name="tabela" id="tabela">';
    while($x < 2){
      echo '<option value="'.$tbs[$x].'" id="'.$tbs[$x].'">'.$tbs[$x].'</option>';
    }
    echo '</select>';
  }

?>
