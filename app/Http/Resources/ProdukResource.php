<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'nama_produk'   => $this->nama_produk,
            'harga'         => "Rp.".number_format($this->harga, 0, ',', '.'),
            'deskripsi'     => $this->deskripsi,
            'jumlah_stok'   => $this->jumlah_stok,
            'gambar'        => $this->gambar,
        ];
    }
}
