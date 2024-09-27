<?php
include_once("template/header.php"); // O template do header está nesse arquivo
include_once ("email.php"); // A validação PHP e envio com PHP Mailer está nesse arquivo

?>
   
<body>

    <main>
        <div class="content-name">
            <h2> Nome: </h2>
            <p> Gabriel Henrique </p>
        </div>
        <div class="content-form">
            <h2> Mensagem </h2>
            <form action="<?= $BASE_URL ?>" id="form-user" name="form-user" method="POST">
                <div class="input-wrapper">
                    <label for="name" id="label-name"> Nome*</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="input-wrapper">
                    <label for="phone" id="label-phone"> Telefone*</label>
                    <input type="tel" name="phone" id="phone" required>
                </div>
                <div class="input-wrapper">
                    <label for="email" id="label-email"> Email*</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="input-wrapper">
                    <label for="message" id="label-message"> Mensagem*</label>
                    <textarea name="message" rows="8" cols="48" id="message" required></textarea>
                </div>
                <!-- Caso tenha erros no preenchimento de algum campo (Validação do PHP), será exibido o erro que está
                 armazenado no array $error-->
                <?php if(!empty($error)) 
                {
                    foreach($error as $msg)
                    {
                        echo "<p> * $msg </p>";
                    }
                }               
                
                ?>
                <div class="input-wrapper">
                    <input type="submit" value="Enviar Mensagem" id="submit" name="submit">
                </div>
                
            </form>
            
        </div>

        <?php include_once("template/footer.php") ?> <!--O template do footer está nesse arquivo -->
    </main>
    
    <script src="<?= $BASE_URL ?>/js/validate.js"></script> <!-- Aqui está o código que leva à validação
    do formulário usando jQuery -->
</body>


</html>