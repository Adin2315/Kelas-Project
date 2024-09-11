<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DASBOARD</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#display').DataTable();
            } );

            new DataTable('#display', {
                layout: {
                    bottomEnd: {
                        paging: {
                            firstLast: false
                        }
                    }
                }
            });
        </script>

    </head>
    <body>
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 60%; margin-left: 10px; margin-right: 10px; padding: 20px;">
            <h2 style="color: black; text-align: center; padding: 10px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Data Mahasiswa</h2>
            <a class="btn btn-success" href="{{ url('/dashboard/create') }}" role="button" style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem; float: inline-end; margin-bottom: 1.5rem;">Tambah Data</a>

            <table id="display" class="table table-striped" style="font-family: Arial, Helvetica, sans-serif; border: 1px solid #dddddd; text-align: left; padding: 5px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 7rem; text-align: center;">NRP</th>
                        <th scope="col" style="text-align: center;">Nama</th>
                        <th scope="col" style="text-align: center;">Email</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <td style="text-align: center;">{{ $item->nrp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td style="text-align: center;">
                                <a href="{{ url('/dashboard/'.$item->nrp.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ url('/dashboard/'.$item->nrp) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda Yakin Untuk Menghapus Data Tersebut?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div

    </body>

</html>
