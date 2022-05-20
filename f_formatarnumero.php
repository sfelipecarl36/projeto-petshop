<?php

function formatar_numero($doc) {
 
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
 
        if($qtd >= 9) {
 
            if($qtd === 9 ) {
 
                $docFormatado = '(91) '.substr($doc, 0, 5) . '-' .
                                substr($doc, 5, 8);
            }

            if($qtd === 10 ) {
 
                $docFormatado = '(91) '.substr($doc, 1, 5) . '-' .
                                substr($doc, 6, 8);
            } /*else {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            }*/
 
            return $docFormatado;
 
        } else {
            return 'SEM NUMERO';
        }
    }

?>
 