<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro extends CI_Controller
{

    public function index()
    {

        $data['title'] = 'Cadastro de Produtos';

        $this->load->view('templates/header', $data);
        $this->load->view('cadastro', $data);
        $this->load->view('templates/footer', $data);
    }

}
