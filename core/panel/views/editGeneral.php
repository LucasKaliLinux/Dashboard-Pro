
<section class="box-content EditarGeral">
    <h2><i class="fa-solid fa-pen"></i> Editar Estrutura do site em geral</h2>
    <form method="post">
        <div class="titulo"><hr><h2>Área de Cabecalho</h2></div>
        <div class="box-form">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $result["titulo"]?>">
        </div>
        
        <div class="titulo"><hr><h2>Área de Autor</h2></div>
        <div class="box-form">
            <label for="autor">Autor:</label>
            <input type="text" name="nome_autor" id="autor" value="<?= $result["nome_autor"]?>">
        </div>
        <div class="box-form">
            <label for="descricao">Descrição do Autor:</label>
            <textarea name="descricao" id="descricao"><?= $result["descricao"]?></textarea>
        </div>

        <div class="titulo"><hr><h2>Área de Especificações - 1° card</h2></div>
        <div class="box-form">
            <label for="icone1">Icone: </label>
            <input type="text" name="icone1" id="icone1" value="<?= $result["icone1"]?>">
        </div>
        <div class="box-form">
            <label for="icone_descricao1">Descrição do Icone:</label>
            <textarea name="icone_descricao1" id="icone_descricao1"><?= $result["icone_descricao1"]?></textarea>
        </div>

        <div class="titulo"><hr><h2>Área de Especificações - 2° card</h2></div>
        <div class="box-form">
            <label for="icone2">Icone: <i id="input-icon2"></i></label>
            <input type="text" name="icone2" id="icone2" value="<?= $result["icone2"]?>">
        </div>
        <div class="box-form">
            <label for="icone_descricao2">Descrição do Icone:</label>
            <textarea name="icone_descricao2" id="icone_descricao2"><?= $result["icone_descricao2"]?></textarea>
        </div>

        <div class="titulo"><hr><h2>Área de Especificações - 3° card</h2></div>
        <div class="box-form">
            <label for="icone3">Icone: <i id="input-icon3"></i></label>
            <input type="text" name="icone3" id="icone3" value="<?= $result["icone3"]?>">
        </div>
        <div class="box-form">
            <label for="icone_descricao3">Descrição do Icone:</label>
            <textarea name="icone_descricao3" id="icone_descricao3"><?= $result["icone_descricao3"]?></textarea>
        </div>

        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>