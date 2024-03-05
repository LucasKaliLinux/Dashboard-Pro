
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
                    <input type="text" name="pesquisa" id="search" placeholder="O que desejar procurar?">
                    <input type="submit" value="Pesquisar">
                </form>
            </div>
            <div class="box_option categoria">
                <form method="get">
                    <label for="search"><i class="fa-solid fa-list"></i> Selecione a categoria</label>
                    <select name="categoria" id="categoria">
                        <option value="esporte">Esporte</option>
                        <option value="religioso">Religioso</option>
                        <option value="desastres">Desastres Naturais</option>
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
                <h2>Visualizando Posts em <span>Esportes</span></h2>
            </div>
            <?php for($i = 0; $i < 3; $i++): ?>
            <div class="box_post_single">
                <div class="limit_title"><h3>19/09/2008 - Conheça os eleitos para ganhar um premio inovador estamos testando para saber o comportamento do titulo</h3></div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem odio autem, perspiciatis accusantium architecto doloribus ipsam officiis voluptas, assumenda fugiat, aliquam dolor aspernatur ad distinctio. Voluptates ipsum odit illum modi corrupti illo officiis sed eligendi repellendus, natus eum expedita officia veniam tempora fugit? Quae minus possimus labore suscipit explicabo ad, deserunt eos. Magni similique exercitationem alias modi aliquam. Magni dolorum tempora in similique labore laudantium incidunt. Laudantium molestias sequi pariatur corrupti omnis fugiat earum tempore ea, obcaecati esse iusto rem, mollitia fugit. Cumque dolorem corrupti quo incidunt perferendis blanditiis, nostrum mollitia, quasi, odio placeat officiis quidem ad. Atque, a qui!</p>
                <div class="btn"><a href="#">Leia mais</a></div>
            </div>
            <?php endfor; ?>
            <div class="paginacao">
                <a class="page-selected" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
            </div>
        </div>
    </div>
</section>