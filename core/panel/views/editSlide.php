
<section class="box-content editSlide">
    <h2><i class="fa-solid fa-pen"></i> Editar Slide</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $value["nome"] ?>" required>
        </div>
        <div class="box-form">
            <label for="upload">Imagem:</label>
            <input type="file" name="imagem" id="upload">
        </div>
        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>