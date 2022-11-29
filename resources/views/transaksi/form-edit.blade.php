<div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/transaksi/{{ $data->id }}" method="post" class="form-edit">
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
                            <label for="kode">COA Kode</label>
                            <select class="single-select form-select" name="kode" id="kode" onchange="$('#name').val($(this).val().split('/', 2)[1])">
                                <option value="{{ $data->COA_kode }}/{{ $data->COA_nama }}" selected hidden>{{ $data->COA_kode }}</option>
                                @foreach ($datas as $datum)
                                    <option value="{{ $datum->kode }}/{{ $datum->name }}">{{ $datum->kode }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">@error('kode'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $data->COA_nama) }}">
                            <small class="form-text text-danger">@error('name'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="desc">Desc</label>
                            <input type="desc" class="form-control" id="desc" name="desc" value="{{ old('desc', $data->deskripsi) }}" placeholder="Deskripsi">
                            <small class="form-text text-danger">@error('desc'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="debit">Debit</label>
                            <input type="number" class="form-control" id="debit" name="debit" value="{{ old('debit', $data->debit) }}" placeholder="0">
                            <small class="form-text text-danger">@error('debit'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="credit">Credit</label>
                            <input type="number" class="form-control" id="credit" name="credit" value="{{ old('credit', $data->credit) }}" placeholder="0">
                            <small class="form-text text-danger">@error('credit'){{ $message }}@enderror</small>
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
      