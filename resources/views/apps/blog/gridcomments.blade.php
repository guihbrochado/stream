@forelse ($data as $row)
<div class="row">
  <div class="iq-author-details d-flex align-items-center justify-content-between gap-2">
    <div class="d-flex align-items-center gap-2">
      <div class="iq-author-image d-flex align-items-center gap-2">
        <img src="assets/images/user/user1.webp" class="img-fluid avatar-40 rounded-circle" alt="user">
      </div>
      <span class="font-size-14">
        <a href="#">{{ $row->name }}</a>
      </span>
    </div>
    <div class="iq-published-date">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2.19336 5.59936H11.8109" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M9.39685 7.70678H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M7.00232 7.70678H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M4.60291 7.70678H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M9.39685 9.80371H9.40185" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M7.00232 9.80371H7.00732" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M4.60291 9.80371H4.6079" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M9.18255 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path d="M4.82318 1.60425V3.37991" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8571 2.4563H2.14453V12.3959H11.8571V2.4563Z" stroke="#E50914" stroke-width="1.5" stroke-linecap="square"></path>
      </svg>
      <span class="font-size-14 text-uppercase">
        <span >{{ date("d/m/Y", strtotime($row->created_at)) }}</span>
      </span>
    </div>
  </div>
</div>

<div class="row">
  <span>{{ $row->comment }}</span>
</div>

@empty
<h6 class="mt-5">Sem comentários até o momento...</h6>
@endforelse