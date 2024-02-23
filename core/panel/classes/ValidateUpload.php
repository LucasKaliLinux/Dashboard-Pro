<?php

    namespace panel\classes;

    use classes\Database;

    class ValidateUpload implements ValidationInterface{
        public function validate(array $param, Database $db = null): bool{
            $imagem = $param["img"];
            
            $infoImagem = @getimagesize($imagem["tmp_name"]);
            
            if ($infoImagem !== false) {
                // Obtém a extensão do arquivo
                $extensao = strtolower(pathinfo($imagem["name"], PATHINFO_EXTENSION));

                // Verifica se a extensão é válida (jpeg, jpg ou png)
                if (in_array($extensao, ['jpeg', 'jpg', 'png'])) {
                    $tamanho = intval($imagem['size'] / 1024);

                    if ($tamanho < 600) {
                        return true;
                    }
                }
            }
            
            $_SESSION["error"] = "A imagem tem que ser .jpeg, .jpg ou .png com menos de 600 KB";
            return false; // Não é uma imagem válida
        }
    }