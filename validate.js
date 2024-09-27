/* Aqui está a validação usando jQuery, mais especificamente
usando o jQuery Validator */

$(document).ready(function(){
    $("#form-user").validate({
        rules:{ // Aplicando as regras de validação
            name: {
                required: true,
                maxlength: 100,
                minlength: 10
                
            },
            phone: {
                required: true,
                mobilePhone: true // Adicionei esse método no arquivo aditional-methods.js para validar o telefone celular

            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true,
                minlength: 10
            }
        }
    })
})