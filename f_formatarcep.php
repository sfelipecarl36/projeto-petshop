<?php

function formatar_cep($doc) {
 
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
 
        if($qtd >= 8) {
 
            if($qtd === 8 ) {
 
                $docFormatado = substr($doc, 0, 5) . '-' .
                                substr($doc, 5, 8);
            } /*else {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            }*/
 
            return $docFormatado;
 
        } else {
            return 'SEM CEP';
        }
    }

?>
 