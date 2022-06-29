<?php

namespace APP\Model;

class Validation
{
    public static function validateName(string $name): bool
    {
        return mb_strlen($name) > 2;
    }

    public static function validateNumber(float $number)
    {
        return $number > 0;
    }

    public static function validateCnpj(string $cnpj)
    {
        return mb_strlen($cnpj ) == 14;
    }

    public static function validatePhone(string $phone): int
    {
        return mb_strlen ($phone) >= 9 && mb_strlen($phone) <= 11 ;
    }

    public static function validatePublicPlace(string $publicPlace)
    {
        return mb_strlen($publicPlace) > 3;
    }
    public static function validateNumberOfStreet(string $numberOfStreet)
    {
        return mb_strlen($numberOfStreet) >= 1;
    }
    public static function validateComplement(string $complement)
    {
        return mb_strlen($complement) > 0;
    }   
    public static function validateNeighborhood(string $neighborhood)
    {
        return mb_strlen($neighborhood) > 0;
    }   
    public static function validateCity(string $city)
    {
        return mb_strlen ($city) > 0;
    }
    public static function validateZipCode(string $zipCode)
    {
        return mb_strlen($zipCode) > 5;
    }

}
