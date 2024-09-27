<?php
    include_once("template/header.php");
?>
<!-- Caso o usuário tenha exito em mandar o formulário, ele será encaminhado para essa pagina -->
<body>
    <div class="email-sucess">
        <div class="email-img">
            <img src="<?= $BASE_URL ?>/images/email_sent_sucessfully.jpg" alt="Símbolo de email que foi enviado com sucesso">
        </div>
        <h1> Sua mensagem foi enviada com sucesso</h1>
        <p>Aguarde que em breve entraremos em contato </p>
    </div>

    <?php include_once("template/footer.php") ?>

</body>