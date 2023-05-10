<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/create-barang.css')}}">
</head>
<body>
    <nav class="navbar">
        <button class="navbar-button"><a href="/">Home</a></button>
        <button class="navbar-button"><a href="/list-barang">Item List</a></button>
        <button class="navbar-button"><a href="/about-us">About Us</a></button>
    </nav>

    <form action="/update-barang/{{$barang->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form">
            <h1>Create Item</h1>
            <div class="input-box">
                <label>Gambar Barang</label>
                <input type="file" name="gambar_barang">
            </div>
            <div class="input-box">
                <Label>Nama Barang :</Label>
                <input type="text" name="nama_barang" placeholder="Nama Barang*" value="{{$barang->nama_barang}}">
            </div>
            <div class="input-box">
                <Label>Harga Barang :</Label>
                <input type="text" name="harga_barang" placeholder="Harga Barang*" value="{{$barang->harga_barang}}">
            </div>
            <div class="input-box">
                <Label>Jumlah Barang :</Label>
                <input type="text" name="jumlah_barang" placeholder="Jumlah Barang*" value="{{$barang->jumlah_barang}}">
            </div>
            
            <button class="submit-button" type="submit">Submit</button>
        </div>
    </form>
</body>
</html>