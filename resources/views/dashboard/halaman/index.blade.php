@extends('dashboard.layout')
@section('konten')
<p class="card-title">HALAMAN</p>
<div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn  btn-primary">Tambah Halaman</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Judul</th>
                <th class="col-2">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->judul }}</td>
                <td>
                    <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-sm btn-green">Lihat</a>
                    <form onsubmit="return confirm('Anda yakin akan menghapus data ini ?')"
                        action="{{ route('halaman.destroy', $item->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
</div>
@endsection



@foreach ($allNews as $index => $news)
{{ $index +1 }}. {{ $news -> title}} <i wire:click="$emitUp('editNews', {{ $news->id }})" class="fa fa-edit fa-xs"
    style="cursor:pointer; color:green"></i>
<i wire:click="$emitUp('deleteNews', {{ $news->id }})" class="fa fa-trash fa-xs"
    style="cursor:pointer; color:red"></i>
<br>
@endforeach
</div>