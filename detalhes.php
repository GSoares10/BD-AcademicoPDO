<?php
    require_once('html/header.php');
    require_once('php/CursoDAO.php');
    require_once('php/Curso.class.php');

    $id = isset($_GET['id']);

    if($id) {
        $id = $_GET['id'];
        $cdao = new CursoDAO();
        $curso = $cdao->busca(intval($id));
    }
?>

<div class="section scrollspy center">
    <div class="container">
        <div class="card grey lighten-5 z-depth-1">
            <div class="row">
            <h2 class="indigo-text text-darken4">Detalhes - <?= $curso->getNome()." (ID:".$curso->getId().")";?></h2>
                <div class="card-action">
                    <ul>
                        <li class="indigo-text text-darken4"><?php echo "Area: ".$curso->getArea();?></li>
                        <li class="indigo-text text-darken4"><?php echo "Carga Horária: ".$curso->getCargaH();?></li>
                        <li class="indigo-text text-darken4"><?php echo "Data Fundação: ".$curso->getDataF()->format('d/m/Y');?></li>
                    </ul>
                    <a href="listaCursos.php" class="btn" role="button" aria-pressed="true"> << Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("html/footer.php");?>