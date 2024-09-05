<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div>
        <label for="barang_id">ID/Nama Barang:</label>
        <select name="barang_id" id="barang_id" required>
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" required>
    </div>
    <button type="submit">Simpan</button>
</form>