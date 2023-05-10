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

    <form action="/create-barang" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form">
            <h1>Create Item</h1>
            <div class="input-box">
                <label>Gambar Barang</label>
                <input type="file" name="gambar_barang">
            </div>
            <div class="input-box">
                <Label>Nama Barang :</Label>
                <input type="text" name="nama_barang" placeholder="Nama Barang*">
            </div>
            <div class="input-box">
                <Label>Harga Barang :</Label>
                <input type="text" name="harga_barang" placeholder="Harga Barang*">
            </div>
            <div class="input-box">
                <Label>Jumlah Barang :</Label>
                <input type="text" name="jumlah_barang" placeholder="Jumlah Barang*">
            </div>

            <div class="radio-kategori">
                @foreach ($kategori as $i)
                    <input value="{{$i->id}}" type="radio" name="kategori_id">
                    <label for="">{{$i->nama_kategori}}</label>
                @endforeach
            </div>

            
            <button class="submit-button" type="submit">Submit</button>
        </div>
    </form>
    <form action="/create-kategori" method="POST">
        @csrf
        <div class="form">
            <div class="input-box">
                <label>Other Category:</label>
                <input type="text" name="kategori_barang">
            </div>
            <button type="submit" class="create-category-button">Create Category</button>
        </div>
    </form>
</body>
</html>