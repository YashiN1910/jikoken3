<?php
require 'vendor/autoload.php';

use Goutte\Client;

function translation_nomulish($strText, $level = 1)
{
    $client = new Client();
    $crawler = $client->request('GET', "https://bizwd.net/");

    $form = $crawler->selectButton('翻訳')->form();

    $form['before'] = $strText;
    $form['level'] = $level;
    //$form['checkbox'] ='checked';
    $form['transbtn'] = '翻訳';

    $crawler = $client->submit($form);

    $strText = $crawler->filterXpath("//textarea[@name='after']")->text();

    return $strText;
}

//$textに入った文字列が翻訳される
