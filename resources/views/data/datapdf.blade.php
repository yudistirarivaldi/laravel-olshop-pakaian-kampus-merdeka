<!DOCTYPE html>
<html>
<head>
    <title>Data Ruangan</title>
</head>
<body>
    <h3 align="center">Data Transaksi</h3>
    <table align="center" border="1" cellpadding="10" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>phone</th>
            <th>courier</th>
            <th>total_harga</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            @php
                $i = 0
            @endphp
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $dt->name }}</td>
            <td>{{ $dt->address }} </td>
            <td>{{ $dt->phone }} </td>
            <td>{{ $dt->courier }}</td>
            <td>{{ $dt->total_price }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

</body>
</html>
