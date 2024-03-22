@foreach ($data as $row)

<li class="swiper-slide">
    <div class="episode-block">
        <div class="block-image position-relative">
            <!-- <a href="#"> -->
                <img src="https://i.ytimg.com/vi/{{$row->link}}/hq720.jpg" class="img-fluid img-zoom" alt="showImg-" loading="lazy">
            <!-- </a> -->
            <div class="episode-number">Modulo {{$row->modulenumber}} / Aula {{$row->lessonnumber}}</div>
            <div class="episode-play">
                <a href="#" tabindex="0"><i class="fa-solid fa-play"></i></a>
            </div>
        </div>
        <div class="epi-desc p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="border-gredient-left text-white rel-date"><?= date('d/m/Y', strtotime($row->clupdated_at))?></span>
                <span class="text-primary run-time">{{$row->duration}}</span>
            </div>
            <!-- <a href="#"> -->
                <h5 class="epi-name text-white mb-0"> {{$row->lesson}} </h5>
            <!-- </a> -->
        </div>
    </div>
</li>
@endforeach
