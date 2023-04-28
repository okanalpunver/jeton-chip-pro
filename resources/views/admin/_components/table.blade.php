<div class="table-responsive">
    <table id="{{ $id ?? 'table' }}" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                @foreach ($fields as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
        </thead>
    </table>
</div>
    