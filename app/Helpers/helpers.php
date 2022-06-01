<?php 

    function money_database($price)
    {
        $valor = preg_replace("/[^0-9,]+/i","", $price);
        $valor = str_replace(",",".", $valor);
        return $valor;
    }

    function money_format($price) 
    {
        return number_format($price, 2, ',', '.');
    }