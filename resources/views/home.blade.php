<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Primeiro contato com laravel!</h1>
    <form action="/registrar" method="POST">
        @csrf <!--Importante para o funcionamento do formulário!-->
        <input name ="name" type="text" name="Nome" id="">
        <input name = "email" type="text" name="Email" id="">
        <input name = "senha" type="password" placeholder="Senha" name="" id="">
        <button>Registrar</button>
    </form>
</body>
</html>