<?php require '../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

$token = '{SECRET_KEY}'; // danger

MercadoPago\SDK::setAccessToken($token);

$response = [
    'error' => true,
    'message' => 'Invalid request'
];

if(isset($_REQUEST["saveClient"])){

    $client = new APP\Client();
    $client->setProp('fields', [
        'first_name' => $_REQUEST["first_name"],
        'last_name' => $_REQUEST["last_name"],
        'email' => $_REQUEST["email"],
    ]);
    $client->saveClient();

    $response = [
        'success' => true,
        'message' => 'Client created successfully'
    ];

} 

if(isset($_REQUEST["deleteClient"])){

    $deleteClient = new APP\Client();
    $deleteClient->setProp('fields', [
        'id' => $_REQUEST["id"],
    ]);
    $deleteClient->deleteClient();

    $response = [
        'success' => true,
        'message' => 'Client deleted successfully'
    ];

} 

if(isset($_REQUEST["getClients"])){

    $clients = new APP\Client();
    $clients = $clients->getClients();

    $formatter = new APP\Formatter();

    $clients = $formatter->jsonToObject($clients);

    $response = $clients;

} 

echo json_encode($response);