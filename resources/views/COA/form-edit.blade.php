<div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/coa/{{ $data->id }}" method="post" class="form-edit">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Category Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="hidden" value="{{ $data->id }}" name="id">

                            <label for="kode">Kode</label>
                            <input type="number" class="form-control" id="kode" name="kode" value="{{ old('kode', $data->kode) }}">
                            <small class="form-text text-danger">@error('kode'){{ $message }}@enderror</small>

                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $data->name) }}">
                            <small class="form-text text-danger">@error('name'){{ $message }}@enderror</small>

                            <label for="status">Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="{{ $data->id }}" selected hidden>{{ $data->categoryCOA->name }}</option>
                                @foreach ($datas as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">@error('kategori'){{ $message }}@enderror</small>
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
      