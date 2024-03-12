
<section class="banner_2">
    <div class="container">
        <h2><i class="fa-regular fa-bell"></i></h2>
        <h2>Acompanhe as últimas <strong>noticias no portal</strong></h2>
    </div>
</section>

<section class="noticias">
    <div class="container flex">
        <div class="opcoes">
            <div class="box_option busca">
                <form method="get">
                    <label for="search"><i class="fa-solid fa-magnifying-glass"></i> Realizar uma buscar</label>
                    <input type="hidden" name="pag" value="news">
                    <input type="text" name="pesquisa" id="search" placeholder="O que desejar procurar?">
                    <input type="submit" value="Pesquisar">
                </form>
            </div>
            <div class="box_option categoria">
                <form method="get">
                    <label for="search"><i class="fa-solid fa-list"></i> Selecione a categoria</label>
                    <select name="categoria" id="categoria">
                        <option value="0">todas</option>
                    <?php foreach($categories as $key => $value): ?>
                        <option value="<?= $value["id"] ?>"><?= $value["nome"] ?></option>
                    <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <div class="box_option autor_news">
                <h3><i class="fa-solid fa-user"></i> Sobre o autor:</h3>
                <figure>
                    <img src="./painel/assets/uploads/lucas.jpg" alt="Autor Lucas">
                    <figcaption>Lucas S. da Anunciação</figcaption>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore ipsum molestiae, fugit quaerat, dolores quisquam accusamus veniam ducimus voluptatibus mollitia ad debitis, perspiciatis soluta quae minima. Delectus deleniti tenetur maiores!</p>
                </figure>
            </div>
        </div>
        <div class="posts">
            <div class="title_post">
                <?php if($categorie): ?>
                    <h2>Visualizando Posts em <span><?= $categorie["nome"] ?></span></h2>
                <?php else: ?>
                    <h2>Visualizando todos os Posts</h2>
                <?php endif; ?>
            </div>

            <?php foreach($news as $key => $value): ?>
            <div class="box_post_single">
                <div class="limit_title"><h3><?= $value["data"] ?> - <?= $value["titulo"] ?></h3></div>
                <p><?= strip_tags($value["conteudo"]) ?></p>
                <div class="btn"><a href="?pag=newsSingle&categoria_id=<?= $value["categoria_id"] ?>&news=<?= $value["slog"] ?>">Leia mais</a></div>
            </div>
            <?php endforeach; ?>

            <div class="paginacao">
                <!-- <a class="page-selected" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a> -->

            <?php for($i = 1; $i <= $numberPags; $i++): ?>
                <?php if($currentPag == $i): ?>
                    <a class="page-selected" href="?pag=news&pages=<?= $i ?>"><?= $i ?></a>
                <?php else: ?>
                    <a class="page" href="?pag=news&pages=<?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            </div>
        </div>
    </div>
</section>