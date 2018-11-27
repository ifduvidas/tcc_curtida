<!DOCTYPE html>
<html>
<head>
    <?php include'head.php' ?>

</head>
<body>

<?php include'menu.php' ?>

<div class="ui sixteen column divided grid">
    <div class="four wide column">
        <div class="ui secondary vertical fluid pointing menu">
            <h3  align="center">Filtrar por</h3>
            <a class="active item" href="../controlador/Usuarios.php?acao=listaPerguntas&filtro=maisCurtidas">
                Mais curtidas
            </a>
            <a class="item" href="../controlador/Usuarios.php?acao=listaPerguntas&filtro=respondidas">
                Respondidas
            </a>
            <a class="item" href="../controlador/Usuarios.php?acao=listaPerguntas&filtro=maisComentadas">
                Mais comentadas
            </a>
        </div>

        <?php
        if (isset($_SESSION['id_usuario'])) { ?>
            <h3>Não encontrou o que procurava?</h3>
            <a href="../controlador/Usuarios.php?acao=cadastrarPergunta"><h3>Crie uma pergunta!</h3></a>

        <?php	} ?>

    </div>



    <?php
    if (isset($_GET['curso'])){ ?>
        <div class="eleven wide column">
        <h1 align="center" class="ui header"> <?=$_GET['curso'];?> </h1>
   <?php } ?>

        <?php
        if (isset($_GET['curso'])){
        foreach ($perguntasPorCurso as $pergunta):
        if ($pergunta['curso'] == $curso) {
        ?>
        <div class="ui vertical segment">
            <?php if ($pergunta['status'] == "1") { ?>
                <a class="ui green right ribbon label">Respondida</a>
            <?php } ?>
            <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; "><h3><?=$pergunta['titulo']?></h3></a>
            <p> <?=$pergunta['descricao_pergunta']?> </p>
        </div>

        <?php }?>

        <?php endforeach; }?>


            <?php
            if (isset($_GET['materia'])){ ?>
            <div class="eleven wide column">
                <h1 align="center" class="ui header"> <?=$_GET['materia'];?> </h1>
                <?php } ?>

                <?php
                if (isset($_GET['materia'])){
                    foreach ($perguntasPorMateria as $pergunta):
                        if ($pergunta['materia'] == $materia) {
                            ?>
                            <div class="ui vertical segment">
                                <?php if ($pergunta['status'] == "1") { ?>
                                    <a class="ui green right ribbon label">Respondida</a>
                                <?php } ?>
                                <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; "><h3><?=$pergunta['titulo']?></h3></a>
                                <p> <?=$pergunta['descricao_pergunta']?> </p>
                            </div>

                        <?php }?>

                    <?php endforeach; }?>



                <?php if (isset($_GET['filtro'])and $_GET['filtro'] == "respondidas"){ ?>
                    <div class="eleven wide column">
                    <h1 align="center" class="ui header">Perguntas Respondidas</h1>

                        <?php
                        foreach ($perguntasRespondidas as $pergunta):?>

                            <div class="ui vertical segment">
                                <?php if ($pergunta['status'] == "1") { ?>
                                    <a class="ui green right ribbon label">Respondida</a>
                                <?php } ?>
                                <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; "><h3><?=$pergunta['titulo']?></h3></a>
                                <p> <?=$pergunta['descricao_pergunta']?> </p>
                            </div>

                        <?php endforeach
                        ?>
               <?php } ?>

                        <?php if (isset($_GET['filtro'])and $_GET['filtro'] == "maisComentadas"){ ?>
                        <div class="eleven wide column">
                            <h1 align="center" class="ui header">Perguntas Mais Comentadas</h1>

                            <?php
                            foreach ($perguntasMaisComentadas as $pergunta):?>

                                <div class="ui vertical segment">
                                    <?php if ($pergunta['status'] == "1") { ?>
                                        <a class="ui green right ribbon label">Respondida</a>
                                    <?php } ?>
                                    <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; "><h3><?=$pergunta['titulo']?></h3></a>
                                    <p> <?=$pergunta['descricao_pergunta']?> </p>
                                </div>

                            <?php endforeach
                            ?>
                            <?php } ?>


                <?php if (isset($_GET['filtro'])and $_GET['filtro'] == "maisCurtidas"){ ?>
                        <div class="eleven wide column">
                            <h1 align="center" class="ui header">Perguntas Mais Curtidas</h1>

                            <?php
                            foreach ($perguntasMaisCurtidas as $pergunta):?>

                                <div class="ui vertical segment">
                                    <?php if ($pergunta['status'] == "1") { ?>
                                        <a class="ui green right ribbon label">Respondida</a>
                                    <?php } ?>
                                    <a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; "><h3><?=$pergunta['titulo']?></h3></a>
                                    <p> <?=$pergunta['descricao_pergunta']?> </p>
                                </div>

                            <?php endforeach
                            ?>
                            <?php } ?>


        <div class="one wide column"></div>


    </div>
</div>





</body>
</html>