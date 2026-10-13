<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

@foreach ($cart as $p)

    <div>
        <img src="{{ asset($p['product']['gambar']) }}" width="100">

        <h3>{{ $p['product']['nama'] }}</h3>

        <p>Harga: Rp{{ number_format($p['product']['harga'], 0, ',', '.') }}</p>

        <p>Quantity: {{ $p['product']['qty']  }}</p>

        <p>
            Total:
            Rp{{ number_format($p['product']['harga']  * $p['product']['qty'], 0, ',', '.') }}
        </p>

        <form action="{{ route('cart.remove', $p['product']['kode']) }}" method="POST">
            @csrf
            <button type="submit">Remove</button>
        </form>
    </div>
    @endforeach
    <p>Cart masih kosong.</p>

<form action="{{ route('cart.clear') }}" method="POST">
    @csrf
    <button type="submit">Clear Cart</button>
</form>
</body>

</html>