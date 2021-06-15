<?php

namespace app\Controller;

use app\Model\UsuarioModel;
use app\Repository\UsuarioRepository;


class UsuarioController extends Controller {

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
            $usuarioController = $this->getController('UsuarioController');
            $usuarioModel = $usuarioController->Model($this->usuarioModel);
            $usuarioModel->setCpf($_POST['cpf']);
            $usuarioModel->setNome($_POST['nome']);
            $usuarioModel->setEmail($_POST['email']);
            $usuarioModel->setSenha($_POST['senha']);


            $res = $produtoController->getRepository('user')
                    ->save($usuarioModel);
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




}
?>
