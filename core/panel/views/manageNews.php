
<section class="box-content tb listarNoticias">
    <h2><i class="fa-solid fa-clipboard-list"></i> Gerenciar Noticias</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <th>Titulo</th>
                <th>Capa</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>UP</th>
                <th>DOWN</th>
            </thead>
            <tbody>
                <?php foreach($news as $key => $value): ?>
                    <tr>
                        <td><?= $value["titulo"] ?></td>
                        <td><img src="assets/uploads/<?= $value["capa"]?>"></td>
                        <td><?= $getCategorie($value["categoria_id"], $db) ?></td>
                        <td><a class="btn edit" href="?pag=editNews&id=<?= $value["id"] ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                        <td><a class="btn delete" id="btn_delete_depoi" href="?pag=manageNews&delete=<?= $value["id"] ?>"><i class="fa fa-times"></i> Excluir</a></td>
                        <td><a class="btn anglo" href="?pag=manageNews&order=up&id=<?= $value["id"] ?>"><i class="fa fa-angle-up"></i></a></td>
                        <td><a class="btn anglo" href="?pag=manageNews&order=down&id=<?= $value["id"] ?>"><i class="fa fa-angle-down"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginacao">
        <?php for($i = 1; $i <= $numberPags; $i++): ?>
            <?php if($currentPag == $i): ?>
                <a class="page-selected" href="?pag=manageNews&pages=<?= $i ?>"><?= $i ?></a>
            <?php else: ?>
                <a class="page" href="?pag=manageNews&pages=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>