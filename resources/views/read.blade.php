<table class="table">

    <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Merk</th>
            <th scope="col">Tipe</th>
            <th scope="col">Tahun</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($Mails as $surat)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $surat->nomor }}</td>
              <td>{{ $surat->judul }}</td>
              <td>{{ $surat->tanggal }}</td>
              <td>
                  <button class="btn btn-info text-bg-warning" onclick="show({{ $surat->id }})">Update</button>
                  <button class="btn btn-danger text-bg-danger" onclick="destroy({{ $surat->id }})">Delete</button>
              </td>
            </tr>
              @endforeach
    </tbody>
</table>