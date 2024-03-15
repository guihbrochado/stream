@extends('layouts.master')
@section('title')
@lang('translation.Checkout')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Ecommerce @endslot
@slot('title') Checkout @endslot
@endcomponent

<div class="row">
    <div class="col-xl-8">
        <div class="custom-accordion">
            <div class="card">
                <a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="uil uil-receipt text-primary h2"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Informação de pagamento</h5>
                                <p class="text-muted text-truncate mb-0">Sed ut perspiciatis unde omnis iste</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>
                        </div>

                    </div>
                </a>

                <div id="checkout-billinginfo-collapse" class="collapse show">
                    <div class="p-4 border-top">
                        <form>
                            <div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-name">Nome</label>
                                            <input type="text" class="form-control" id="billing-name" placeholder="Enter name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-email-address">Endereço de Email</label>
                                            <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="billing-phone">Telefone</label>
                                            <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no.">
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-4 col-lg-4">
                                        <label class="form-label" for="billing-cpf">CPF</label>
                                        <input type="text" class="form-control" id="billing-cpf" placeholder="CPF" value="{{ $user->cpf }}">
                                    </div>
                                    <div class="mb-4 col-lg-8   ">
                                    <label class="form-label" for="billing-address">Endereço</label><input type="text" class="form-control" id="billing-name" placeholder="Enter name" value="{{ $userStreet . ", ". $userDistrict . ", " . $userState }}">
                                </div>
                                </div>

                                

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4 mb-lg-0">
                                            <label class="form-label" for="billing-city">Cidade</label>
                                            <input type="text" class="form-control" id="billing-city" placeholder="Cidade" value="{{ $userCity }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-0">
                                            <label class="form-label" for="zip-code">CEP</label>
                                            <input type="text" class="form-control" id="zip-code" placeholder="CEP">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <a href="#checkout-paymentinfo-collapse" class="collapsed text-dark" data-bs-toggle="collapse">
                    <div class="p-4">

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="uil uil-bill text-primary h2"></i>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Payment Info</h5>
                                <p class="text-muted text-truncate mb-0">Duis arcu tortor, suscipit eget</p>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                            </div>
                        </div>

                    </div>
                </a>

                <div id="checkout-paymentinfo-collapse" class="collapse">
                    <div class="p-4 border-top">
                        <div>
                            <h5 class="font-size-14 mb-3">Método de pagamento:</h5>

                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <label class="card-radio-label">
                                            <input type="radio" name="pay-method" id="pay-methodoption4" class="card-radio-input">

                                            <span class="card-radio text-center text-truncate">
                                                <i class="uil uil-qr-scan d-block h2 mb-3"></i>
                                                <span>PIX</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="payment-confirmation" style="display: none;">
                                <img id="qr-code" class="mb-2" src="" alt="QR Code" style="display: none;">
                                <span id="chave" class="mb-2" style="display: none;">Chave Pix: </span>
                                <button id="finalize-purchase" class="btn btn-primary">Finalizar Compra</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4">
            <div class="col">
                <a href="{{ route('store.index') }}" class="btn btn-link text-muted">
                    <i class="uil uil-arrow-left me-1"></i> Continue comprando </a>
            </div> <!-- end col -->
            
        </div> <!-- end row-->
    </div>
    <div class="col-xl-4">
        <div class="card checkout-order-summary">
            <div class="card-body">
                <div class="p-3 bg-light mb-4">
                    <h5 class="font-size-16 mb-0">Order Summary <span class="float-end ms-2">#MN0124</span></h5>
                </div>
                <div class="table-responsive">
                    <table id="orderDetailsTable" class="table table-centered mb-0 table-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0" style="width: 110px;" scope="col">Trader</th>
                                <th class="border-top-0" scope="col">Descrição</th>
                                <th class="border-top-0" scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cart as $item)
                            <tr>
                                <th scope="row">
                                    @if(!empty($item['image_path']) && file_exists(public_path('images/traders/' . $item['image_path'])))
                                    <img src="{{ asset('images/traders/' . $item['image_path']) }}" alt="product-img" title="product-img" class="avatar-md">
                                    @else
                                    <div style="width: 64px; height: 64px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 24px; border-radius: 50%;">
                                        {{ strtoupper(substr($item['trader'], 0, 1)) }}
                                    </div>
                                    @endif
                                </th>
                                <td>
                                    <h5 id="trader" class="font-size-14 text-truncate"><a href="ecommerce-product-detail" class="text-dark">{{ $item['trader'] }}</a></h5>
                                    <p class="text-muted mb-0">Quantidade: {{ $item['quantity'] }}</p>
                                </td>
                                <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">O carrinho está vazio</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td colspan="2">
                                    <h5 class="font-size-14 m-0">Sub Total :</h5>
                                </td>
                                <td>
                                    R$ {{
                                        number_format(
                                            array_sum(array_map(function($item) {
                                                return $item['price'] * $item['quantity'];
                                            }, $cart)),
                                            2,
                                            ',',
                                            '.'
                                        )
                                    }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@section('script')

<script>
    var storeOrderUrl = "{{ route('order.store') }}";
    $(document).ready(function () {
        $("input[name='pay-method']").on('click', function () {
            var total = "{{$total}}";
            var formattedTotal = parseFloat(total).toFixed(2);

            if ($(this).attr('id') === 'pay-methodoption4') {
                $('#payment-confirmation').css('display', 'block');
                $.ajax({
                    url: '{{ route("charge.create") }}',
                    method: 'POST',
                    data: {
                        nome: $('#billing-name').val(),
                        cpf: $('#billing-cpf').val(),
                        valorOriginal: formattedTotal,
                        solicitacaoPagador: 'Trader',
                        infoAdicionais: [
                            {
                                nome: 'Campo 1',
                                valor: 'Informação Adicional 1'
                            },
                            {
                                nome: 'Campo 2',
                                valor: 'Informação Adicional 2'
                            }
                        ]
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response.response)
                        $('#qr-code').attr('src', response.response.qrcode.imagemQrcode).css('display', 'block');
                        $('#chave').text('Chave Pix: ' + response.response.pix.chave).show().css('display', 'block');

                        $.ajax({
                            url: storeOrderUrl,
                            method: 'POST',
                            data: {
                                cpf: response.response.pix.devedor.cpf,
                                nome_devedor: response.response.pix.devedor.nome,
                                status: response.response.pix.status,
                                vencimento: response.response.pix.calendario.criacao,
                                txid: response.response.pix.txid,
                                valor: response.response.pix.valor.original
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                console.log("Dados armazenados com sucesso");
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function (error) {
                        
                        console.log(erro);
                    }
                });
            } else {
                $('#payment-confirmation').css('display', 'none');
            }
        });
    });
</script>
@endsection

@endsection
