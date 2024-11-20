<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SpeciesModel;
use CodeIgniter\HTTP\ResponseInterface;

class Species extends BaseController
{
    private $speciesModel;

    public function __construct()
    {
      $this->speciesModel = model(SpeciesModel::class);
    }

    public function index()
    {
        $species = $this->speciesModel->findAll();
        $data['species'] = $species;
        $data['title'] = 'Listado de Species - Home';
        return view('shared/header', $data).view('species/index',$data).view('shared/footer');
    }

    public function speciesForm()
    {
        $data['title'] = 'Agregar Especie - Home';
        return view('shared/header', $data).view('species/addSpecies').view('shared/footer');
    }

    public function create()
    {
      $data = [
        'name' => $this->request->getPost('name'),
        'scientific_name' => $this->request->getPost('scientific_name')
      ];

      $this->speciesModel->insert($data);
      $species = $this->speciesModel->findAll();
      $dataIndex['species'] = $species;
      $dataIndex['title'] = 'Listado de Species - Home';
      return view('shared/header', $data) . view('species/index', $dataIndex) . view('shared/footer');
    }
}
