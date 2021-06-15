<?php

namespace app\Controller;

use app\Model\ProdutoModel;
use app\Repository\ProdutoRepository;
use app\Util\Util;

class HomeController extends Controller {

    /**
     * @var string
     */
    protected $modelProduto = "ProdutoModel";

    public function index() {
        //$data['mahasiswa'] = $this->model('Home')->getAll();
        $data['title'] = 'Produto';
        //$data= json_encode($data);
        // passar $data para json
       
        return $this->render('home/index', $data, true);
    }

}
?>

