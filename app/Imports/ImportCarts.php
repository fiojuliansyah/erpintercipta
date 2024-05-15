<?php

namespace App\Imports;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportCarts implements ToModel, WithStartRow, WithHeadingRow
{
    private $item_id;

    public function __construct($item_id)
    {
        $this->item_id = $item_id;
    }

    public function model(array $row)
    {
        $user = Auth::user();
    
        // Cek apakah ada kolom 'accurate_id' di baris
        if (!isset($row['accurate_id'])) {
            return null;
        }

        // Lakukan pencarian produk berdasarkan accurate_id
        $product = Product::where('accurate_id', $row['accurate_id'])->first();
    
        return new Cart([
            'user_id' => $user->id,
            'item_request_id' => $this->item_id,
            'product_id' => $product->id,
            'quantity' => $row['quantity'], // Menggunakan nama kolom 'quantity' dari file Excel
            'status' => 'waiting'
        ]);
    }
    

    public function startRow(): int
    {
        return 2;
    }
}

