@csrf


<div class="from-group">
    <label for="title">Título</label>
    <input class="form-control" type="text" name="title" id="title"
    value="{{ old('title',$post->title)}}">
</div>
<div class="form-group">
<label for="url_clean">UR limpia</label>
<input readonly class="form-control" type="text" name="title" id="url_clean"
value="{{ old('url_clean',$post->url_clean)}}">
</div>

</div>
<div class="form-group">
<label for="content">Contenido</label>
<textarea class="form-control" id="tontent" name="content" rows="3">
    {{ old('content',$post->content)}}
</textarea>
</div>

<input type="submit" value="Enviar" class="btn btn-primary">
