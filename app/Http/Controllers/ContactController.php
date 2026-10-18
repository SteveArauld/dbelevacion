<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:160',
            'phone'   => 'required|string|max:40',
            'email'   => 'required|email|max:160',
            'message' => 'required|string|max:5000',
            'accept'  => 'accepted',
        ], [
            'accept.accepted' => 'Debe aceptar los términos y condiciones.',
        ]);

        $adminEmail = env('ADMIN_EMAIL', 'contacto@nom-domaine.com');

        try {
            // Message à l'administrateur
            Mail::to($adminEmail)->send(new ContactMessage($data, true));
            // Accusé de réception au client
            Mail::to($data['email'])->send(new ContactMessage($data, false));
        } catch (\Throwable $e) {
            report($e);
            return back()
                ->withInput()
                ->with('contact_error', 'No se pudo enviar el mensaje. Inténtelo de nuevo más tarde.');
        }

        return back()->with('contact_success', '¡Gracias! Su mensaje ha sido enviado. Le responderemos lo antes posible.');
    }
}
