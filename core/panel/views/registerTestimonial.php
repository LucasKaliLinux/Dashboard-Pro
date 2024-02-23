
<section class="box-content CadastraDepoimento">
    <h2><i class="fa-solid fa-pen"></i> Adicionar Depoimento</h2>
    <form action="?pag=submitRegister" method="POST">
        <div class="box-form">
            <label for="nome">Nome da testemunha:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div class="box-form">
            <label for="depoimento">Depoimento:</label>
            <textarea name="depoimento" id="depoimento" required></textarea>
        </div>
        <div class="box-form">
            <label for="data">Data:</label>
            <input type="text" id="data" name="data"  placeholder="dd/mm/aaaa" required>
        </div>
        <div class="box-form">
            <input type="submit" name="enviar" value="Criar">
        </div>
    </form>
</section>

