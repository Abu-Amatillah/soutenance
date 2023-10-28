<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande de devis</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .content {
            width: 75%;
        }

        img {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<div class="container"></div>
    <div class="content">
        <img src="{{ asset('front-office/img/logo.svg') }}" alt="">

        <p>Vous avez reçu une demande de devis. Ci-dessous les informations concernant cette demande:</p>

        <div>
            <p>
                <b><ul>Nom:</ul></b>&nbsp;
                {{ $name }}
            </p>
            <p>
                <b><ul>Téléphone:</ul></b>&nbsp;
                {{ $phone }}
            </p>
            <p>
                <b><ul>Besoin:</ul></b>&nbsp;
                {{ $need }}
            </p>
        </div>
    </div>
</div>
</body>
</html>
