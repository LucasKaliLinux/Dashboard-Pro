
<section class="box-content EditarNoticias">
    <h2><i class="fa-solid fa-pen"></i> Editar Noticias</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="categoria">Escolha a categoria dessa noticia:</label>
            <select name="categoria" id="categoria">
                
            <?php foreach($categories as $key => $values): ?>
                <?php if($value["categoria_id"] == $values["id"]): ?>
                    <option selected value="<?= $values["id"] ?>"><?= $values["nome"] ?></option>
                <?php else: ?>
                    <option value="<?= $values["id"] ?>"><?= $values["nome"] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

            </select>
        </div>
        <div class="box-form">
            <label for="titulo">Escolha o titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $value["titulo"] ?>">
        </div>
        <div class="box-form">
            <label for="conteudo">Conteudo da noticia:</label>
            <textarea class="tinymce_area" name="conteudo" id="conteudo"><?= $value["conteudo"] ?></textarea>
        </div>
        <div class="box-form">
            <label for="upload">Capa da Noticia</label>
            <input type="file" name="imagem" id="upload">
        </div>
        <div class="box-form">
            <input type="submit" name="enviar" value="Atualizar">
        </div>
    </form>
</section>