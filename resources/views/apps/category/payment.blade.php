@extends('layouts.master')
@section('title')
@lang('translation.Form_Mask')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Forms @endslot
@slot('title') Pagamento @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card mb-4">
                <h5 class="card-header"></h5>
                <form action="" method="post" class="card-body">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label" for="user">Numero do cartão</label>
                            <input id="cardnumber" name="cardnumber" type="text"
                                   class="form-control @error('cardnumber') is-invalid @enderror "
                                   value="" required />
                            @error('cardnumber')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="user">CVV</label>
                            <input id="cvv" name="cvv" type="text"
                                   class="form-control @error('cvv') is-invalid @enderror"
                                   value=""  required />
                            @error('cvv')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="user">Mês Expiração</label>
                            <input id="mexpiration" name="expiration" type="text"
                                   class="form-control @error('mexpiration') is-invalid @enderror" value=""
                                    />
                            @error('mexpiration')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="user">Ano Expiração</label>
                            <input id="aexpiration" name="expiration" type="text"
                                   class="form-control @error('aexpiration') is-invalid @enderror" value=""
                                    />
                            @error('aexpiration')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="user">Nome no Cartão</label>
                            <input id="namecard" name="namecard" type="text"
                                   class="form-control @error('namecard') is-invalid @enderror" value=""
                                    />
                            @error('namecard')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="user">Valor Total</label>
                            <input id="total" name="total" type="text"
                                   class="form-control @error('total') is-invalid @enderror" value=""
                                    />
                            @error('total')
                            <div class="invalid-feedback"></div>
                            @enderror
                        </div>
                        
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- Plugins js -->
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-mask.init.js') }}"></script>
@endsection
