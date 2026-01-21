<x-layouts.admin>
    <h1 class="text-xl font-bold mb-4">
        {{ isset($paymentType) ? 'Edit' : 'Tambah' }} Tipe Pembayaran
    </h1>

    <form method="POST"
          action="{{ isset($paymentType)
            ? route('admin.payment-types.update', $paymentType)
            : route('admin.payment-types.store') }}">
        @csrf
        @isset($paymentType) @method('PUT') @endisset

        <div class="mb-4">
            <label class="block mb-1">Nama Tipe Pembayaran</label>
            <input type="text" name="name"
                   value="{{ old('name', $paymentType->name ?? '') }}"
                   class="input input-bordered w-full" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</x-layouts.admin>
