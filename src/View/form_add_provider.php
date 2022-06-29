<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de varejo - cadastro de fornecedor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="../controller/Provider.php" method="POST">
        <fieldset class="p-4 m-5 border border-blue-400">
            <legend>Dados do fornecedor</legend>
            <section class="columns-2">
                <article>
                    <label for="name">Nome do fornecedor</label>
                    <input type="text" id="name" name="name" class="border border-blue-300" required minlength="5">
                </article>
                <article>
                    <label for="cnpj">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" class="border border-blue-300" required minlength="14">
                </article>
            </section>
            <section class="mt-4 columns-2">
                <article>
                    <label for="phone">Telefone</label>
                    <input type="number" id="phone" name="phone" class="border border-blue-300 " >
                </article>
            </section>
        </fieldset>
            <fieldset class="p-4 m-5 border border-blue-400">
                <legend>Endereço do fornecedor</legend>
                <section class= "mt-4 columns-3">
                    <article>
                        <label for="publicSpace">Logradouro</label>
                        <input type="text" id="publicPlace" name="publicPlace" class="border border-blue-300"  >
                    </article>
                    <article>
                        <label for="numberOfStreet">Número</label>
                        <input type="text" id="numberOfStreet" name="numberOfStreet" class="border border-blue-300" >
                    </article>
                    <article>
                        <label for="complement">Complemento</label>
                        <input type="text" id="complement" name="complement" class="border border-blue-300">
                    </article>
                </section>
                <section class="mt-4 columns-3">
                    <article>
                        <label for="neighborhood">Bairro</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="border border-blue-300">
                    </article>
                    <article>
                        <label for="city">Cidade</label>
                        <input type="text" id="city" name="city" class="border border-blue-300">
                    </article>
                    <article>
                        <label for="zipCode">CEP</label>
                        <input type="text" id="zipCode" name="zipCode" class="border border-blue-300">
                    </article>
                </section>
            </fieldset>
            <article class="flex justify-center mt-4">
                <button type="submit" class="p-4 text-white bg-blue-700 rounded">Cadastrar</button>
            </article>
</body>
</html>