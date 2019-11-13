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

<div class="section scrollspy">
    <div class="row">
        <div class="col s8 l6 offset-l3 offset-s2">
            <div class="card grey lighten-5 z-depth-1">
                <div class="card-action center">
                    <h2 class="indigo-text text-darken4">Cadastro de Cursos</h2>
                </div>
                <div class="card-content">
                    <form action="cadastrar.php" method="POST">
                        <div class="input-field">
                            <input type="text" id="nome" name="nome" required="required" value="<?php if($id) echo $curso->getNome();?>">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field">
                            <input type="text" id="area" name="area" required="required" value="<?php if($id) echo $curso->getArea();?>">
                            <label for="area">Área</label>
                        </div>
                        <div class="input-field">
                            <input type="number" id="cargaHoraria" name="cargaHoraria" required="required" value="<?php if($id) echo $curso->getCargaH();?>">
                            <label for="cargaHoraria">Carga Horária</label>
                        </div>
                        <div class="input-field">
                            <input type="date" id="dataFundacao" name="dataFundacao" required="required" value="<?php if($id) echo $curso->getDataF()->format('Y-m-d');?>">
                            <label for="dataFundacao">Data Fundação</label>
                        </div>
                        <?php if($id) {?>
                        <input type="hidden" name="id" value="<?php echo $curso->getId();?>">
                        <?php }?>
                        <button class="btn center waves-effect waves-light btn-large" type="submit">
                            Cadastrar
                        </button>
                    </form>
                    <a href="listaCursos.php" class="back btn" role="button" aria-pressed="true"> << Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("html/footer.php");?>