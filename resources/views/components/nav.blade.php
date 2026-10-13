@vite(['resources/css/app.css', 'resources/js/app.js'])
<nav class="shadow-lg px-5 py-5 flex justify-between items-center h-20">
    <p class="font-bold text-2xl">Barang Belanja</p>

    <div>
        <a href="{{ route('index') }}" class="bg-blue-500 px-4 py-2 text-white rounded-lg font-semibold hover:bg-blue-600">Daftar Product</a>
        <a href="{{ route('cart') }}" class="bg-blue-500 px-4 py-2 text-white rounded-lg font-semibold hover:bg-blue-600">Keranjang</a>
    </div>
</nav>