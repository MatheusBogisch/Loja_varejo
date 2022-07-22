<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de fornecedores</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 class="my-4 text-3xl font-bold text-center text-blue-800">Lista de fornecedores</h1>
    <table class="m-auto">
        <thead class="p-4 text-white bg-blue-400">
            <th>CNPJ</th>
            <th>Nome do fornecedor</th>
            <th>Contato do fornecedor</th>
            <th>ID do endereço</th>
        </thead>
        <tbody>
            <?php
                session_start();
                    foreach($_SESSION['list_of_providers'] as $provider):
             ?>       
            <tr>
                <td>
                    <?= $provider['cnpj']?>
                </td>
                <td>
                    <?= $provider['provider_name']?>
                </td>
                <td>
                    <?= $provider['phone']?>
                </td>
                <td>
                    <?= $provider['address_code'] ?>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>