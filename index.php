<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/style.css?<?= filemtime('public/style.css') ?>">
    <title>Mercado Pago Clients Integration</title>
</head>

<body>

    <div class="container mt-4">

        <div class="row">

            <div class="col-3 ms-auto me-1">
                <div class="row">
                    <div class="card" style="height: 370px">

                        <div class="card-body">

                            <form>
                                <div class="mb-3 text-primary">
                                    <h5>Add a client</h5>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" name="first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <button class="btn btn-primary w-100" type="submit">Add client</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6 me-auto">

                <div class="row">
                    <div class="card" style="height: 370px">
                        <div class="card-body">
                            <div class="mb-3 text-primary">
                                <h5>Clients</h5>
                            </div>
                            <hr>
                            <div class="clients" style="overflow-y: scroll; height: 280px">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="public/script.js?<?= filemtime('public/script.js') ?>"></script>

</body>

</html>