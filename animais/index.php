<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php
        require_once "banco.php";
        $campo = isset($_POST['campo'])?$_POST['campo']:"";
        $campo2 = isset($_POST['campo2'])?$_POST['campo2']:"";
        $campo3 = isset($_POST['campo3'])?$_POST['campo3']:"";
        $campo4 = isset($_POST['campo4'])?$_POST['campo4']:"";
        $campo5 = isset($_POST['campo5'])?$_POST['campo5']:"";
        $campo6 = isset($_POST['campo6'])?$_POST['campo6']:"";
        $tb_tipoAnimal = "tipoAnimal";
        $tb_carro = "carro";
        $tb_animais = "animais";
        $tb_proprietario = "proprietario";
        $tb_tipoAnimal_has_animais = "tipoAnimal_has_animais";
        $tb_carro_has_proprietario = "carro_has_proprietario";
        $pesquisa = isset($_POST['pesquisa'])?$_POST['pesquisa']:'';
        $pesquisa2 = isset($_POST['pesquisa2'])?$_POST['pesquisa2']:'';
        $pesquisa3 = isset($_POST['pesquisa3'])?$_POST['pesquisa3']:'';
        $pesquisa4 = isset($_POST['pesquisa4'])?$_POST['pesquisa4']:'';
        $pesquisa5 = isset($_POST['pesquisa5'])?$_POST['pesquisa5']:'';
        $pesquisa6 = isset($_POST['pesquisa6'])?$_POST['pesquisa6']:'';

    ?>
       <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar exclusão?")) {
                location.href = url;
            }
        }
    </script>
</head>
<body>

    <form method="post">
    <b><h4 class="center">Tipo Animal</h4></b>
    <a href="cad_tipoAnimal.php">Cadastrar</a>
                    <label>
                        <input type="radio" value="codigo" name="campo" class="with-gap" <?php if ($campo == "codigo"): echo "checked";?><?php endif ?>>
                        <span>Codigo</span>
                    </label>

                    <label>
                        <input type="radio" value="tipo" name="campo" class="with-gap" <?php if ($campo == "tipo"): echo "checked";?><?php endif ?>>
                        <span>tipo</span>
                    </label>

                     <input type="text" name="pesquisa" value="<?php echo $pesquisa ?>">

                     <button class="btn waves-effect black" name="acao" value="ok">Enviar</button>

                <table border="1">
                    <?php
                        if ($pesquisa == '') {
                            $sql = "SELECT * FROM ".$tb_tipoAnimal;
                        }
                        elseif ($campo =='codigo'){
                            $sql = "SELECT * FROM ".$tb_tipoAnimal." WHERE codigo = ".$pesquisa." order by ".$campo;
                        }
                        elseif ($campo =='tipo'){
                            $sql = "SELECT * FROM ".$tb_tipoAnimal." WHERE tipo LIKE '".$pesquisa."%' order by ".$campo;
                        }


                            ?>

                        <tr>
                            <th>Codigo</th>
                            <th>tipo</th>
                            <th>Excluir</th>
                            <th>Alterar</th>
                        </tr>

                        <?php
                            $banco = new banco;
                            $row = $banco->select($sql);
                            $cont = 0;
                            if(is_array($row))
                            while ($cont < count($row)){
                                echo "<tr>
                                        <td>".$row[$cont][0]."</td>
                                        <td>".$row[$cont][1]."</td>
                                        <td><a onclick='excluirRegistro()' href='acao.php?tabela=".$tb_tipoAnimal."&acao=excluir&codigo=".$row[$cont][0]."'><i class='material-icons'>delete</i></a></td>
                                        <td><a href='cad_tipoAnimal.php?id={$row[$cont][0]}'><i class='material-icons'>update</i></a></td>
                                      </tr>";
                                      $cont++;
                            }
                        ?>
                </table>

        <b><h4 class="center">Animais</h4></b>
    <a href="cad_animais.php">Cadastrar</a>

                    <label>
                        <input type="radio" value="codigo" name="campo3" class="with-gap" <?php if ($campo3 == "codigo"): echo "checked";?><?php endif ?>>
                        <span>Codigo</span>
                    </label>

                    <label>
                        <input type="radio" value="nome" name="campo3" class="with-gap" <?php if ($campo3 == "nome"): echo "checked";?><?php endif ?>>
                        <span>nome</span>
                    </label>

                     <label>
                        <input type="radio" value="linkImg" name="campo3" class="with-gap" <?php if ($campo3 == "linkImg"): echo "checked";?><?php endif ?>>
                        <span>linkImg</span>
                    </label>

                    <label>
                        <input type="radio" value="linkVid" name="campo3" class="with-gap" <?php if ($campo3 == "linkVid"): echo "checked";?><?php endif ?>>
                        <span>linkVid</span>
                    </label>

                    <label>
                        <input type="radio" value="tipoCodigo" name="campo3" class="with-gap" <?php if ($campo3 == "tipoCodigo"): echo "checked";?><?php endif ?>>
                        <span>tipoCodigo</span>
                    </label>

                     <input type="text" name="pesquisa3" value="<?php echo $pesquisa3 ?>">

                     <button class="btn waves-effect black" name="acao" value="ok">Enviar</button>

                <table border="1">
                    <?php
                        if ($pesquisa3 == '' or $campo3 == "") {
                            $sql = "SELECT a.codigo, nome, linkImg, linkVid, ta.tipo FROM $tb_animais a, $tb_tipoAnimal ta WHERE a.tipoCodigo=ta.codigo";
                        }


                        elseif ($campo3 =='codigo'){
                            $sql = "SELECT * FROM ".$tb_animais." WHERE codigo = ".$pesquisa3." order by ".$campo3;
                        }
                        elseif ($campo3 =='nome'){
                            $sql = "SELECT * FROM ".$tb_animais." WHERE nome LIKE '".$pesquisa3."%' order by ".$campo3;
                        }
                        elseif ($campo3 =='linkImg'){
                            $sql = "SELECT * FROM ".$tb_animais." WHERE linkImg LIKE '".$pesquisa3."%' order by ".$campo3;
                        }
                        elseif ($campo3 =='linkVid'){
                            $sql = "SELECT * FROM ".$tb_animais." WHERE linkVid LIKE '".$pesquisa3."%' order by ".$campo3;
                        }
                        elseif ($campo3 =='tipoCodigo'){
                            $sql = "SELECT * FROM ".$tb_animais." WHERE tipoCodigo LIKE '".$pesquisa3."%' order by ".$campo3;
                        }

                            ?>

                        <tr>
                            <th>Codigo</th>
                            <th>nome</th>
                            <th>linkImg</th>
                            <th>linkVid</th>
                            <th>tipoCodigo</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>

                        <?php
                            $banco = new banco;
                            $row = $banco->select($sql);
                            $cont = 0;
                            if(is_array($row))
                            while ($cont < count($row)){
                                echo "<tr>
                                        <td>".$row[$cont][0]."</td>
                                        <td>".$row[$cont][1]."</td>
                                        <td><img src='".$row[$cont][2]."' width='100px'></td>
                                        <td>-</td>
                                        <td>".$row[$cont][4]."</td>
                                        <td><a onclick='excluirRegistro()' href='acao.php?tabela=".$tb_animais."&acao=excluir&codigo=".$row[$cont][0]."'><i class='material-icons'>delete</i></a></td>
                                        <td><a href='cad_animais.php?id={$row[$cont][0]}'><i class='material-icons'>update</i></a></td>
                                      </tr>";
                                      $cont++;
                            }
                        ?>
                </table>

                    </form>
</body>
</html>
