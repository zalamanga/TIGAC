<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function show()
    {
        return view('pages.frontend.cart.index', [
            'items'    => $this->cart->all(),
            'subtotal' => $this->cart->subtotal(),
        ]);
    }

    public function add(Request $request, string $slug)
    {
        $data = $request->validate([
            'quantity' => 'nullable|integer|min:1|max:99',
        ]);

        $product  = Product::where('slug', $slug)->firstOrFail();
        $quantity = $data['quantity'] ?? 1;

        if (! is_null($product->stock) && $product->stock <= 0) {
            return back()
                ->with('status', 'error')
                ->with('message', 'Produk habis stok.');
        }

        if (! is_null($product->stock)) {
            $current  = collect($this->cart->all())->firstWhere('product_id', $product->id);
            $existing = $current ? (int) $current['quantity'] : 0;
            if ($existing + $quantity > $product->stock) {
                return back()
                    ->with('status', 'error')
                    ->with('message', "Stok tidak cukup. Tersisa {$product->stock}.");
            }
        }

        $this->cart->add($product, $quantity);

        return redirect()
            ->route('pages.frontend.cart.show')
            ->with('status', 'success')
            ->with('message', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, int $productId)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $product = Product::find($productId);
        if ($product && ! is_null($product->stock) && $data['quantity'] > $product->stock) {
            return back()
                ->with('status', 'error')
                ->with('message', "Stok tidak cukup. Tersisa {$product->stock}.");
        }

        $this->cart->update($productId, $data['quantity']);

        return back()
            ->with('status', 'success')
            ->with('message', 'Jumlah diperbarui.');
    }

    public function remove(int $productId)
    {
        $this->cart->remove($productId);

        return back()
            ->with('status', 'success')
            ->with('message', 'Item dihapus dari keranjang.');
    }

    public function clear()
    {
        $this->cart->clear();

        return back()
            ->with('status', 'success')
            ->with('message', 'Keranjang dikosongkan.');
    }
}
