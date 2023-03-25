
@extends('marster')
@section('content')

<div class="from-group">
    <label for="title">Título</label>
    <input readonly class="form-control" type="text" name="title" value="{{"$post->title"}}">
</div>
<div class="form-group">
<label for="title">UR limpia</label>
<input readonly class="form-control" type="text" name="title" value="{{"$post->url-clean"}}">
</div>

</div>
<div class="form-group">
<label for="title">Contenido</label>
<input readonly class="form-control" type="text" name="title" value="{{"$post->content"}}">
</div>

@endsection
