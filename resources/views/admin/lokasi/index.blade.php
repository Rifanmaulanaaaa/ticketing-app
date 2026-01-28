<x-layouts.admin title="Manajemen Lokasi">
   
    @if (session('success'))
        <div class="toast toast-bottom toast-center">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
        setTimeout(() => {
            document.querySelector('.toast')?.remove()
        }, 3000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-semibold">Manajemen Lokasi</h1>
            <a href="{{ route('admin.lokasi.create') }}" class="btn btn-primary ml-auto">Tambah Lokasi</a>
        </div>

        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lokasis as $index => $lokasi)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $lokasi->nama_lokasi }}</td>
                            <td class="space-x-2">
                                <a href="{{ route('admin.lokasi.edit', $lokasi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form method="POST" action="{{ route('admin.lokasi.destroy', $lokasi->id) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-red-500 text-white" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Tidak ada lokasi tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $lokasis->links() }}
        </div>
    </div>
</x-layouts.admin>
