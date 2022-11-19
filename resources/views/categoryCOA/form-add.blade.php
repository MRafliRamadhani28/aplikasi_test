<div class="modal fade" id="modal-add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/category-coa" method="post" class="form-add">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Category Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            <small class="form-text text-danger">@error('name'){{ $message }}@enderror</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-secondary text-white">Add Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
      