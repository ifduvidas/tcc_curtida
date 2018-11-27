<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once (realpath(dirname(__FILE__) . '/../modelos/CrudUsuarios.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/CrudPerguntas.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/CrudComentarios.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/crudRespostas.php'));
require_once (realpath(dirname(__FILE__) .  '/../modelos/BDConection.php'));
require '../visualizacao/head.php';


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao) {

    case 'index':


        include '../visualizacao/head.php';
        include '../visualizacao/index.php';
        include '../visualizacao/footer_smallpage.php';
        break;


    case 'cadastrar':
        if (!isset($_POST['gravar'])) { // se ainda nao tiver preenchido o form
            include '../visualizacao/head.php';
            include '../visualizacao/cadastro.php';
            include '../visualizacao/footer.php';

        } else {

            // depois de preencher o formulario


            if (isset($_FILES["foto_perf"])) {
                $Nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $email = $_POST['email'];
                $data_nasc = $_POST['data_nasc'];
                $atributo =  $_POST['atributo'];
                $tipo = $_POST['cod_tip'];
                
                switch ($tipo) {
                    case 'Aluno':
                        $cod_tip = '5';


                        break;

                    case'Professor':
                        $cod_tip = '4';
                        break;
                }


                $arquivo = $_FILES["foto_perf"];
                $pasta_dir = "fotos/";

                $arquivo_nome = $pasta_dir . $arquivo["name"];
                move_uploaded_file($_FILES["foto_perf"]["tmp_name"], $arquivo_nome);

                $novoUsuario = new Usuario($Nome, $senha, $email, $data_nasc, $atributo, $cod_tip);

                $crud = new CrudUsuarios();
                $crud->insertUsuario($novoUsuario, $arquivo_nome);


            };


            //header("location: Usuarios.php");
        }
        break;


    case 'login':
        if (!isset($_POST['entrar'])) { //primeiro clique - exibir formulario
            include '../visualizacao/login.php';
        } else { //depois de clicar em entrar
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $crud = new CrudUsuarios();
            $usuario = $crud->login($email, $senha);
            if ($usuario) { //se deu certo o login
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['Nome'] = $usuario['Nome'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['cod_tip'] = $usuario['cod_tip'];
                $_SESSION['turma'] = $usuario['turma'];

                header('location: Usuarios.php');
            } else {

                echo "dados incorretos";
            };
        }

        break;

    case 'logout':
        session_destroy();
        header('location: Usuarios.php');
        break;


    case 'paginaDoUsuario':

        $id_usuario = $_GET['id_usuario'];

        if (isset($_GET['cod_tip'])) {
            $cod_tip = $_GET['cod_tip'];
        } elseif ($_GET['id_usuario'] = $_SESSION['id_usuario']) {
            $cod_tip = $_SESSION['cod_tip'];
        } else {
            echo "erro";
        }


        $crud1 = new CrudUsuarios();
        $usuario = $crud1->getUsuario($id_usuario);

        $crud = new CrudPerguntas();
        $numDePergutas = $crud->getNumPerguntasFeitas($id_usuario);

        $perguntas = $crud->getPerguntasPorUsuario($id_usuario);

        $crud2 = new CrudRespostas();
        $respostas = $crud2->getPerguntaRespondidasPorProf($id_usuario);
        $numRespostas = $crud2->getNumPerguntaRespondidasPorProf($id_usuario);

        include '../visualizacao/head.php';
        include '../visualizacao/paginaUsuario.php';

        break;


    case 'deletarUsuario':
        $id_usuario = $_SESSION['id_usuario'];
        $crud1 = new CrudUsuarios();
        $delete = $crud1->DeleteUsuario($id_usuario);

        session_destroy();
        header('location: Usuarios.php');
    break;   

        case 'alterarUsuario':
        if (!isset($_POST['gravar'])) { 
            $id_usuario = $_SESSION['id_usuario'];
            $crud1 = new CrudUsuarios();
            $usuario = $crud1->getUsuario($id_usuario); 

            include '../visualizacao/head.php';
            include '../visualizacao/alterarUsuario.php';
            include '../visualizacao/footer.php';
        } else {
            $id_usuario = $_SESSION['id_usuario'];
            $Nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $data_nasc = $_POST['data_nasc'];
            $atributo =  $_POST['atributo'];
            $tipo = $_POST['cod_tip'];
                
                switch ($tipo) {
                    case 'Aluno':
                        $cod_tip = '5';


                        break;

                    case'Professor':
                        $cod_tip = '4';
                        break;
                }

            $arquivo = $_FILES["foto_perf"];
            $pasta_dir = "fotos/";

            $arquivo_nome = $pasta_dir . $arquivo["name"];
            move_uploaded_file($_FILES["foto_perf"]["tmp_name"], $arquivo_nome);
            
            $crud = new CrudUsuarios();
            $novoUsuario = new Usuario($Nome, $senha, $email, $data_nasc, $atributo, $cod_tip);

            $crud = new CrudUsuarios();
            $crud->updateUsuario($novoUsuario, $arquivo_nome,$id_usuario);
             header("location:Usuarios.php");
        }

           
    break;  


    case 'cadastrarPergunta':

        if (!isset($_POST['gravar'])) { // se ainda nao tiver preenchido o form
            include '../visualizacao/head.php';
            include '../visualizacao/cadastrarPergunta.php';
            include '../visualizacao/footer.php';
        } else {
            $data = gmdate("Y-m-d");
            $hora = gmdate("H:i:s");
            $titulo = $_POST['titulo'];
            $descricao_pergunta = $_POST['descricao_pergunta'];
            $materia = $_POST['materia'];
            $curso = $_POST['curso'];
            $id_usuario = $_SESSION['id_usuario'];

            $novaPergunta = new Pergunta($hora, $data, $descricao_pergunta, $titulo, $materia, $curso);

            $crud = new CrudPerguntas();
            $crud->insertPergunta($novaPergunta,$id_usuario);


            header('location:Usuarios.php');

        };
        break;

    case 'deletarPergunta':
        $id_pergunta = $_GET["id_pergunta"];
        $crud1 = new CrudPerguntas();
        $delete = $crud1->deletePergunta($id_pergunta);
        header('location: Usuarios.php');

        break;
    case 'busca':
        $busca = $_POST['pesquisa'];


        $crud = new CrudPerguntas();
        $perguntas = $crud->busca($busca);


        include '../visualizacao/head.php';
        include '../visualizacao/perguntasPorBusca.php';
        include '../visualizacao/footer.php';
        break;


    case 'curtir':
        $id_pergunta = $_GET['id_pergunta'];

        $crud = new CrudPerguntas();
        $pergunta = $crud->getPergunta($id_pergunta);

        $crud3 = new CrudRespostas();
        $respostas = $crud3->getRespostas($id_pergunta);

        $crud4 = new CrudComentarios();
        $comentarios = $crud4->getComentarios($id_pergunta);


        if (isset($_SESSION['id_usuario'])) {
            $id_usuario = $_SESSION['id_usuario'];
            $id_pergunta = $_GET['id_pergunta'];


            //  $novaCurtida = $crud->descurtir($id_pergunta, $id_usuario);
            $verificarCurtida = $crud->verificarCurtida($id_pergunta, $id_usuario);
            //  echo $verificarCurtida;
            if($verificarCurtida == 'true'){
                $novaCurtida = $crud->descurtir($id_pergunta, $id_usuario);;
            }elseif($verificarCurtida == 'false'){
                $novaCurtida = $crud->curtir($id_pergunta, $id_usuario);
            }

        }

        header('Location: Usuarios.php?acao=pergunta&id_pergunta=' . $id_pergunta);
        break;

    case 'pergunta':
        $id_pergunta = $_GET['id_pergunta'];
        $id_usuario = $_SESSION['id_usuario'];

        $crud = new CrudPerguntas();
        $pergunta = $crud->getPergunta($id_pergunta);

        $crud3 = new CrudRespostas();
        $respostas = $crud3->getRespostas($id_pergunta);

        $crud4 = new CrudComentarios();
        $comentarios = $crud4->getComentarios($id_pergunta);

        $numDeCurtidas = $crud->getCurtidas($id_pergunta);



        $data = gmdate("Y-m-d");

        if (isset($_POST['texto_comentario'])) {
            $texto_comentario = $_POST['texto_comentario'];
            $novoComentario = new Comentario($data, $texto_comentario, $id_usuario, $id_pergunta);

            $crud5 = new CrudComentarios();
            $crud5->insertComentario($novoComentario);
            header("Refresh: 0");
            break;
        };

        if (isset($_POST['texto_resposta'])) {
            $texto_resposta = $_POST['texto_resposta'];

            $novaResposta = new Resposta($data, $texto_resposta, $id_usuario, $id_pergunta);


            $crud6 = new crudRespostas();
            $crud6->insertResposta($novaResposta);

            if ($novaResposta) {
                $crud = new CrudPerguntas();
                $crud->updatePerguntaRespondida($id_pergunta);
                header("Refresh: 0");
                break;
            };

        }

        include '../visualizacao/head.php';
        include '../visualizacao/pergunta.php';
        include '../visualizacao/footer.php';

        break;

        case 'deletarComentario':
        $id_comentario= $_GET["id_comentario"];
        $id_pergunta = $_GET['id_pergunta'];
        $crud1 = new CrudComentarios();
        $delete = $crud1->deleteComentario($id_comentario);
        header('Location: Usuarios.php?acao=pergunta&id_pergunta=' . $id_pergunta);
        break;

        case 'deletarResposta':
        $id_resposta= $_GET["id_resposta"];
        $id_pergunta = $_GET['id_pergunta'];
        $crud1 = new crudRespostas();
        $delete = $crud1->deleteResposta($id_resposta);
        header('Location: Usuarios.php?acao=pergunta&id_pergunta=' . $id_pergunta);
        break;


    case 'listaPerguntas':
        $crud = new CrudPerguntas();

        if (isset($_GET['curso'])) {
            $curso = $_GET['curso'];
            $perguntasPorCurso = $crud->getPerguntas();
        }elseif (isset($_GET['materia'])) {
            $materia = $_GET['materia'];
            $perguntasPorMateria = $crud->getPerguntas();
        };

        if (isset($_GET['filtro']) and $_GET['filtro'] == "respondidas"){
            $perguntasRespondidas = $crud->perguntasRespondidas();

        }elseif (isset($_GET['filtro']) and $_GET['filtro'] == "maisCurtidas"){
            $perguntasMaisCurtidas = $crud->perguntasMaisCurtidas();

        }elseif (isset($_GET['filtro']) and $_GET['filtro'] == "maisComentadas"){
            $perguntasMaisComentadas = $crud->perguntasMaisComentadas();};

        include '../visualizacao/head.php';
        include '../visualizacao/listaPerguntas.php';
        include '../visualizacao/footer.php';
        break;

}


            
            
            






