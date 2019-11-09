<?php
require_once('php/CursoDAO.php');    
$id = $_GET['id'];
$cdao = new CursoDAO();

if($id!==null)    $cdao->excluir($id);

header("Location: listaCursos.php");

?>