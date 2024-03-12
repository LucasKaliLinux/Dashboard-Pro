<?php

    namespace panel\models;

    use classes\Database;

    class TB_list{

        private Database $db;
        private int $byPagination;

        public function __construct(Database $db, int $byPagination){
            $this->db = $db;
            $this->byPagination = $byPagination;
        }

        public function ordersId(string $tb_name){
            if(isset($_GET["id"]) && isset($_GET["order"])){
                $this->order($tb_name, $_GET["id"], $_GET["order"]);
            }
        }

        public function getNumberPagesShow(string $tb_name){
            $select = $this->db->select("SELECT * FROM `$tb_name`");
            $total  = $select["rows"];

            $numberPagesShow = ceil($total / $this->byPagination);
            return $numberPagesShow;
        }

        public function getResultsList(string $tb_name): array{
            $numberPages = $this->pagination();
            
            $select = $this->db->select("SELECT * FROM `$tb_name` ORDER BY order_id ASC LIMIT $numberPages, ".$this->byPagination);
            
            return $select["result"];
        }

        public function getResultsWhereCategoria(string $tb_name, $categorie): array{
            $numberPages = $this->pagination();
            
            $select = $this->db->select("SELECT * FROM `$tb_name` WHERE categoria_id = ? ORDER BY order_id ASC LIMIT $numberPages, ".$this->byPagination, [$categorie]);
            
            return $select["result"];
        }

        public function filterGetPag(): int{
            if(isset($_GET["pages"])){
                if(is_numeric($_GET["pages"]) && $_GET["pages"] !== "0"){
                    return (int)$_GET["pages"];
                }
            }

            return 1;
        }

        public function deleteId($tb_name){
            if(isset($_GET["delete"])){
                if(is_numeric($_GET["delete"])){
                    $this->db->delete("DELETE FROM `$tb_name` WHERE id = ?", [$_GET["delete"]]);
                }
            }
        }

        public function deleteNewsId($tb_name){
            if(isset($_GET["delete"])){
                if(is_numeric($_GET["delete"])){
                    $this->db->delete("DELETE FROM `$tb_name` WHERE id = ?", [$_GET["delete"]]);
                    $this->db->delete("DELETE FROM `tb_site_noticias` WHERE categoria_id = ?", [$_GET["delete"]]);
                }
            }
        }

        private function pagination(): int{
            $getFilter = $this->filterGetPag();
            $numberPages = ($getFilter - 1) * $this->byPagination;
            return $numberPages;
        }

        private function order(string $tb_name, $id, $order){

            if(!is_numeric($id))
                return;

            $currentItem = $this->db->selectOne("SELECT * FROM `$tb_name` WHERE id = ?", [$id]);
            $currentItemResult = $currentItem["result"];
            $currentItemRows   = $currentItem["rows"];

            if($currentItemRows == 0)
                return;

            $orderID = ((int)$currentItemResult["order_id"]);

            if($order == "up"){
                $itemBefore = $this->db->selectOne("SELECT * FROM `$tb_name` WHERE order_id < $orderID ORDER BY order_id DESC LIMIT 1");
            }else if($order == "down"){
                $itemBefore = $this->db->selectOne("SELECT * FROM `$tb_name` WHERE order_id > $orderID ORDER BY order_id ASC LIMIT 1");
            }

            $itemBeforeResult = $itemBefore["result"];
            $itemBeforeRows   = $itemBefore["rows"];
            
            if($itemBeforeRows == 0)
                return;

            $this->db->update("UPDATE `$tb_name` SET `order_id` = ? WHERE id = ?", [$currentItemResult["order_id"], $itemBeforeResult["id"]]);
            $this->db->update("UPDATE `$tb_name` SET `order_id` = ? WHERE id = ?", [$itemBeforeResult["order_id"], $currentItemResult["id"]]);
        }
    }