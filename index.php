<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRODUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/apk-2023-hzlvs/endpoint/getbydata',
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER =>TRUE
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    $data = json_decode($response);

    curl_close($cUrl); 

    ?>
    <div class="container mt-5">
        <h1 class="text-danger"><b>Produk</b></h1>
        <div style="display:flex; align-items:center; gap:10px;">
            <a href="javascript:void(0);" class="btn btn-danger mb-3 rounded-pill" id="add">Tambah Data</a>
            <p>
                Terdapat <?php echo count($data); ?> Produk
            </p>
        </div>

        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th class="bg-danger text-white text-center">No.</th>
                    <th class="bg-danger text-white text-center">Nama</th>
                    <th class="bg-danger text-white text-center">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no_urut = 1;
                foreach ($data as $row) :
                    echo '<tr>
                    <td class="text-center py-5">'.$no_urut.'</td>
                    <td class="p-5 px-3">'.(empty($row->nama) ? '' : $row->nama).'</td>
                    <td class="p-5 px-3 text-end">'.(empty($row->harga) ? '' : 'Rp. '.$row->harga.'').'</td>
                    </tr>';
                    $no_urut++;
                endforeach;

                if(empty($data)) {
                    echo '<tr><td colspan="5" class="text-center"> Tidak ada data</td></tr>';
                }

                ?>
            </tbody>
        </table>
    </div>

    <!--Modal-->
    <div class="modal fade" id="saveData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel"><b>Form Produk</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formDosen" action="save.php" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
                                required>
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga" required>
                        </div>
                    </form>
                    <div class="">
                        <button type="submit" class="btn btn-danger rounded-pill" form="formDosen">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="script.js"></script>
</body>

</html>