@foreach ($data as $row)
<tr>
  <td>
    <div class="iq-button">
      <a href="{{ route('course.lesson', ['id' => $row->id] )  }}" class="btn text-uppercase position-relative">
        <span class="button-text"> Assista agora</span>
        <i class="fa-solid fa-play"></i>
      </a>
    </div>
  </td>
  <td>
    {{$row->lesson}}
  </td>
  <td>
    {{$row->duration}}
  </td>
  <td>
    {{$row->author}}
  </td>
  <td>
    {{date("d/m/Y", strtotime($row->created_at))}}
  </td>
</tr>
@endforeach