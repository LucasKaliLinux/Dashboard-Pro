
<section class="box-content CadastraUser">
    <h2><i class="fa-solid fa-pen"></i> Cadastrar Úsuario</h2>
    <form action="?pag=submitAddUser" method="post" enctype="multipart/form-data">
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="box-form">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="box-form">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div class="box-form">
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo">
                <option selected disabled>Selecione um cargo</option>
                <option value="<?= OFFICE_COLLABORATOR?>">Colaborador</option>
                <option value="<?= OFFICE_SUBADMIN?>">Sub Administrador</option>
                <option value="<?= OFFICE_ADMIN?>">Administrador</option>
            </select>
        </div>
        <div class="box-form">
            <label for="upload">Imagem:</label>
            <input type="file" name="imagem" id="upload">
        </div>
        <div class="box-form">
            <input type="submit" name="cadastra" value="Criar">
        </div>
    </form>
</section>