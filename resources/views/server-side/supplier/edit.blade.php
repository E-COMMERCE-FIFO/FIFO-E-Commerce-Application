<h1>Create Warga</h1>

<form action="/{{ $supplier->id_supplier }}" method="POST">
    @method('put')
    @csrf
    <input type="text" name = "id_supplier" placeholder="Id" value="{{ $supplier->id_supplier }}"><br>
    <input type="text" name = "nama_supplier" placeholder="Nama" value="{{ $supplier->nama_supplier }}"><br>
    <input type="text" name = "alamat" placeholder="Alamat" value="{{ $supplier->alamat }}"><br>
    <input type="text" name = "no_telp" placeholder="No Telepon" value="{{ $supplier->no_telp }}">
    <input type="submit" name="submit" value="Save">
</form>
