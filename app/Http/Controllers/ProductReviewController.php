<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductReviewController extends Controller
{
    private const PURCHASED_STATUSES = [
        Order::STATUS_PAID,
        Order::STATUS_PROCESSING,
        Order::STATUS_SHIPPED,
        Order::STATUS_COMPLETED,
    ];

    public function store(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:2000',
        ]);

        $hasPurchased = Order::where('customer_email', $data['email'])
            ->whereIn('status', self::PURCHASED_STATUSES)
            ->whereHas('items', fn ($q) => $q->where('product_id', $product->id))
            ->exists();

        if (! $hasPurchased) {
            throw ValidationException::withMessages([
                'email' => 'Email ini belum pernah membeli produk tersebut. Ulasan hanya bisa ditulis oleh pembeli yang sudah melunasi pesanan.',
            ]);
        }

        ProductReview::create([
            'product_id'  => $product->id,
            'name'        => $data['name'],
            'email'       => $data['email'],
            'rating'      => $data['rating'],
            'comment'     => $data['comment'],
            'is_approved' => true,
        ]);

        return redirect()
            ->route('pages.frontend.product.detail', $product->slug)
            ->with('review_status', 'success')
            ->with('review_message', 'Review Anda berhasil diposting. Terima kasih!');
    }
}
