<?php

    class CursoDAO {
        private function getConexao() {
            $con = new PDO("pgsql:host=localhost;dbname=Academico;port=5432", "postgres", "postgres");
            return $con;
        }

        public function inserir($curso) {
            $con = $this->getConexao();
            $sql = 'INSERT INTO "Curso" ("nome", "area", "cargaHoraria", "dataFundacao") VALUES (?, ?, ?, ?)';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $curso->getNome());
            $stmt->bindValue(2, $curso->getArea());
            $stmt->bindValue(3, $curso->getCargaH());
            $stmt->bindValue(4, $curso->getDataF());

            $res = $stmt->execute();

            if($res) {
                $linha = $res;
                $curso->setId(intval($linha['id']));
            }else{
                echo $stmt->queryString;
                var_dump($stmt->errorInfo());
            }

            $stmt->closeCursor();
            $stmt = NULL;
            $con = NULL;
            return $res;
        }
        public function excluir($id) {
            $con = $this->getConexao();
            $sql = 'DELETE FROM "Curso" WHERE "id" = ?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $id);

            $res = $stmt->execute();

            if(!$res) {
                echo $stmt->queryString;
                var_dump($stmt->errorInfo());
            }

            $stmt->closeCursor();
            $stmt = NULL;
            $con = NULL;
            return $res;
        }
        public function busca($id) {
            $con = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" WHERE "id" = ?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $id);

            $res = $stmt->execute();

            if($res) {
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                $curso = new Curso($linha['nome'], $linha['area'], $linha['cargaHoraria'], $linha['dataFundacao']);
                $curso->setId(intval($linha['id']));
            }else{
                $curso = $res;
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }
            $stmt->closeCursor();
            $stmt = NULL;
            $con = NULL;
            return $curso;
        }
        public function lista($limit, $offset) {
            $con = $this->getConexao();
            $sql = 'SELECT * FROM "Curso" LIMIT ? OFFSET ?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $limit);
            $stmt->bindValue(2, $offset);

            $res = $stmt->execute();
            $listCursos = array();

            if($res) {
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $curso = new Curso($linha['nome'], $linha['area'], $linha['cargaHoraria'], $linha['dataFundacao']);
                    $curso->setId(intval($linha['id']));
                    array_push($listCursos, $curso);
                } 
            }
            $stmt->closeCursor();
            $stmt = NULL;
            $con = NULL;
            return $listCursos;
        }
        public function altera($curso) {
            $con = $this->getConexao();
            $sql = 'UPDATE "Curso" SET "nome" = ?, "area" = ?, "cargaHoraria" = ?, "dataFundacao" = ? WHERE "id" = ?';

            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $curso->getNome());
            $stmt->bindValue(2, $curso->getArea());
            $stmt->bindValue(3, $curso->getCargaH());
            $stmt->bindValue(4, $curso->getDataF());
            $stmt->bindValue(5, $curso->getId(), PDO::PARAM_INT);

            $res = $stmt->execute();

            if(!$res) {
                echo $stm->queryString;
                var_dump($stm->errorInfo());
            }

            $stmt->closeCursor();
            $stmt = NULL;
            $con = NULL;
            return $res;
        }
        public function salva($curso) {
            if($curso->getId() === null) {
                if($this->inserir($curso)) {
                    return true;
                }else{
                    return false;
                }
            }else{
                if($this->altera($curso)) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>