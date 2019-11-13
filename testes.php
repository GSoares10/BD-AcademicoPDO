<?php
    require_once('php/Curso.class.php');
    require_once('php/CursoDAO.php');

    $curso1 = new Curso('Informatica','Hack',9, new DateTime('07-09-2001'));
    $curso2 = new Curso('Refri','Geladeira',99, new DateTime('11-01-1010'));
    $curso3 = new Curso('TADS','Hack-Master',1000, new DateTime('01-12-2120'));
    $curso4 = new Curso('Automacao','LEGO',1, new DateTime('21-11-2001'));
    $cursoDAO = new CursoDAO();

    #INSERIR
    var_dump($cursoDAO->inserir($curso1));
    var_dump($cursoDAO->inserir($curso2));
    var_dump($cursoDAO->inserir($curso3));
    var_dump($cursoDAO->inserir($curso4));

    #EXLCUIR
    var_dump($cursoDAO->excluir(2));

    #BUSCAR
    $busca1 = $cursoDAO->busca(2);
    $busca2 = $cursoDAO->busca(3);
    var_dump($busca1);
    var_dump($busca2);

    #LISTAR
    $limit = 10;
    $offset = 0;
    $lista1= $cursoDAO->lista($limit, $offset);
    var_dump($lista1);

    #ALTERAR
    $busca1->setNome('ALTERADO');
    $busca2->setArea('OO');
    var_dump($cursoDAO->altera($busca1));
    var_dump($cursoDAO->altera($busca2));

    #SALVAR - Inserir
    $salva1 = new Curso('Teste1','Salva1',99,new DateTime('07-02-1999'));
    $salva2 = new Curso('Teste2','Salva2',188,new DateTime('17-12-2999'));
    var_dump($cursoDAO->salva($salva1));
    var_dump($cursoDAO->salva($salva2));

    #SALVAR - Alterar
    $salva3 = $cursoDAO->busca(4);
    $salva3->setNome('SalvaAlterado');
    var_dump($cursoDAO->salva($salva3));
?>