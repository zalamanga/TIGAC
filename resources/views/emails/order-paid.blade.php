<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pembayaran Diterima</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #198754;">Pembayaran Anda Telah Diterima</h2>
    <p>Halo {{ $order->customer_name }},</p>
    <p>Terima kasih! Kami sudah menerima pembayaran untuk pesanan Anda.</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tr>
            <td style="padding: 8px 0;"><strong>Nomor Pesanan</strong></td>
            <td style="padding: 8px 0; text-align: right;">{{ $order->order_number }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0;"><strong>Dibayar Pada</strong></td>
            <td style="padding: 8px 0; text-align: right;">
                {{ optional($order->paid_at)->format('d M Y H:i') ?? '-' }}
            </td>
        </tr>
    </table>

    <h3 style="margin-top: 30px; border-bottom: 1px solid #ddd; padding-bottom: 8px;">Item</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f5f5f5;">
                <th style="text-align: left; padding: 8px;">Produk</th>
                <th style="text-align: right; padding: 8px;">Qty</th>
                <th style="text-align: right; padding: 8px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 8px;">{{ $item->product_name }}</td>
                    <td style="padding: 8px; text-align: right;">{{ $item->quantity }}</td>
                    <td style="padding: 8px; text-align: right;">
                        Rp{{ number_format($item->subtotal, 0, '.', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <td style="padding: 4px 0;">Subtotal</td>
            <td style="padding: 4px 0; text-align: right;">
                Rp{{ number_format($order->subtotal, 0, '.', '.') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 4px 0;">Ongkos Kirim</td>
            <td style="padding: 4px 0; text-align: right;">
                Rp{{ number_format($order->shipping_cost, 0, '.', '.') }}
            </td>
        </tr>
        <tr style="font-weight: bold; font-size: 18px; border-top: 2px solid #333;">
            <td style="padding: 8px 0;">Total</td>
            <td style="padding: 8px 0; text-align: right;">
                Rp{{ number_format($order->total, 0, '.', '.') }}
            </td>
        </tr>
    </table>

    <h3 style="margin-top: 30px; border-bottom: 1px solid #ddd; padding-bottom: 8px;">Dikirim Ke</h3>
    <p style="white-space: pre-line;">{{ $order->shipping_address }}</p>

    <p style="margin-top: 30px; color: #666; font-size: 13px;">
        Pesanan Anda sedang kami proses dan akan segera dikirim. Terima kasih telah berbelanja di Tigac.id.
    </p>
</body>
</html>
