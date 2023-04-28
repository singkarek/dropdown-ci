<?php 

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model{

    protected $table = 'kecamatan';

    protected $primaryKey = 'id_kec';

    protected $allowedFields = ['id_kota', 'nama_kec'];
    
}

?>