<?php 
namespace App\RepositoryInterface;

/**
 * He decidido crear el patron de Repository para que todo venga desde un contrato de  interface
 */
interface DepartureRepositoryInterface {

    public function query(string $query = '');
}