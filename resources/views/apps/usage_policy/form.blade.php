@extends('layouts.master')
@section('title')
Política de Uso - Tópicos
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Administração
        @endslot
        @slot('title')
            <a href="{{ route('usage_policy.index_admin') }}">Política de Uso - Tópicos</a>
        @endslot
    @endcomponent

    @php
        $disabled = '';
        
        // fields
        $id = old('id') !== null ? old('id') : $usage_policy->id;
        $usage_policy_category_id = old('usage_policy_category_id') !== null ? old('usage_policy_category_id') : $usage_policy->usage_policy_category_id;
        $icon = old('icon') !== null ? old('icon') : $usage_policy->icon;
        $question = old('question') !== null ? old('question') : $usage_policy->question;
        $answer = old('answer') !== null ? old('answer') : $usage_policy->answer;
        
        if ($action == 'create') {
            $route = route('usage_policy.store');
            $title = 'Cadastrar';
            $card_title = 'Adicionar novo';
            $button = 'Cadastrar';
        } elseif ($action == 'edit') {
            $route = route('usage_policy.update', $usage_policy->id);
            $title = 'Editar';
            $card_title = 'Editar';
            $button = 'Atualizar';
        } else {
            $route = '';
            $title = 'Visualização';
            $card_title = 'Visualização';
            $disabled = 'disabled';
        }
    @endphp

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <h5 class="card-header">{{ $card_title }}</h5>
        <form action="{{ $route }}" method="post" class="card-body">
            @csrf
            @if ($action == 'edit')
                @method('PATCH')
            @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <input id="id" name="id" type="hidden" value="{{ $id }} ">
                    <label class="form-label" for="usage_policy_category_id">Categoria</label>
                    <select id="usage_policy_category_id" name="usage_policy_category_id" required
                        class="form-control @error('usage_policy_category_id') is-invalid @enderror" {{ $disabled }}>
                        <option value="">Selecione a categoria</option>
                        @foreach ($usage_policy_categories as $usage_policy_category)
                            @if ($usage_policy_category_id == $usage_policy_category->id)
                                <option value="{{ $usage_policy_category->id }}" selected>{{ $usage_policy_category->title }}</option>
                            @else
                                <option value="{{ $usage_policy_category->id }}">{{ $usage_policy_category->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('usage_policy_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="icon">Ícone</label>
                    <input id="icon" name="icon" type="text"
                        class="form-control @error('icon') is-invalid @enderror"placeholder="Ícone"
                        value="{{ $icon }}" {{ $disabled }} maxlength="100" />
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="question">Questão</label>
                    <input id="question" name="question" type="text"
                        class="form-control @error('question') is-invalid @enderror"placeholder="Questão"
                        value="{{ $question }}" {{ $disabled }} required maxlength="500" />
                    @error('usage_policy_category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="answer" class="form-label">Descrição</label>
                    <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror"
                        placeholder="Descrição" {{ $disabled }}>{{ $answer }}</textarea>
                    @error('answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @if ($action != 'show')
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ $button }}</button>
                </div>
            @endif
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
    <script>
        /******/
        (() => { // webpackBootstrap
            var __webpack_exports__ = {};
            /*!************************************************!*\
              !*** ./resources/js/pages/form-editor.init.js ***!
              \************************************************/
            /*
            Template Name: Minible - Admin & Dashboard Template
            Author: Themesbrand
            Website: https://themesbrand.com/
            Contact: themesbrand@gmail.com
            File: Form editor Js File

            plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            */
            $(document).ready(function() {
                if ($("#answer").length > 0) {
                    tinymce.init({
                        selector: "textarea#answer",
                        height: 300,
                        plugins: [
                            "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview media fullpage | forecolor backcolor emoticons",
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color:#FFFFFF }',
                        style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                        }, {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                                color: '#ff0000'
                            }
                        }, {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                                color: '#ff0000'
                            }
                        }, {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                        }, {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                        }, {
                            title: 'Table styles'
                        }, {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                        }]
                    });
                }
            });
            /******/
        })();
    </script>
@endsection
