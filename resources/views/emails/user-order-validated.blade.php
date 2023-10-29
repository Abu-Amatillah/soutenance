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

            <p>Votre commande depuis {{ env('APP_NAME') }} a été bien reçue. Ci-dessous les informations de la commande:</p>
            <div>
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
