<?php 
    use panel\classes\Office; 
?>

    <section class="box-content home">
        <h2><i class="fa fa-home"></i> Painel de controle</h2>
        <div class="flex">
            <div class="metricas_usuario_online w33">
                <h3>Usuario Online</h3>
                <h3><?= $onlineVisits ?></h3>
            </div>
            <div class="metricas_visitas w33">
                <h3>Total de Visitas</h3>
                <h3><?= $totalVisits ?></h3>
            </div>
            <div class="metricas_visitas_hoje w33">
                <h3>visitas Hoje</h3>
                <h3><?= $currentVisits ?></h3>
            </div>
        </div>
    </section>

    <section class="box-content tb">
        <h2><i class="fa-solid fa-globe"></i> Usuarios Online</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>Última Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($onlineVisitsResult as $key => $value): ?>
                    <tr>
                        <td><?=$value["ip"]?></td>
                        <td><?=$value["last_action"]?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="box-content tb">
        <h2><i class="fa-regular fa-id-badge"></i> Usuarios do Painel</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($totalUsersPanel as $key => $value): ?>
                        <tr>
                            <td><?= $value["user"]?></td>
                            <td><?= Office::getOffice($value["cargo"]);?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>