
<section class="contato">
    <div class="container">
        <form method="post" action="?pag=submitContact">
            <div class="input-wrapper">
                <input type="text" name="nome" placeholder="Nome..." required>
            </div>

            <div class="input-wrapper">
                <input type="email" name="email" placeholder="E-mail..." required>
            </div>

            <div class="input-wrapper">
                <input type="text" id="helpTel" name="telefone" placeholder="Telefone(99 99999-9999)..." required>
            </div>

            <div class="input-wrapper">
                <textarea placeholder="Mensagem(Opcional)..." name="msg"></textarea>
            </div>

            <div class="input-wrapper">
                <input type="submit" name="acao" value="Enviar">
            </div>
        </form>
    </div>
</section>