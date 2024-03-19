<div class="d-flex align-items-center text-white text-detail flex-wrap mb-4">
    <span class="season_date ms-2">
        {{$count}} Modulos
    </span>
</div>
<div class="iq-custom-select d-inline-block sea-epi mb-4 selectmodulesdiv" id="">
    <select id="selectmodules{{$idcourse }}" class="form-control season-select select2-basic-single js-states selectmodules">
        <?php
        for ($i = 0; $i < $count; $i++) {
            $selected = ($i == 0) ? 'selected' : ''; ?>
            <option value="{{$data[$i]->id}}" $selected>{{$data[$i]->module}}</option>
        <?php } ?>
    </select>
</div>


<script>
    $(".selectmodules").change(function(e) {        
        const val = $(this).val()
       
        // function callAjaxLessons(idcourse, val) {
            var baseurl = "<?= url('/') ?>";
            var url = baseurl + '/ajaxCoursesLessons/' + '{{$idcourse }}' + '/' + val;

            $.get(url, function(data) {
                $('.divCoursesLessons').html(data);
                console.log("Ajax callAjaxLessons concluído com sucesso!");
            });
        // }
    });
</script>