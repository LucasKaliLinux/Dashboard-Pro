<section class="box-content editUser">
    <h2><i class="fa-solid fa-pen"></i> Editar Úsuario</h2>
    <form action="?pag=submitEditUser" method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $_SESSION["name"]?>" required>
        </div>
        <div class="box-form">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value="<?= $_SESSION["pass"] ?>" required>
        </div>
        <div class="box-form">
            <label for="upload">Imagem:</label>
            <input type="file" name="imagem" id="upload">
            <!-- <input type="hidden" name="imagem_atual" value="<?= $_SESSION['img']; ?>"> -->
        </div>
        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>