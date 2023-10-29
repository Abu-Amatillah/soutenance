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
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <img src="{{ asset('front-office/img/logo.svg') }}" alt="">

            <p>Un internaute vient de soumettre le formulaire de contact. Ci-dessous les informations le concernant:</p>

            <div>
                <p>
                    <b><u>Nom:</u></b>&nbsp;
                    {{ $name }}
                </p>
                <p>
                    <b><u>E-mail:</u></b>&nbsp;
                    {{ $email }}
                </p>
                <p>
                    <b><u>Message:</u></b>&nbsp;
                    {{ $_message }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>
