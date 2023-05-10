<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/list-barang.css')}}">
</head>
<body>
    <nav class="navbar">
        <button class="navbar-button"><a href="/">Home</a></button>
        <button class="navbar-button"><a href="/list-barang">Item List</a></button>
        <button class="navbar-button"><a href="/about-us">About Us</a></button>
    </nav>

    <div class="create-item">
        <button class="create-item-button"><a href="/create-barang">Create Item</a></button>
    </div>

    <div class="list-item">
        @foreach ($barang as $i)
            <div class="box-item">
                <h3>{{$i->nama_barang}}</h3>
                <img src="{{asset('/storage/barang/'.$i->gambar_barang)}}" alt="">
                <p>Rp. {{$i->harga_barang}}</p>
                <p>{{$i->jumlah_barang}} Buah</p>
                <p>Kategori: {{$i->kategori->nama_kategori}}</p>
                <div class="button">
                    <button class="edit-button"><a href="/edit-barang/{{$i->id}}">Edit</a></button>
                    <form action="/delete-barang/{{$i->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="delete-button">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>