<?php
error_reporting(0);
require_once 'LogicaMatematica.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lógica Matemática</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <h1><strong>Aprenda lógica matemática</strong></h1>

        <p>
            Escreva proposições simples utilizando letras de 'a - t'.<br>
            Para conjunção use: ^<br>
            Para disjunção use: v <br>
            Para ou exclusico use: w <br>
            Para negação use: ~ <br>
            Para bicondicional use: [<br>
<!--            Para bicondicional use: ] <br>-->
        </p>
    </div>


    <form class="form-inline" action="index.php" method="post">
        <div class="form-group">
            <label for="exampleInputName2">Proposição composta:</label>
            <input type="text" class="form-control" id="" name="proposicao" placeholder="Ex: pvq^r"
                   value="<?php //echo $_POST['proposicao']; ?>">
        </div>

        <button type="submit" class="btn btn-default">Verificar</button>
    </form>

    <?php
    if (!empty($_POST['proposicao'])) :
        $logicaMatematica = new LogicaMatematica($_POST['proposicao']);

        ?>
        <table class="table table-hover">
            <thead>
            <?php foreach ($logicaMatematica->getProposicoes() as $proposicao) : ?>
                <th><?php echo $proposicao ?></th>
            <?php endforeach; ?>
            </thead>

            <tbody>

            <?php
            $qtdProp = count($logicaMatematica->getProposicoes()) - 1;
            if ($qtdProp == 1) {
                $a = $logicaMatematica->getProposicoes()[0];
                for ($$a = 0; $$a < 2; $$a++) {
                    echo "<tr>";
                    echo "<td>${$a}</td>";
                    $formula = $logicaMatematica->getResultProposicao();
                    $result = (eval("return ($formula);") == 1) ? 'V' : 'F';
                    echo "<td>".$result."</td>";
                    echo "</tr>";
                }
            }
            if ($qtdProp == 2) {
                $a = $logicaMatematica->getProposicoes()[0];
                $b = $logicaMatematica->getProposicoes()[1];
                for ($$a = 0; $$a < 2; $$a++) {
                    for ($$b = 0; $$b < 2; $$b++) {
                        echo "<tr>";
                        echo "<td>${$a}</td>";
                        echo "<td>${$b}</td>";
                        $formula = $logicaMatematica->getResultProposicao();
                        $result = (eval("return ($formula);") == 1) ? 'V' : 'F';
                        echo "<td>".$result."</td>";
                        echo "</tr>";
                    }
                }
            }
            //Este loop testa para quanto tiver 3 proposições simples
            if ($qtdProp == 3) {
                $a = $logicaMatematica->getProposicoes()[0];
                $b = $logicaMatematica->getProposicoes()[1];
                $c = $logicaMatematica->getProposicoes()[2];
                for ($$a = 0; $$a < 2; $$a++) {
                    for ($$b = 0; $$b < 2; $$b++) {
                        for ($$c = 0; $$c < 2; $$c++) {
                            echo "<tr>";
                            echo "<td>${$a}</td>";
                            echo "<td>${$b}</td>";
                            echo "<td>${$c}</td>";
                            $formula = $logicaMatematica->getResultProposicao();
                            $result = (eval("return ($formula);") == 1) ? 'V' : 'F';
                            echo "<td>".$result."</td>";
                            echo "</tr>";
                        }
                    }
                }
            }

            ?>

            </tbody>
        </table>

    <?php endif ?>


</div>


</body>
</html>