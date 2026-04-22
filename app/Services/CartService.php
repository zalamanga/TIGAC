<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartService
{
    private const KEY = 'cart';

    public function add(Product $product, int $qty = 1): void
    {
        $cart = $this->raw();
        $id   = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name'       => $product->name,
                'slug'       => $product->slug,
                'price'      => (int) $product->price,
                'quantity'   => $qty,
                'image_path' => optional($product->images->first())->image_path,
            ];
        }

        if ($cart[$id]['quantity'] < 1) {
            unset($cart[$id]);
        }

        Session::put(self::KEY, $cart);
    }

    public function update(int $productId, int $qty): void
    {
        $cart = $this->raw();

        if (! isset($cart[$productId])) {
            return;
        }

        if ($qty < 1) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['quantity'] = $qty;
        }

        Session::put(self::KEY, $cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->raw();
        unset($cart[$productId]);
        Session::put(self::KEY, $cart);
    }

    public function clear(): void
    {
        Session::forget(self::KEY);
    }

    public function all(): Collection
    {
        return collect($this->raw())->values();
    }

    public function count(): int
    {
        return (int) collect($this->raw())->sum('quantity');
    }

    public function subtotal(): int
    {
        return (int) collect($this->raw())
            ->sum(fn ($i) => $i['price'] * $i['quantity']);
    }

    public function isEmpty(): bool
    {
        return empty($this->raw());
    }

    private function raw(): array
    {
        return Session::get(self::KEY, []);
    }
}
