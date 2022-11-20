@foreach ($datas as $data)
<tr>
    <td width="1%">{{ $data->kode }}</td>
    <td>{{ ucfirst($data->name) }}</td>
    <td>{{ ucfirst($data->categoryCOA->name) }}</td>
    <td width="1%" align="center">
        <button class="btn btn-sm btn-success text-white ctooltip" title="ubah data" onClick="showForm({{ $data->id }})"><i class="fas fa-pencil-alt mx-0"></i></button>
        <button class="btn btn-sm btn-danger text-white ctooltip form-delete" title="hapus data" data-id="{{ $data->id }}" data-name="{{ $data->name }}"><i class="fas fa-trash-alt mx-0"></i></button>
    </td>
</tr>
@endforeach