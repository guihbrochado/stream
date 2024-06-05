@foreach($data as $comment)
<div class="tab-bg-gredient-center">
    <strong>{{ $comment->username }}:</strong>
    <p>{{ $comment->comment }}</p>

</div>
@endforeach