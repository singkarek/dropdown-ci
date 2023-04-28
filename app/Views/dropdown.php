<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/bootstrap.min.js'); ?>"></script>
    <title>Indonesia Dropdown</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Indonesia</h2>
        <span id="message"></span>
        <div class="card">
            <div class="card-header text-center">Dropdown</div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <select name="provinsi" id="provinsi" class="form-control input-lg">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                foreach ($provinsi as $row) {
                                    echo '<option value="' . $row["id_prov"] . '">' . $row["nama_prov"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="kabupaten" id="kabupaten" class="form-control input-lg">
                                <option value="">Pilih Kabupaten</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="kecamatan" id="kecamatan" class="form-control input-lg">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="desa" id="desa" class="form-control input-lg">
                                <option value="">Pilih Desa</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        $('#provinsi').change(function() {

            var id_prov = $('#provinsi').val();

            var action = 'get_kabupaten';

            if (id_prov != '') {
                $.ajax({
                    url: "<?php echo base_url('/dropdown/action'); ?>",
                    method: "POST",
                    data: {
                        id_prov: id_prov,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Pilih Kabupaten</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].id_kota + '">' + data[count].nama_kota + '</option>';

                        }

                        $('#kabupaten').html(html);
                    }
                });
            }  else {
                $('#kabupaten').val('');
            }
            $('#kecamatan').val('');
        });

        $('#kabupaten').change(function() {

            var id_kota = $('#kabupaten').val();

            var action = 'get_kecamatan';

            if (id_kota != '') {
                $.ajax({
                    url: "<?php echo base_url('/dropdown/action'); ?>",
                    method: "POST",
                    data: {
                        id_kota: id_kota,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Pilih Kecamatan</option>';

                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id_kec + '">' + data[count].nama_kec + '</option>';
                        }

                        $('#kecamatan').html(html);
                    }
                });
            } else {
                $('#kecamatan').val('');
            }

        });

        $('#kecamatan').change(function() {

            var id_kec = $('#kecamatan').val();

            var action = 'get_desa';

            if (id_kec != '') {
                $.ajax({
                    url: "<?php echo base_url('/dropdown/action'); ?>",
                    method: "POST",
                    data: {
                        id_kec: id_kec,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">Pilih Desa</option>';

                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id_desa + '">' + data[count].nama_desa + '</option>';
                        }

                        $('#desa').html(html);
                    }
                });
            } else {
                $('#desa').val('');
            }

        });

    });
</script>