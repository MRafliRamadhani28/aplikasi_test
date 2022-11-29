<div class="modal fade" id="modal-add" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/transaksi" method="post" class="form-add">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="kode">COA Kode</label>
                            <select class="single-select form-select" name="kode" id="kode" onchange="$('#name').val($(this).val().split('/', 2)[1])">
                                <option selected disabled>Select Code</option>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->kode }}/{{ $data->name }}">{{ $data->kode }} - {{ $data->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">@error('kode'){{ $message }}@enderror</small>
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            <small class="form-text text-danger">@error('name'){{ $message }}@enderror</small>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <label for="desc">Desc</label>
                            <input type="desc" class="form-control" id="desc" name="desc" value="{{ old('desc') }}" placeholder="Deskripsi">
                            <small class="form-text text-danger">@error('desc'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="debit">Debit</label>
                            <input type="number" class="form-control" id="debit" name="debit" value="{{ old('debit') }}" placeholder="0">
                            <small class="form-text text-danger">@error('debit'){{ $message }}@enderror</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="credit">Credit</label>
                            <input type="number" class="form-control" id="credit" name="credit" value="{{ old('credit') }}" placeholder="0">
                            <small class="form-text text-danger">@error('credit'){{ $message }}@enderror</small>
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
      