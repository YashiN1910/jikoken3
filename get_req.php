<?php
    function http_get_request($url)
    {
        $curl = curl_init();

        //送信先のurlを設定
        curl_setopt($curl, CURLOPT_URL, $url);
        //レスポンスにヘッダを含める
        curl_setopt($curl, CURLOPT_HEADER, true);

        $response = curl_exec($curl);

        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        echo $status_code;

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        echo $header;
        echo $body;

        curl_close($curl);

        return $body;
    }

    http_get_request("https://bizwd.net/");

    /*
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://httpbin.org/get");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

    echo curl_exec($curl);*/
