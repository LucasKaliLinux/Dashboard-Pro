
<section class="box-content CadastraSlide">
    <h2><i class="fa-solid fa-pen"></i> Adicionar Slide</h2>
    <form action="?pag=submitSlide" method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="nome">Nome do slide:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div class="box-form">
            <label for="upload">Imagem:</label>
            <input type="file" name="imagem" id="upload" required>
        </div>
        <div class="box-form">
            <input type="submit" name="enviar" value="Criar">
        </div>
    </form>
</section>