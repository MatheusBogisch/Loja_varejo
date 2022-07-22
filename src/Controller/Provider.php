<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\DAO\AddressDAO;
use APP\Model\DAO\ProviderDAO;
use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;
use PDOException;

use function PHPSTORM_META\type;

require '../../vendor/autoload.php';


if (empty($_GET['operation'])) {
    Redirect::redirect('Nenhuma operação foi enviada', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        insertProvider();
        break;
    case 'list':
        listProviders();
        break;
    default:
        Redirect::redirect('A operação enviada é invalida', type: 'error');
}

function insertProvider()
{
    if (empty($_POST)) {
        session_start();
        Redirect::redirect(type: 'error', message: 'Requisição inválida!!!');
    }


    $cnpj = $_POST["cnpj"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $publicPlace = $_POST["publicPlace"];
    $streetName = $_POST["streetName"];
    $numberOfStreet = $_POST["numberOfStreet"];
    $complement = $_POST["complement"];
    $neighborhood = $_POST["neighborhood"];
    $city = $_POST["city"];
    $zipCode = $_POST["zipCode"];

    $error = array();

    if (!Validation::validateCnpj($cnpj)) {
        array_push($error, "O CNPJ deve ser preenchido corretamente!");
    }
    if (!Validation::validateName($name)) {
        array_push($error, "O nome deve ser preenchido corretamente!");
    }
    if (!empty($phone)) {
        if (!Validation::validatePhone($phone)) {
            array_push($error, "O telefone deve ser preenchido corretamente!");
        }
    }
    if (!empty($publicPlace)) {
        if (!Validation::validatePublicPlace($publicPlace)) {
            array_push($error, "O logradouro deve ser preenchido corretamente!");
        }
    }
    if (!empty($numberOfStreet)) {
        if (!Validation::validateNumberOfStreet($numberOfStreet)) {
            array_push($error, "O número do endereço deve ser preenchido corretamente!");
        }
    }
    if (!empty($complement)) {
        if (!Validation::validateComplement($complement)) {
            array_push($error, "O complemento deve ser preenchido corretamente!");
        }
    }
    if (!empty($neighborhood)) {
        if (!Validation::validateNeighborhood($neighborhood)) {
            array_push($error, "O bairro deve ser preenchido corretamente!");
        }
    }
    if (!empty($city)) {
        if (!Validation::validateCity($city)) {
            array_push($error, "A cidade deve ser preenchida corretamente!");
        }
    }
    if (!empty($zipCode)) {
        if (!Validation::validateZipCode($zipCode)) {
            array_push($error, "O CEP deve ser preenchido corretamente!");
        }
    }
    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $address = new Address(publicPlace: $publicPlace, streetName: $streetName, numberOfStreet: $numberOfStreet, complement: $complement, neighborhood: $neighborhood, city: $city, zipCode: $zipCode, id: $id = 0);
        $provider = new Provider(cnpj: $cnpj, name: $name, phone: $phone, address: $address);

        try {
            $dao = new AddressDAO();
            $result = $dao->insert($address);
            if ($result) {
                $data = $dao->findId();
                $provider->address->id = $data["id"];

                $dao = new ProviderDAO();
                $result = $dao->insert($provider);
                Redirect::redirect(message: "O fornecedor $name foi cadastrado com sucesso!");
            } else {
                Redirect::redirect("Cadastro errado");
            }
        } catch (PDOException $e) {
            Redirect::redirect("Erro inesperado", type: 'error');
        }
    }
}
function listProviders()
{
    try {
        session_start();
        $dao = new ProviderDAO();
        $providers = $dao->findAll();
        if ($providers) {
            $_SESSION['list_of_providers'] = $providers;
            header('Location:../View/list_of_Providers.php');
        } else {
            Redirect::redirect(message: ['Nenhum fornecedor cadastrado'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect('Lamento houve um erro inesperado', type: 'error');
    }
}
