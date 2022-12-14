<div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/category-coa/{{ $data->id }}" method="post" class="form-edit">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Category COA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="hidden" value="{{ $data->id }}" name="id">

                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option selected hidden>{{ ucfirst($data->status) }}</option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                            <small class="form-text text-danger">@error('status'){{ $message }}@enderror</small>

                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $data->name) }}">
                            <small class="form-text text-danger">@error('name'){{ $message }}@enderror</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-secondary text-white">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
      