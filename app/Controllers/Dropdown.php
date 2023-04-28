<?php

namespace App\Controllers;

use App\Models\ProvinsiModel;

use App\Models\KabupatenModel;

use App\Models\KecamatanModel;

use App\Models\DesaModel;

class Dropdown extends BaseController
{
    function index()
    {
        $provinsiModel = new ProvinsiModel();

        $data['provinsi'] = $provinsiModel->orderBy('nama_prov', 'ASC')->findAll();

        return view('dropdown', $data);
    }
    function action()
    {
        if($this->request->getVar('action'))
		{
			$action = $this->request->getVar('action');

			if($action == 'get_kabupaten')
			{
				$kabupatenModel = new KabupatenModel();

				$kabupatendata = $kabupatenModel->where('id_prov', $this->request->getVar('id_prov'))->findAll();

				echo json_encode($kabupatendata);
			}

			if($action == 'get_kecamatan')
			{
				$kecamatanModel = new KecamatanModel();

				$kecamatandata = $kecamatanModel->where('id_kota', $this->request->getVar('id_kota'))->findAll();

				echo json_encode($kecamatandata);
			}
			if($action == 'get_desa')
			{
				$desaModel = new DesaModel();

				$desadata = $desaModel->where('id_kec', $this->request->getVar('id_kec'))->findAll();

				echo json_encode($desadata);
			}
		}
    }
}
