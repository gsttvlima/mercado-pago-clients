<?php

require_once 'vendor/autoload.php';

$token = '{SECRET_KEY}';

MercadoPago\SDK::setAccessToken($token);

?>

<hr>

<b>Create a costumer</b><br /><br />

<form method="POST">
    <input type="hidden" name="action" value="create" />
    <div style="margin-bottom: 2px">
        <label for="first_name">First name</label><br />
        <input type="text" name="first_name" />
    </div>
    <div style="margin-bottom: 2px">
        <label for="last_name">Last name</label><br />
        <input type="text" name="last_name" />
    </div>
    <div style="margin-bottom: 2px">
        <label for="email">Email</label><br />
        <input type="text" name="email" />
    </div>
    <div style="margin-bottom: 2px">
        <button type="submit">Create</button>
    </div>
</form>

<hr>

<b>Delete a costumer</b><br /><br />

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

<b>Get all costumers</b><br /><br />

<form method="POST">
    <input type="hidden" name="action" value="get" />
    <button type="submit">Get all costumers</button>
</form>

<hr>

<?php

// Create a costumer

if (@$_POST["action"] === 'create') {

    $costumer = new APP\Costumer();
    $costumer->setProp('fields', [
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'email' => $_POST["email"],
    ]);
    $costumer->saveCostumer();
}


// Delete a costumer

if (@$_POST["action"] === 'delete') {

    $costumer = new APP\Costumer();
    $costumer->setProp('fields', [
        'email' => $_POST["email"]
    ]);
    $costumer = $costumer->getCostumers();

    $formatter = new APP\Formatter();

    $costumer = $formatter->jsonToObject($costumer);

    foreach ($costumer->results as $costumer) {

        $deleteCostumer = new APP\Costumer();
        $deleteCostumer->setProp('fields', [
            'id' => $costumer->id,
        ]);
        $deleteCostumer->deleteCostumer();
    }
}


// Get all costumers

if (@$_POST["action"] === 'get') {

    $costumers = new APP\Costumer();
    $costumers = $costumers->getCostumers();

    $formatter = new APP\Formatter();

    $costumers = $formatter->jsonToObject($costumers);

    echo '<b>All costumers</b><br/><br/>';

    foreach ($costumers->results as $costumer) {

        echo "ID: {$costumer->id}<br/>";
        echo "First Name: {$costumer->first_name}<br/>";
        echo "Last Name: {$costumer->last_name}<br/>";
        echo "E-mail: {$costumer->email}<br/><br/>";

    }
}

?>