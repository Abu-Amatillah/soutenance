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
        h3 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            border: 1px solid #7fad39;
            width: 100%;
            padding: 1rem;
        }
        table tr {
            border: 1px solid #7fad39;
            padding: .625rem 1rem;
        }
        table tr td {
            border: 1px solid #7fad39;
            padding: .625rem 1rem;
        }
        .product-image {
            display: flex;
            align-items: center;
        }
        .product-image img {
            width: 80px;
            height: 60px;
            margin-right: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <img src="{{ asset('front-office/img/logo.svg') }}" alt="">

            <p>Vous avez une nouvelle commande depuis {{ env('APP_NAME') }}. Ci-dessous les informations de la commande:</p>

            <div>
                <p>
                    <b><u>Nom:</u></b>&nbsp;
                    {{ $order->user->first_name.' '.$order->user->last_name }}
                </p>
                <p>
                    <b><u>E-mail:</u></b>&nbsp;
                    {{ $order->user->email }}
                </p>
                <p>
                    <b><u>Telephone:</u></b>&nbsp;
                    {{ $order->user->telephone }}
                </p>
            </div>
            <div>
                <h3>Produits commandés</h3>
                <table>
                    <thead>
                        <th>Produit</th>
                        <th>Prix unitaire <br> (FCFA)</th>
                        <th>Quantité</th>
                        <th>Prix total <br> (FCFA)</th>
                    </thead>
                    <tbody>
                        @foreach ($order->order_items as $item)
                            <tr>
                                <td>
                                    <div class="product-image">
                                        <img src="{{ $item->product->image }}" alt="Product image">
                                        <span>{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ $item->product->price }}
                                </td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    {{ $item->product->price * $item->quantity }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <b>Total</b>
                            </td>
                            <td>{{ $order->amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
