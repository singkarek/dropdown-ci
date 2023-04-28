<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProvinsiModel extends Model{

    protected $table = 'provinsi';

    protected $primaryKey = 'id_prov';

    protected $allowedFields = ['nama_prov'];
    
}

?>