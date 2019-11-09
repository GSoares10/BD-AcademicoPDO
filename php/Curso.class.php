<?php

    class Curso {
        private $id;
        private $nome;
        private $area;
        private $cargaHoraria;
        private $dataFundacao;

        public function __construct($nome, $area, $cargaHoraria, $dataFundacao) {
            $this->nome = $nome;
            $this->area = $area;
            $this->cargaHoraria = $cargaHoraria;
            $this->dataFundacao = $dataFundacao;
        }
        public function getId() {
            return $this->id;
        }
        public function getNome() {
            return $this->nome;
        }
        public function getArea() {
            return $this->area;
        }
        public function getCargaH() {
            return $this->cargaHoraria;
        }
        public function getDataF() {
            $data = new DateTime($this->dataFundacao);
            return $data->format('d/m/Y');
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function setArea($area) {
            $this->area = $area;
        }
        public function setCargaH($cargaHoraria) {
            $this->cargaHoraria = $cargaHoraria;
        }
        public function setDataF($dataFundacao) {
            $this->dataFundacao = $dataFundacao;
        }
    }
?>