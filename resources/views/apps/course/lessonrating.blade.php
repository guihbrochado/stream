<div class="d-flex gap-1">

    <input class="form-check-input rate" type="radio" name="flexRadioDefault" id="rate1" hidden <?php if ($rate == '1') {
                                                                                                    echo 'checked';
                                                                                                } ?> value="1">
    <label class="form-check-label" for="rate1" id="labelrate1">
        <i id="iconrate1" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
    </label>


    <input class="form-check-input rate" type="radio" name="flexRadioDefault" id="rate2" hidden <?php if ($rate == '2') {
                                                                                                    echo 'checked';
                                                                                                } ?> value="2">
    <label class="form-check-label" for="rate2" id="labelrate2">
        <i id="iconrate2" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
    </label>


    <input class="form-check-input rate" type="radio" name="flexRadioDefault" id="rate3" hidden <?php if ($rate == '3') {
                                                                                                    echo 'checked';
                                                                                                } ?> value="3">
    <label class="form-check-label" for="rate3" id="labelrate3">
        <i id="iconrate3" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
    </label>


    <input class="form-check-input rate" type="radio" name="flexRadioDefault" id="rate4" hidden <?php if ($rate == '4') {
                                                                                                    echo 'checked';
                                                                                                } ?> value="4">
    <label class="form-check-label" for="rate4" id="labelrate4">
        <i id="iconrate4" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
    </label>


    <input class="form-check-input rate" type="radio" name="flexRadioDefault" id="rate5" hidden <?php if ($rate == '5') {
                                                                                                    echo 'checked';
                                                                                                } ?> value="5">
    <label class="form-check-label" for="rate5" id="labelrate5">
        <i id="iconrate5" class="far fa-star fa-2xl icon" style="color: #ecba12;"></i>
    </label>

</div>


<script>
    $(document).ready(function() {     
        const rate = '{{$rate}}';

        paintStar(rate);
    });

    $('.rate').click(function(e) {
        $('.text-primary').removeClass('text-primary');

        var rate = $(this).val()
        const idlesson = Number('{{$idlesson}}');
        const urlstore = (`{{ url('/lesson-rating/ratingstore/${idlesson}/${rate}') }}`);

        $.get(urlstore, function(data) {});

        $('.icon').removeClass("far fa-star")
        $('.icon').removeClass("fas fa-star")

        paintStar(rate);
    });

    function paintStar(rate) {

        if (rate === '1') {
            console.log(rate);
            $('.icon').addClass("far fa-star")
            $('#iconrate1').addClass("fas fa-star")
        }
        if (rate === '2') {
            $('.icon').addClass("far fa-star")
            $('#iconrate1').addClass("fas fa-star")
            $('#iconrate2').addClass("fas fa-star")
        }
        if (rate === '3') {
            $('.icon').addClass("far fa-star")
            $('#iconrate1').addClass("fas fa-star")
            $('#iconrate2').addClass("fas fa-star")
            $('#iconrate3').addClass("fas fa-star")
        }
        if (rate === '4') {
            $('.icon').addClass("far fa-star")
            $('#iconrate1').addClass("fas fa-star")
            $('#iconrate2').addClass("fas fa-star")
            $('#iconrate3').addClass("fas fa-star")
            $('#iconrate4').addClass("fas fa-star")
        }
        if (rate === '5') {
            $('.icon').removeClass("far fa-star")
            $('.icon').addClass("fas fa-star")
        }
    }
</script>