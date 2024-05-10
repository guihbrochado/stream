<!doctype html>
<html lang="en" dir="ltr">

@include('components.headdash')

<body>
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
                <img src="{{ asset('assets/images/loader.gif') }}" alt="loader" class="image-loader img-fluid">
            </div>
        </div>
    </div>
    <!-- loader END -->
    @include('components.sidebardash')

    <main class="main-content">
        <div class="position-relative">
            @include('layouts.navdash')
        </div>
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Adicionar Aula</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="row g-3 needs-validation" action="{{ route('courseslessons.store') }}" method="post" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @php $message = "Este campo é obrigatório"; @endphp

                                    <!-- Dados Gerais -->
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label" for="lesson">Aula</label>
                                            <input id="lesson" required name="lesson" type="text" class="form-control @error('lesson') is-invalid @enderror" placeholder="Aula" maxlength="100">
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="lessonnumber">Número da Aula</label>
                                            <input required id="lessonnumber" name="lessonnumber" type="number" class="form-control @error('lessonnumber') is-invalid @enderror" placeholder="Número da Aula" min="1">
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="author">Autor</label>
                                            <input required id="author" name="author" type="text" class="form-control @error('author') is-invalid @enderror" placeholder="Autor" min="1">
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="id_module">Curso - Módulo</label>
                                            <select required class="form-control" name="id_module" id="id_module">
                                                <option value="">Selecione...</option>
                                                @foreach ($modulesandcourses as $row)
                                                <option value="{{ $row->id }}"> {{ $row->coursename . ' - ' . $row->module }} </option>
                                                @endforeach
                                            </select>
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Campo de Upload de Vídeo -->
                                    <div class="row g-3 mt-1">
                                        <div class="col-md-4">
                                            <label class="form-label" for="video_file">Vídeo da Aula</label>
                                            <input required id="video_file" name="video_file" type="file" accept="video/*" class="form-control @error('video_file') is-invalid @enderror">
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="duration">Duração do Vídeo</label>
                                            <input required id="duration" name="duration" step="1" type="time" class="form-control @error('duration') is-invalid @enderror">
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-label" for="tags">TAG:</label>
                                            <input type="text" name="tags" class="form-control" placeholder="Digite as tags, separadas por vírgula">
                                        </div>
                                    </div>

                                    <!-- Campos de Descrição e Materiais -->
                                    <div class="row g-3 mt-1">
                                        <div class="col-md-12">
                                            <label class="form-label" for="description">Descrição</label>
                                            <textarea required id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descrição"></textarea>
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-1">
                                        <div class="col-md-12">
                                            <label class="form-label" for="materials">Materiais</label>
                                            <textarea required id="materials" name="materials" class="form-control @error('materials') is-invalid @enderror" placeholder="Materiais"></textarea>
                                            @error('coursesModules')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Botões -->
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route($controller) }}" class="btn btn-secondary">
                                            Voltar
                                        </a>
                                        <button class="btn btn-primary" type="submit">
                                            Enviar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="javascript:void(0);">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="javascript:void(0);">Terms of Use</a></li>
                </ul>
                <div class="right-panel">
                    ©<script>
                        document.write(new Date().getFullYear());
                    </script> <span data-setting="app_name">Streamit</span>, Made with <span class="text-gray"></span> by <a href="https://iqonic.design/" target="_blank">IQONIC Design</a>.
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->
    @include('layouts.vendor-script-dash')

    <script>
        $('#isfree').click(function(e) {
            const checked = $("#isfree").prop('checked');
            if (checked === true) {
                $("#price").prop('disabled', 'true').val('');
            } else {
                $("#price").removeAttr('disabled');
            }
        });
    </script>
</body>

</html>
