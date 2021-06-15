<?php

namespace app\Controller;

use app\Model\ProdutoModel;
use app\Repository\ProdutoRepository;
use app\Util\Util;

class ProdutoController extends Controller {

    /**
     * @var string
     */
    protected $modelProduto = "ProdutoModel";

    public function index() {
        //$data['mahasiswa'] = $this->model('Home')->getAll();
        $data['title'] = 'Produto';
        //$data= json_encode($data);
        // passar $data para json
        return $this->render('Produto/index', $data, true);
    }

    public function cadastrar($produtoPost = null) {

        $msg = '';
        if (count($_POST)) {
            /*
              $name =    filter_input($_POST, "descricao_prod", FILTER_SANITIZE_STRING);
              $email =   filter_input($_POST, "email", FILTER_SANITIZE_EMAIL);
              $subject = filter_input($_POST, "valor", FILTER_SANITIZE_STRING);
              $message = filter_input($_POST, "cod_ean", FILTER_SANITIZE_STRING);
             */
            //$util::dd($_POST);
            $produtoController = $this->getController('ProdutoController');
            $produtoModel = $produtoController->Model($this->modelProduto);
            $produtoModel->setDescricao($_POST['descricao_prod']);
            $produtoModel->setValor($_POST['valor']);
            $produtoModel->setQtde(1);
            $produtoModel->setCodProduto($_POST['cod_ean']);
            //$produtoModel->setCodean();
            $res = $produtoController->getRepository('produtoRepository')
                    ->save($produtoModel);
            if ($result) {
                $res['message'] = "User added successfully";
            } else {
                $res['error'] = true;
                $res['message'] = "User insert failed!";
            }
        }
        $action = $_GET['action'];
        if (!isset($_GET['action'])) { //se não for requisição ajax;
            $data['title'] = 'Produto';
            $data['redirect'] = 'produto/cadastrar';
            $data['msg'] = $msg;
            return $this->render('Produto/cadastrar', $data, true);
        } else {
            return $res;
        }
    }

    public function remover() {
       
        $produtoController = $this->getController('produtoController');
        $produtoList = $produtoController->getRepository('ProdutoRepository')->remove($_POST['id_prod']);
        $data['title'] = 'Produto';
        $data['redirect'] = 'produto/remover';
        echo $produtoList['success'];
        return $produtoList;
    }

    public function listar() {
        $produtoController = $this->getController('produtoController');
        $produtoList = $produtoController->getRepository('ProdutoRepository')->findAll();
        $data['title'] = 'Produto';
        $data['redirect'] = 'produto/cadastrar';
        echo $produtoList;
        return $produtoList;
    }

    public function findProductoAction() {
        
    }

    public function editar() {

        $msg = '';
        $res = null;
        if (count($_POST)) {
            /*
              $name =    filter_input($_POST, "descricao_prod", FILTER_SANITIZE_STRING);
              $email =   filter_input($_POST, "email", FILTER_SANITIZE_EMAIL);
              $subject = filter_input($_POST, "valor", FILTER_SANITIZE_STRING);
              $message = filter_input($_POST, "cod_ean", FILTER_SANITIZE_STRING);
             */
            //$util::dd($_POST);
            $produtoController = $this->getController('ProdutoController');
            $produtoModel = $produtoController->Model($this->modelProduto);
            $produtoModel->setDescricao($_POST['descricao_prod']);
            $produtoModel->setValor($_POST['valor']);
            $produtoModel->setQtde(1);
            $produtoModel->setCodProduto($_POST['cod_ean']);
            //$produtoModel->setCodean();
            $res = $produtoController->getRepository('produtoRepository')->edit($produtoModel);

            if ($result) {
                $res['message'] = "Produnto cadastrado com sucesso";
            } else {
                $res['error'] = true;
                $res['message'] = "Erro ao cadastrar produtos!";
            }
        }
        $action = $_GET['action'];
        if (!isset($_GET['action'])) { //se não for requisição ajax;
            $data['title'] = 'Produto';
            $data['redirect'] = 'produto/editar';
            $data['msg'] = $msg;
            return $this->render('produto/cadastrar', $data, true);
        } else {
            return $res;
        }
    }
    function home(){
        
        
        return $this->render('produto/cadastrar', $data, true);
    }
}
?>

