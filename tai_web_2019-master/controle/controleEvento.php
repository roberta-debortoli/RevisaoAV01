<?php

include_once '../modelo/modeloEvento.php';

class controleEvento
{
    public static function index()
    {
        echo "<script>window.location='../view/viewEventoCadastrar.php'</script>";
    }

    public static function remover($id)
    {
        $evento = modeloEvento::findEvento($id);

        if (empty($evento)) {
            echo "<script>alert('O ID informado para o Evento não existe!')</script>";
            echo "<script>window.location='viewEvento.php'</script>";
        } else {
            modeloEvento::delEvento($id);
            echo "<script>alert('Registro removido com sucesso!')</script>";
            echo "<script>window.location='viewEvento.php'</script>";
        }
    }

    public static function confirmar()
    {
        if ($_POST['nome'] != "" && $_POST['tipo'] != ""  && $_POST['data_evento'] != "") {

            // Inserir
            if (empty($_POST['id'])) {
                
                $dados_evento = array(
                    "nome" => $_POST['nome'],
                    "tipo" => $_POST['tipo'],
                    "data_evento" => $_POST['data_evento']
                );
                modeloEvento::addEvento($dados_evento);
                echo "<script>alert('Registro inserido com sucesso!')</script>";

            } else { // Alterar
                $dados_evento = array(
                    "id" => $_POST['id'],
                    "nome" => $_POST['nome'],
                    "tipo" => $_POST['tipo'],
                    "data_evento" => $_POST['data_evento']
                );
    
                modeloEvento::upEvento($dados_evento);
                echo "<script>alert('Registro alterado com sucesso!')</script>";
            }

            echo "<script>window.location='../view/viewEvento.php'</script>";
        }
    }

    public static function loadTabelaEventos()
    {
        $eventos = modeloEvento::getEventos();

        while ($objEvento = $eventos->fetchObject()) {

            echo "<tr>";
            echo "<td>" . $objEvento->id . "</td>";
            echo "<td>" . $objEvento->nome . "</td>";
            echo "<td>" . $objEvento->tipo . "</td>";
            echo "<td>" . $objEvento->data_evento . "</td>";

            echo "<td>";
            echo "<a href='viewEventoAlterar.php?id=$objEvento->id' class='btn btn-info glyphicon glyphicon-pencil' role='button'></a>";
            echo "<a href='viewEventoRemover.php?id=$objEvento->id' class='btn btn-danger glyphicon glyphicon-remove' role='button'></a>";
            echo "</td>";
            echo "</tr>";
        }
    }
}
