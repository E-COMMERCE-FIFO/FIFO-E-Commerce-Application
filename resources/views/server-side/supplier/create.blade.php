<h1>Create Warga</h1>

<form action="/add" method="POST">
    @csrf
    <input type="text" name = "id_supplier" placeholder="Id"><br>
    <input type="text" name = "nama_supplier" placeholder="Nama"><br>
    <input type="text" name = "alamat" placeholder="Alamat"><br>
    <input type="text" name = "no_telp" placeholder="No Telepon">
    <input type="submit" name="submit" value="Save">
</form>
