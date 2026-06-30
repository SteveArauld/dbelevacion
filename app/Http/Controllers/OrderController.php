<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function create()
    {
        return view('pages.commander');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'billing_first_name' => 'required|string|max:120',
            'billing_last_name'  => 'required|string|max:120',
            'billing_company'    => 'nullable|string|max:160',
            'billing_country'    => 'required|string|max:80',
            'billing_address_1'  => 'required|string|max:200',
            'billing_address_2'  => 'nullable|string|max:200',
            'billing_postcode'   => 'required|string|max:20',
            'billing_city'       => 'required|string|max:120',
            'billing_state'      => 'nullable|string|max:120',
            'billing_phone'      => 'required|string|max:40',
            'billing_email'      => 'required|email|max:160',
            'order_comments'     => 'nullable|string|max:1000',
            'payment_method'     => 'nullable|string|max:60',
            'cart_data'          => 'required|string',
        ]);

        // Décoder le panier (localStorage) envoyé par le formulaire
        $items = json_decode($data['cart_data'], true);

        if (!is_array($items) || count($items) === 0) {
            return back()
                ->withInput()
                ->withErrors(['cart_data' => 'Su carrito está vacío.']);
        }

        $lines = [];
        $total = 0;
        foreach ($items as $it) {
            $price = (float) ($it['price'] ?? 0);
            $qty   = max(1, (int) ($it['qty'] ?? 1));
            $total += $price * $qty;
            $lines[] = [
                'name'     => $it['name'] ?? 'Producto',
                'price'    => $price,
                'qty'      => $qty,
                'subtotal' => $price * $qty,
            ];
        }

        // Adresse de livraison différente (facultative)
        $shipping = null;
        if ($request->boolean('ship_to_different_address')) {
            $shipping = [
                'name'     => trim($request->input('shipping_first_name', '') . ' ' . $request->input('shipping_last_name', '')),
                'company'  => $request->input('shipping_company', ''),
                'address'  => trim($request->input('shipping_address_1', '') . ' ' . $request->input('shipping_address_2', '')),
                'postcode' => $request->input('shipping_postcode', ''),
                'city'     => $request->input('shipping_city', ''),
                'state'    => $request->input('shipping_state', ''),
                'country'  => $request->input('shipping_country', ''),
            ];
        }

        $order = [
            'number'     => 'DBE-' . strtoupper(Str::random(8)),
            'date'       => now()->format('d/m/Y H:i'),
            'customer'   => [
                'name'    => trim($data['billing_first_name'] . ' ' . $data['billing_last_name']),
                'company' => $data['billing_company'] ?? '',
                'email'   => $data['billing_email'],
                'phone'   => $data['billing_phone'],
                'address' => trim(($data['billing_address_1'] ?? '') . ' ' . ($data['billing_address_2'] ?? '')),
                'city'    => $data['billing_city'],
                'state'   => $data['billing_state'] ?? '',
                'postcode' => $data['billing_postcode'],
                'country' => $data['billing_country'],
            ],
            'shipping'   => $shipping,
            'comments'   => $data['order_comments'] ?? '',
            'payment'    => $data['payment_method'] ?? 'Transferencia bancaria',
            'items'      => $lines,
            'total'      => $total,
        ];

        $adminEmail = env('ADMIN_EMAIL', 'contacto@nom-domaine.com');

        // Email au client + à l'administrateur
        try {
            Mail::to($order['customer']['email'])->send(new OrderPlaced($order, false));
            Mail::to($adminEmail)->send(new OrderPlaced($order, true));
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()
            ->route('checkout.thanks')
            ->with('order', $order);
    }

    public function thanks(Request $request)
    {
        $order = session('order');

        if (!$order) {
            return redirect()->route('home');
        }

        return view('pages.commander-gracias', compact('order'));
    }
}
