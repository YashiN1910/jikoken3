<?php
require 'vendor/autoload.php';

use Goutte\Client;

function translation_nomulish($text, $level = 4)
{
    $client = new Client();
    $crawler = $client->request('GET', "https://racing-lagoon.info/fuku/translate.php");

    $form = $crawler->selectButton('翻訳')->form();

    $form['before'] = $text;
    $form['level'] = $level;
    //$form['options'] ='nochk';
    $form['trans'] = '翻訳';

    $crawler = $client->submit($form);

    $text = $crawler->filterXpath("//textarea[@name='after']")->text();

    return $text;
}

//$textに入った文字列が翻訳される
$text = "お疲れ様です。なかなか寒いですね\n";

echo translation_nomulish($text);
