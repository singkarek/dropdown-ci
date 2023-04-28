<?php 

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model{

    protected $table = 'dusun_desa';

    protected $primaryKey = 'id_desa';

    protected $allowedFields = ['id_kec', 'nama_desa'];

}

?>