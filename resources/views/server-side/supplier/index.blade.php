
<table border="1">
<tr>
    <th>No</th>
    <th>id</th>
    <th>nama</th>
    <th>Alamat</th>
    <th>telepon</th>
    <th>Aksi</th>
</tr>


@foreach($supplier as $supplier)
<tr>
    <td>{{ $number++ }}</td>
   <td> {{ $supplier -> id_supplier }}</td>
   <td>{{ $supplier -> nama_supplier }}</td>
   <td>{{ $supplier -> alamat }}</td>
   <td>{{ $supplier -> no_telp }}</td>
   <td>
    <a href="{{ $supplier -> id_supplier }}/edit">Edit</a>
    <form action="{{ $supplier -> id_supplier }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
   </td>
</tr>    
@endforeach


</table>
<a href="/create">Tambahkan Supplier</a>