
<section class="box-content tb listarCategorias">
    <h2><i class="fa-solid fa-clipboard-list"></i> Gerenciar Categorias</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <th>Nome</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>UP</th>
                <th>DOWN</th>
            </thead>
            <tbody>
                <?php foreach($categories as $key => $value): ?>
                    <tr>
                        <td><?= $value["nome"] ?></td>
                        <td><a class="btn edit" href="?pag=editCategories&id=<?= $value["id"] ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                        <td><a class="btn delete" href="?pag=manageCategories&delete=<?= $value["id"] ?>" id="btn_delete_depoi"><i class="fa fa-times"></i> Excluir</a></td>
                        <td><a class="btn anglo" href="?pag=manageCategories&order=up&id=<?= $value["id"] ?>"><i class="fa fa-angle-up"></i></a></td>
                        <td><a class="btn anglo" href="?pag=manageCategories&order=down&id=<?= $value["id"] ?>"><i class="fa fa-angle-down"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginacao">
        <?php for($i = 1; $i <= $numberPags; $i++): ?>
            <?php if($currentPag == $i): ?>
                <a class="page-selected" href="?pag=manageCategories&pages=<?= $i ?>"><?= $i ?></a>
            <?php else: ?>
                <a class="page" href="?pag=manageCategories&pages=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>