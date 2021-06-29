<?php

namespace App\Contracts;

interface ExternalDataInterface
{
    /**
     * Obtém os dados de uma API externa
     */
    public function getData(string $endpoint);
}
