<?php
  use panel\classes\Office;
?>

<aside class="sidebar" id="sidebar">
    <div class="perfil">
        <div class="close_menu" id="menuClose">
            <i class="fa fa-close"></i>
        </div>
        <a href="?pag=home" style="color: black;">
            <img src="assets/uploads/<?= $_SESSION["img"] ?>">
        </a>
        <h2><?= $_SESSION["name"]  ?></h2>
        <h2><?= $_SESSION["office"]?></h2>
    </div>
    <ul class="items-menu">
        <h2>Cadastro</h2>
        <li><a href="?pag=registerTestimonial">Cadastra Depoimento</a></li>
        <li><a href="?pag=registerService">Cadastra Servico</a></li>
        <li><a href="?pag=registerSlide">Cadastra Slide</a></li>
        <h2>Gestão</h2>
        <li><a href="?pag=listTestimonial">Lista Depoimentos</a></li>
        <li><a href="?pag=listService">Lista Serviços</a></li>
        <li><a href="?pag=listSlide">Lista Slides</a></li>
        
        <?php if(Office::getPermission(OFFICE_ADMIN)): ?>
            <h2>Administração</h2>
            <li><a href="?pag=addUser">Adicionar Usuario</a></li>
            <li><a href="?pag=editUser">Editar Usuario</a></li>
        <?php endif; ?>

        <?php if(Office::getPermission(OFFICE_SUBADMIN)): ?>
            <h2>configuração Geral</h2>
            <li><a href="?pag=editGeneral">Editar Geral</a></li>
        <?php endif; ?>
    </ul>
</aside>
