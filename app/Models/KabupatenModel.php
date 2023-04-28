<?php 

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model{

    protected $table = 'kota_kab';

    protected $primaryKey = 'id_kota';

    protected $allowedFields = ['id_prov', 'nama_kota'];
    
}
