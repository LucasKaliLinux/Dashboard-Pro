
<section class="box-content editCategories">
    <h2><i class="fa-solid fa-pen"></i> Editar Categoria</h2>
    <form method="post">
        <div class="box-form">
            <label for="categoria">Nome da categoria:</label>
            <input type="text" name="categorie" id="categoria" value="<?= $value["nome"] ?>" required>
        </div>
        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>