










@forelse ($data as $row)
<div class="form-group">
    <label class="mb-2">
        {{$row->username}}        
    </label>
    <textarea class="form-control"  cols="5" rows="1" disabled > {{$row->comment}} </textarea>
</div>
@empty
    <h4>Faça o primeiro comentário!</h4>
@endforelse


