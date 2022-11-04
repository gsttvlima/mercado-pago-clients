<?php

require_once 'vendor/autoload.php';

$token = '{SECRET_KEY)'; // danger

MercadoPago\SDK::setAccessToken($token);

?>

<hr>

<b>Create a client</b><br /><br />

<form method="POST">
    <input type="hidden" name="action" value="create" />
    <div style="margin-bottom: 2px">
        <label for="first_name">First name</label><br />
        <input type="text" required name="first_name" />
    </div>
    <div style="margin-bottom: 2px">
        <label for="last_name">Last name</label><br />
        <input type="text" required name="last_name" />
    </div>
    <div style="margin-bottom: 2px">
        <label for="email">Email</label><br />
        <input type="text" required name="email" />
    </div>
    <div style="margin-bottom: 2px">
        <button type="submit">Create</button>
    </div>
</form>

<hr>

<b>Delete a client</b><br /><br />

<form method="POST">
    <input type="hidden" name="action" value="delete" />
    <div style="margin-bottom: 2px">
        <label for="email">Email</label><br />
        <input type="text" name="email" />
    </div>
    <div style="margin-bottom: 2px">
        <button type="submit">Delete</button>
    </div>
</form>

<hr>

<b>Get all clients</b><br /><br />

<form method="POST">
    <input type="hidden" name="action" value="get" />
    <button type="submit">Get all clients</button>
</form>

<hr>

<?php

// Create a client

if (@$_POST["action"] === 'create') {

    $client = new APP\Client();
    $client->setProp('fields', [
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'email' => $_POST["email"],
    ]);
    $client->saveClient();
}


// Delete a client

if (@$_POST["action"] === 'delete') {

    $client = new APP\Client();
    $client->setProp('fields', [
        'email' => $_POST["email"]
    ]);
    $client = $client->getClients();

    $formatter = new APP\Formatter();

    $client = $formatter->jsonToObject($client);

    foreach ($client->results as $client) {

        $deleteClient = new APP\Client();
        $deleteClient->setProp('fields', [
            'id' => $client->id,
        ]);
        $deleteClient->deleteClient();
    }
}


// Get all clients

if (@$_POST["action"] === 'get') {

    $clients = new APP\Client();
    $clients = $clients->getClients();

    $formatter = new APP\Formatter();

    $clients = $formatter->jsonToObject($clients);

    echo '<b>All clients</b><br/><br/>';

    foreach ($clients->results as $client) {

        echo "ID: {$client->id}<br/>";
        echo "First Name: {$client->first_name}<br/>";
        echo "Last Name: {$client->last_name}<br/>";
        echo "E-mail: {$client->email}<br/><br/>";

    }
}

?>