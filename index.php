<?php

require 'vendor/autoload.php';

    use JonnyW\PhantomJs\Client;
    use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;
    
    $client = Client::getInstance();
    $client->getEngine()->setPath('bin\\phantomjs.exe');
    /** 
     * @see JonnyW\PhantomJs\Http\Request
     **/
    $request = $client->getMessageFactory()->createRequest('https://tv.yahoo.co.jp/search/?q=IT', 'GET');

    /** 
     * @see JonnyW\PhantomJs\Http\Response 
     **/
    $response = $client->getMessageFactory()->createResponse();

    // Send the request
    $client->send($request, $response);
    var_dump($response);
    if($response->getStatus() === 200) {

        // Dump the requested page content
        echo $response->getContent();
    }
?>