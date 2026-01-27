<ul tabindex="0"
    class="mt-3 p-2 shadow dropdown-content bg-base-100 rounded-box w-52
           flex flex-col items-end">

    <!-- Riwayat Pembelian -->
    <li class="w-full">
        <a href="{{ route('orders.index') }}"
           class="block w-full text-right px-4 py-2 hover:bg-base-200">
            Riwayat Pembelian
        </a>
    </li>

    <!-- Divider -->
    <div class="border-t w-full my-1"></div>

    <!-- Logout -->
    <li class="w-full">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="block w-full text-right px-4 py-2 text-red-600 hover:bg-base-200">
                Logout
            </button>
        </form>
    </li>

</ul>
