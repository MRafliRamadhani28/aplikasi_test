<x-app title="Category COA">

    <x-breadcrumb title="Laporan">
    </x-breadcrumb>
    
    <x-table-responsive>
        <thead>
            <tr>
                <th>Category</th>
                @foreach ($months as $month)
                <th>{{ $month[0] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody id="tBody">
        </tbody>
    </x-table-responsive>

</x-app>