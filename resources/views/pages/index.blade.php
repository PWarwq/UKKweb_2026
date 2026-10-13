<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body class="min-h-screen flex flex-col">

    <x-nav />

    
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-5 mt-10 mx-5">
        @foreach ($products as $p)
            <div>
                <img src="{{ asset($p->gambar) }}">
                <div class="rounded-lg bg-white p-4 shadow-sm">
                    <h3 class="font-semibold">{{ $p->nama }}</h3>
                    <p class="mt-2 font-bold text-blue-600">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                            <form action="{{ route('cart.add', $p->kode) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 rounded-lg px-2 py-2 text-white font-semibold">
                                    Add To Cart
                                </button>
                            </form>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>