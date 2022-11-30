<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;

class PedidosController extends Controller
{

    public function index()
    {
        $pedidos = Pedido::query()->orderBy('comprador')->get();
        $totalRecebido = DB::select('SELECT SUM(preco * quantidade) as total from pedidos');

        $dados  = array('pedidos'=>$pedidos,'total'=>$totalRecebido);

        return view('index')->with('dados', $dados);

    }

    public function fileUpload(Request $req){

        $mensagens = [
            'required' => 'É necessário carregar um arquivo antes de precionar o botão ENVIAR ARQUIVO!',
            'mimes' => 'FORMATO DE ARQUIVO INVÁLIDO: Só serão aceitos arquivos no formato txt!',
            'max' => 'O arquivo deve ter no máximo 10M de tamanho!'
        ];

        $req->validate([
            'file' => 'required|mimes:txt|max:10000000'
        ], $mensagens);

        PedidosController::store($req);
        $fileName = time().'_'.$req->file->getClientOriginalName();

        if($req->file()) {
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            return back()
            ->with('success','Arquivo, '. $req->file->getClientOriginalName().', enviado corretamente!');
        }
   }

    public function store($req){
        $dados = file($_FILES['file']["tmp_name"]);

        foreach ( $dados as $linha ){

            if(!empty($linha)){
                $valor = explode("\t",trim($linha));
                print $valor[0] . "<br>";
                if ( $valor[0] == 'Comprador' ) {
                    continue;
                }else{
                    $pedido = new Pedido();
                    $pedido->comprador = $valor[0];
                    $pedido->descricao = $valor[1];
                    $pedido->preco = $valor[2];
                    $pedido->quantidade = $valor[3];
                    $pedido->endereco = $valor[4];
                    $pedido->fornecedor = $valor[5];
                    $pedido->save();
                }
            }
        }
    }
}
