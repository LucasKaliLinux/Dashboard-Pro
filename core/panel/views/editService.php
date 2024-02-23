
<section class="box-content editServico">
    <h2><i class="fa-solid fa-pen"></i> Editar Depoimento</h2>
    <form method="post">
        <div class="box-form">
            <label for="servico">Descreva o Serviço:</label>
            <textarea name="servico" id="servico" required><?= $value["servico"] ?></textarea>
        </div>
        <div class="box-form">
            <input type="submit" name="editar" value="Atualizar">
        </div>
    </form>
</section>