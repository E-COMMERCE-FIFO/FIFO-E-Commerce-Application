<h1>Create Warga</h1>

<form action="/add" method="POST">
    @csrf
    <input type="text" name = "id_supplier"  value="{{ 'SPR' .$kd }}" readonly><br>
    <input type="text" name = "nama_supplier" placeholder="Nama" autocomplete="off" required><br>
    <input type="text" name = "alamat" placeholder="Alamat" autocomplete="off" required><br>
    <input type="text" name = "no_telp" placeholder="No Telepon" autocomplete="off" required>
    <input type="submit" name="submit" value="Save">
</form>
