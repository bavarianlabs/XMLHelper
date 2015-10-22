<?php
include('vendor/autoload.php');

ini_set('display_errors', true);
$pagador = array(
    'Nome'      => 'Nome Sobrenome',
    'Email'     => 'nome.sobrenome@dominio.com.br',
    'IdPagador' => '123132',
    'EnderecoCobranca'  => array(
        'Logradouro'    => 'Av. Brigadeiro Faria Lima',
        'Numero'        => '2927',
        'Complemento'   => 'Ed.',
        'Bairro'        => 'Itain Bibi',
        'Cidade'        => 'Sao Paulo',
        'Estado'        => 'SP',
        'Pais'          => 'BRA',
        'CEP'           => '01452-000',
        'TelefoneFixo'  => '(11)3165-4020',
    )
);
$bodyRequest = array(
    'EnviarInstrucao' => array(
        'InstrucaoUnica' => array(
            '@attributes'   => array('TipoValidacao' => 'Transparente'),
            '@content'      => array(
                'Razao'     => 'Omnipay Moip Teste Transacao',
                'Valores'   => array(
                    'Valor' => array(
                        '@attributes'   => array('moeda' => 'BRL'),
                        '@content'      => '11.22'
                    )
                ),
                'Pagador' => $pagador
            )
        )
    )
);


$xml = new \Bavarianlabs\XMLHelper\XMLHelper();
echo '<pre>'; var_dump($bodyRequest);
echo '<br />';
var_dump($xml->xml($bodyRequest));
