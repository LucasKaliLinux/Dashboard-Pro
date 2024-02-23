
<section class="banner">
    <div class="container">
        <form method="post" action="?pag=submitHome" id="formHome">
            <h2>Qual o seu melhor e-mail?</h2>
            <input type="email" name="email" required>
            <input type="submit" name="acao" value="Cadastra">
        </form>
    </div>
</section>

<section class="biografia" id="sobre">
    <div class="container flex">
        <div class="bio w50">
            <h2><?= $result["nome_autor"] ?></h2>
            <p><?= $result["descricao"] ?></p>
        </div>
        <div class="bioImg">
            <figure>
                <img src="assets/img/actorE.jpg" alt="Imagem do Autor">
            </figure>
        </div>
    </div>
</section>

<section class="especialidades">
    <h2 class="title">Especialidades</h2>
    <div class="container flex">
        <div class="card-single w33">
            <h1><i class="<?= $result["icone1"] ?>"></i></h1>
            <h2>CSS3</h2>
            <p><?= $result["icone_descricao1"] ?></p>
        </div>

        <div class="card-single w33">
            <h1><i class="<?= $result["icone2"] ?>"></i></h1>
            <h2>HTML5</h2>
            <p><?= $result["icone_descricao2"] ?></p>
        </div>

        <div class="card-single w33">
            <h1><i class="<?= $result["icone3"] ?>"></i></h1>
            <h2>JavaScript</h2>
            <p><?= $result["icone_descricao3"] ?></p>
        </div>
    </div>
</section>

<aside class="extras" id="servicos">
    <div class="container flex">
        <div class="depoiments w50">
            <h2>Depoimentos dos nossos clientes</h2>
            <?php foreach($depoiments as $key => $value): ?>
                <div class="box-depoi">
                    <p>" <?= $value["depoimento"]?> "</p>
                    <h3> <?= $value["nome"]?> - <?= $value["data"]?></h3>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="servicos w50">
            <h2>Serviços</h2>
            <ul>
                <?php foreach($services as $key => $value): ?>
                    <li><p><?= $value["servico"] ?></p></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>
