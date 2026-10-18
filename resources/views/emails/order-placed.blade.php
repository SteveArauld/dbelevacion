<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $order['number'] }}</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;color:#333;">
    <div style="max-width:620px;margin:0 auto;padding:24px;">
        <div style="background:#fff;border-radius:10px;overflow:hidden;border:1px solid #eaeaea;">
            <div style="background:#e2401c;color:#fff;padding:24px 28px;">
                <h1 style="margin:0;font-size:20px;">nom-domaine</h1>
            </div>

            <div style="padding:28px;">
                @if($isAdmin)
                    <h2 style="margin:0 0 6px;font-size:18px;">Nuevo pedido recibido</h2>
                    <p style="margin:0 0 18px;color:#666;">Se ha realizado un nuevo pedido en la tienda.</p>
                @else
                    <h2 style="margin:0 0 6px;font-size:18px;">¡Gracias por su pedido!</h2>
                    <p style="margin:0 0 18px;color:#666;">Hemos recibido su pedido correctamente. A continuación el resumen.</p>
                @endif

                <p style="margin:0 0 4px;"><strong>Pedido:</strong> {{ $order['number'] }}</p>
                <p style="margin:0 0 18px;"><strong>Fecha:</strong> {{ $order['date'] }}</p>

                <table style="width:100%;border-collapse:collapse;margin-bottom:22px;">
                    <thead>
                        <tr>
                            <th align="left" style="padding:10px;border-bottom:2px solid #eee;font-size:13px;color:#888;">Producto</th>
                            <th align="center" style="padding:10px;border-bottom:2px solid #eee;font-size:13px;color:#888;">Cant.</th>
                            <th align="right" style="padding:10px;border-bottom:2px solid #eee;font-size:13px;color:#888;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order['items'] as $item)
                            <tr>
                                <td style="padding:10px;border-bottom:1px solid #f0f0f0;">{{ $item['name'] }}</td>
                                <td align="center" style="padding:10px;border-bottom:1px solid #f0f0f0;">{{ $item['qty'] }}</td>
                                <td align="right" style="padding:10px;border-bottom:1px solid #f0f0f0;">{{ number_format($item['subtotal'], 2, ',', '.') }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="right" style="padding:12px 10px;font-weight:bold;">Total</td>
                            <td align="right" style="padding:12px 10px;font-weight:bold;color:#e2401c;font-size:16px;">{{ number_format($order['total'], 2, ',', '.') }} €</td>
                        </tr>
                    </tfoot>
                </table>

                <h3 style="font-size:15px;margin:0 0 10px;border-bottom:1px solid #eee;padding-bottom:6px;">Datos de facturación</h3>
                <p style="margin:0 0 18px;line-height:1.6;color:#444;">
                    {{ $order['customer']['name'] }}<br>
                    @if($order['customer']['company']) {{ $order['customer']['company'] }}<br> @endif
                    {{ $order['customer']['address'] }}<br>
                    {{ $order['customer']['postcode'] }} {{ $order['customer']['city'] }} {{ $order['customer']['state'] }}<br>
                    {{ $order['customer']['country'] }}<br>
                    Tel: {{ $order['customer']['phone'] }}<br>
                    Email: {{ $order['customer']['email'] }}
                </p>

                <p style="margin:0 0 6px;"><strong>Método de pago:</strong> {{ $order['payment'] }}</p>
                @if(!empty($order['comments']))
                    <p style="margin:0 0 6px;"><strong>Notas:</strong> {{ $order['comments'] }}</p>
                @endif

                @unless($isAdmin)
                    <div style="margin-top:24px;background:#f7f7f7;border-radius:8px;padding:16px;font-size:14px;color:#555;">
                        Realice su pago mediante transferencia bancaria. Una vez confirmado su pedido, recibirá nuestros datos bancarios. Indique su número de pedido <strong>{{ $order['number'] }}</strong> como concepto.
                    </div>
                @endunless
            </div>
        </div>
        <p style="text-align:center;color:#aaa;font-size:12px;margin-top:16px;">© {{ date('Y') }} nom-domaine</p>
    </div>
</body>
</html>
