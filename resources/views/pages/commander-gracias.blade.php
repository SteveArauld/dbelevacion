@extends('layouts.app')

@section('title', 'Pedido confirmado')

@push('styles')
<style>
    .dbe-thanks { max-width: 760px; margin: 0 auto; padding: 60px 16px; text-align: center; }
    .dbe-thanks .check { width: 72px; height: 72px; border-radius: 50%; background: #1a8f3c; color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: 38px; margin-bottom: 20px; }
    .dbe-thanks h1 { font-size: 1.9rem; font-weight: 700; margin-bottom: 10px; }
    .dbe-thanks .lead { color: #666; margin-bottom: 30px; }
    .dbe-order-box { text-align: left; background: #fafafa; border: 1px solid #eee; border-radius: 10px; padding: 26px; margin-bottom: 30px; }
    .dbe-order-box h3 { font-size: 1.1rem; font-weight: 700; margin: 0 0 14px; }
    .dbe-order-box table { width: 100%; border-collapse: collapse; }
    .dbe-order-box th, .dbe-order-box td { padding: 10px 0; border-bottom: 1px solid #ececec; text-align: left; font-size: .92rem; }
    .dbe-order-box td.amount { text-align: right; }
    .dbe-order-box .order-total td, .dbe-order-box .order-total th { font-weight: 700; border-bottom: 0; font-size: 1.1rem; color: #e2401c; }
    .dbe-order-meta { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 18px; font-size: .95rem; }
    .dbe-btn-home { display: inline-block; background: #e2401c; color: #fff; padding: 14px 30px; border-radius: 6px; text-decoration: none; font-weight: 700; }
</style>
@endpush

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="woostify-container">
        <div class="dbe-thanks">
            <div class="check">&#10003;</div>
            <h1>¡Gracias por su pedido!</h1>
            <p class="lead">Hemos recibido su pedido correctamente. Le hemos enviado un correo de confirmación a <strong>{{ $order['customer']['email'] }}</strong>.</p>

            <div class="dbe-order-box">
                <div class="dbe-order-meta">
                    <span><strong>Pedido:</strong> {{ $order['number'] }}</span>
                    <span><strong>Fecha:</strong> {{ $order['date'] }}</span>
                </div>

                <h3>Resumen</h3>
                <table>
                    <tbody>
                        @foreach($order['items'] as $item)
                            <tr>
                                <td>{{ $item['name'] }} <strong>× {{ $item['qty'] }}</strong></td>
                                <td class="amount">{{ number_format($item['subtotal'], 2, ',', '.') }} €</td>
                            </tr>
                        @endforeach
                        <tr class="order-total">
                            <th>Total</th>
                            <td class="amount">{{ number_format($order['total'], 2, ',', '.') }} €</td>
                        </tr>
                    </tbody>
                </table>

                <p style="margin-top:18px;color:#555;font-size:.9rem;">
                    Método de pago: <strong>{{ $order['payment'] }}</strong>.
                    Indique el número de pedido <strong>{{ $order['number'] }}</strong> como concepto de su transferencia.
                </p>
            </div>

            <a href="{{ route('home') }}" class="dbe-btn-home">Volver a la tienda</a>
        </div>
    </div>
</div>

{{-- Vider le panier après une commande réussie --}}
<script>
    try { localStorage.removeItem('dbe_cart'); } catch (e) {}
</script>
@endsection
