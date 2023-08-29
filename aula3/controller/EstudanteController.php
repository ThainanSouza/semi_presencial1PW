<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/aula3/model/estudanteModel.php';

class EstudanteController
{

    public function listar()
    {
        //Instanciar a model
        //chamar o metodo listar no model
        $estudanteModel = new EstudanteModel();
        $listaEstudantes = $estudanteModel->listarModel();
        $_REQUEST['estudantes'] = $listaEstudantes;
        //renderizar a view
        //AQUI
        require_once $_SERVER['DOCUMENT_ROOT'] . '/aula3/view/listarEstudanteView.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/aula3/view/EstudanteForm.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            $estudanteModel = new EstudanteModel();
            $estudanteModel->salvarModel($nome, $idade);

            header('Location: http://localhost/aula3/?controller=Estudante&acao=listar');
            exit();
        }
    }
}