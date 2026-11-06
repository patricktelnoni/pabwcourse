<x-guest-layout>


  <h2>Vertical (basic) form</h2>
  <form action="{{ route('produks.store')}}" method="POST">
    <div class="mt-4">
      <x-input-label for="nama_produk">Nama:</x-input-label>
      <x-text-input type="text" class="block mt-1 w-full"
        id="nama_produk" placeholder="Enter nama" 
        name="nama_produk" />
      @error('nama_produk')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
    </div>
    <div class="mt-4">
      <x-input-label for="deskripsi">Deskripsi:</x-input-label>
      <x-text-input type="text" class="block mt-1 w-full" id="deskripsi" placeholder="Enter deskripsi" name="deskripsi"/>
      @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="mt-4">
      <x-input-label for="harga">Harga:</x-input-label>
      <x-text-input type="text" class="block mt-1 w-full" id="harga" placeholder="Enter harga" name="harga"/>
      @error('harga')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mt-4">
      <x-input-label for="stok">Stok:</x-input-label>
      <x-text-input type="text" class="block mt-1 w-full" id="stok" placeholder="Enter stok" name="stok"/>
      @error('stok')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <x-primary-button type="submit" class="btn btn-default">Submit</x-primary-button>
  </form>


</x-guest-layout>
