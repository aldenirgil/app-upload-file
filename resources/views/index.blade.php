<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Eu Reciclo - Área de Transferência de Arquivos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body style="background-color: #003036;">
    <div class="container position-relative bg-white d-flex pt-4 pb-4 d-inline-block min-vh-100 " style="min-height:100%; ">

        <!-- Content Start -->
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-12 bg-light rounded h-100 p-4">
                        <img src="{{asset('img/logo-eureciclo.png')}}" class="float-start"  />
                    </div>
                </div>
            </div>


            <div class="container pt-4">
                <div class="row">
                    <div class="col-12 bg-light rounded h-100 p-4">
                        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                            <h3 class="text-center mb-4">Carregar dados do arquivo</h3>
                            @csrf
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="custom-file">
                                <label class="mb-4" for="customFile">Selecione o arquivo desejado.</label>
                                <input type="file"  name="file" class="form-control" id="customFile" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Enviar arquivo
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="container pt-4 px-0">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-light rounded p-4">
                            <h6 class="mb-4">Dados Cadastrados</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Comprador</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Preço Unitário</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Endereço</th>
                                            <th scope="col">Fornecedor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="h-4"></td>
                                        </tr>
                                        @foreach ($dados['pedidos'] as $pedido)
                                            <tr>
                                                <td>{{ $pedido->comprador }}</td>
                                                <td>{{ $pedido->descricao }}</td>
                                                <td>{{ number_format($pedido->preco, 2, '.', '') }}</td>
                                                <td>{{ $pedido->quantidade }}</td>
                                                <td>{{ $pedido->endereco }}</td>
                                                <td>{{ $pedido->fornecedor }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="h-4"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" class="text-end table-dark">
                                                Valor total recebido: R$ {{ number_format($dados['total'][0]->total, 2, '.', '') }}
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid mt-4 mb-4 p-0 sticky-bottom bottom-0" style="position: sticky; top:100vh;">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-6 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Eu Reciclo</a>, All Right Reserved.
                        </div>
                        <div class="col-6 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="#">Aldenir Gil</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


    </div>

</body>

</html>
