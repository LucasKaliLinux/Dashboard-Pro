
<section class="box-content editDepoimento">
    <h2><i class="fa-solid fa-pen"></i> Editar Depoimento</h2>
    <form method="post">
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $value["nome"]?>" required>
        </div>
        <div class="box-form">
            <label for="depoimento">Depoimento:</label>
            <textarea name="depoimento" id="depoimento" required><?= $value["depoimento"]?></textarea>
        </div>
        <div class="box-form">
            <label for="data">Data:</label>
            <input type="text" id="data" name="data"  placeholder="dd/mm/aaaa" value="<?= $value["data"]?>" required>
        </div>
        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>