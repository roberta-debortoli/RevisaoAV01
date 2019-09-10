<?php

    include_once '../DB.php';

    class modeloEvento extends DB {

        public static $tabela = 'tb_eventos';

        public static function getEventos() {

            return parent::selectAll(self::$tabela, "ORDER BY id desc");
        }

        public static function findEvento($id) {

            return parent::selectFind(self::$tabela, $id);
        }

        public static function addEvento($dados_evento) {

            return parent::insert(self::$tabela, $dados_evento);
        }

        public static function upEvento($dados) {

            return parent::update(self::$tabela, $dados);
        }

        public static function delEvento($id) {

            return parent::delete(self::$tabela, $id);
        }
    }
