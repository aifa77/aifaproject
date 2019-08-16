{{csrf_field()}}
<input type="hidden" name="user_id" value={!! $users->id !!} readonly>
<input type="text" name="title" placeholder="Title" class="form-control col-md-6" autofocus>
<small class="text-danger">{{ $errors->first('title') }}</small><br>
<textarea name="content" id="" cols="30" rows="10" placeholder="Content" class="form-control col-md-6"></textarea>
<small class="text-danger">{{ $errors->first('content') }}</small><br>
<input type="file" name="file" class="form-control col-md-6">
<small class="text-danger">{{ $errors->first('file') }}</small><br>
<input type="button" value="Back" onclick="window.location.href='{{route('articles.index')}}';" class="btn btn-default">
<input type="submit" name="submit" value="Save" class="btn btn-info">


