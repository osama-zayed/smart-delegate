<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                       Add Post  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="content"> post content
                                <span class="text-danger">*
                                    @error('content')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <textarea id="content" type="text" name="content" class="form-control"
                            value="{{ old('content') }}" placeholder="Enter the post content" required cols="30" rows="10"></textarea>
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="image"> Post image
                                <span class="text-danger">*
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </label>
                            <input id="file" type="file" name="image" class="form-control"
                                value="{{ old('image') }}" placeholder="Enter the post image" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
