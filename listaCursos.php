<?php
    require_once('html/header.php');
    require_once('php/CursoDAO.php');
    require_once('php/Curso.class.php');

    $cdao = new CursoDAO();
    $listCursos = $cdao->lista(10, 0);
?>

<div class="section scrollspy center">
    <div class="container">
        <div class="card grey lighten-5 z-depth-1">
            <div class="row">
                <div class="card-action">
                    <div class="list col s12">
                        <table class="tabela striped highlight centered">
                        <h2 class="indigo-text text-darken4">
                            Lista de Cursos
                        </h2>
                        <thead>
                            <th class="indigo-text text-darken2">Id</th>
                            <th class="indigo-text text-darken2">Nome</th>
                            <th class="indigo-text text-darken2">Opções</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($listCursos as $curso) {
                            ?>
                            <tr>
                                <td> <?php echo $curso->getId(); ?> </td>
                                <td> <?php echo $curso->getNome(); ?></td>
                                <td>
                                    <a href="cadastro.php?id=<?php echo $curso->getId(); ?>" class="btn">Editar</a>
                                    <a href="excluir.php?id=<?php echo $curso->getId(); ?>" class="btn">Excluir</a>
                                    <a href="detalhes.php?id=<?php echo $curso->getId(); ?>" class="btn">Detalhes</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        </table>
                        <a href="cadastro.php" class="btn reg" role="button" aria-pressed="true">Inserir Curso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("html/footer.php");?>