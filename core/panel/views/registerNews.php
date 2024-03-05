
<section class="box-content CadastraNoticias">
    <h2><i class="fa-solid fa-pen"></i> Adicionar Noticias</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="categoria">Escolha a categoria dessa noticia:</label>
            <select name="categoria" id="categoria">
                
            <?php foreach($categories as $key => $value): ?>
                <?php if($value["id"] == $recoverPost("categoria")): ?>
                    <option selected value="<?= $value["id"] ?>"><?= $value["nome"] ?></option>
                <?php else: ?>
                    <option value="<?= $value["id"] ?>"><?= $value["nome"] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

            </select>
        </div>
        <div class="box-form">
            <label for="titulo">Escolha o titulo:</label>
            <input type="text" name="titulo" id="titulo" value="<?= $recoverPost("titulo") ?>">
        </div>
        <div class="box-form">
            <label for="conteudo">Conteudo da noticia:</label>
            <textarea class="tinymce_area" name="conteudo" id="conteudo"><?= $recoverPost("conteudo"); ?></textarea>
        </div>
        <div class="box-form">
            <label for="upload">Capa da Noticia</label>
            <input type="file" name="imagem" id="upload">
        </div>
        <div class="box-form">
            <input type="submit" name="enviar" value="Criar">
        </div>
    </form>
</section>