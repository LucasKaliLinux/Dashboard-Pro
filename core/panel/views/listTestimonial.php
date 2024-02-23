
<section class="box-content tb listarDepoimentos">
    <h2><i class="fa-solid fa-clipboard-list"></i> Lista de Depoimentos</h2>
    <div class="table-wrapper">
        <table>
            <thead>
                <th>Nome</th>
                <th>Data</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>UP</th>
                <th>DOWN</th>
            </thead>
            <tbody>
                <?php foreach($depoiments as $key => $value): ?>
                    <tr>
                        <td><?= $value["nome"] ?></td>
                        <td><?= $value["data"] ?></td>
                        <td><a class="btn edit" href="?pag=editTestimonial&id=<?= $value["id"] ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                        <td><a class="btn delete" id="btn_delete_depoi" href="?pag=listTestimonial&delete=<?= $value["id"] ?>"><i class="fa fa-times"></i> Excluir</a></td>
                        <td><a class="btn anglo" href="?pag=listTestimonial&order=up&id=<?= $value["id"] ?>"><i class="fa fa-angle-up"></i></a></td>
                        <td><a class="btn anglo" href="?pag=listTestimonial&order=down&id=<?= $value["id"] ?>"><i class="fa fa-angle-down"></i></a></td>
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