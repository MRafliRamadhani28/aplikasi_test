@foreach ($datas as $data)
<tr>
    <td width="1%">{{ date('m/d/Y', strtotime($data->tanggal)) }}</td>
    <td>{{ $data->master->kode }}</td>
    <td>{{ ucfirst($data->master->name) }}</td>
    <td>{{ ucfirst($data->deskripsi) }}</td>
    <td>{{ number_format($data->debit,0,',','.') }}</td>
    <td>{{ number_format($data->credit,0,',','.') }}</td>
    <td width="1%" align="center">
        <button class="btn btn-sm btn-success text-white ctooltip" title="ubah data" onClick="showForm({{ $data->id }})"><i class="fas fa-pencil-alt mx-0"></i></button>
        <button class="btn btn-sm btn-danger text-white ctooltip form-delete" title="hapus data" data-id="{{ $data->id }}" data-name="{{ $data->name }}"><i class="fas fa-trash-alt mx-0"></i></button>
    </td>
</tr>
@endforeach