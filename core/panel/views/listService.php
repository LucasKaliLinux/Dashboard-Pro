
<section class="box-content tb listarServicos">
    <h2><i class="fa-solid fa-clipboard-list"></i> Lista de Servicos</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <th>Servico</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>UP</th>
                <th>DOWN</th>
            </thead>
            <tbody>
                <?php foreach($services as $key => $value): ?>
                    <tr>
                        <td><?= $value["servico"] ?></td>
                        <td><a class="btn edit" href="?pag=editService&id=<?= $value["id"] ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                        <td><a class="btn delete" id="btn_delete_depoi" href="?pag=listService&delete=<?= $value["id"] ?>"><i class="fa fa-times"></i> Excluir</a></td>
                        <td><a class="btn anglo" href="?pag=listService&order=up&id=<?= $value["id"] ?>"><i class="fa fa-angle-up"></i></a></td>
                        <td><a class="btn anglo" href="?pag=listService&order=down&id=<?= $value["id"] ?>"><i class="fa fa-angle-down"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="paginacao">
        <?php for($i = 1; $i <= $numberPags; $i++): ?>
            <?php if($currentPag == $i): ?>
                <a class="page-selected" href="?pag=listTestimonial&pages=<?= $i ?>"><?= $i ?></a>
            <?php else: ?>
                <a class="page" href="?pag=listTestimonial&pages=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>