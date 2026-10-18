<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;color:#333;">
    <div style="max-width:600px;margin:0 auto;padding:24px;">
        <div style="background:#fff;border-radius:10px;overflow:hidden;border:1px solid #eaeaea;">
            <div style="background:#e2401c;color:#fff;padding:22px 26px;">
                <h1 style="margin:0;font-size:19px;">nom-domaine</h1>
            </div>

            <div style="padding:26px;">
                @if($isAdmin)
                    <h2 style="margin:0 0 6px;font-size:18px;">Nuevo mensaje de contacto</h2>
                    <p style="margin:0 0 18px;color:#666;">Has recibido un nuevo mensaje desde el formulario de contacto.</p>

                    <table style="width:100%;border-collapse:collapse;">
                        <tr><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;width:140px;color:#888;">Nombre</td><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;">{{ $data['name'] }}</td></tr>
                        <tr><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;color:#888;">Teléfono</td><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;">{{ $data['phone'] }}</td></tr>
                        <tr><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;color:#888;">Email</td><td style="padding:8px 0;border-bottom:1px solid #f0f0f0;">{{ $data['email'] }}</td></tr>
                    </table>

                    <h3 style="font-size:15px;margin:22px 0 8px;">Mensaje</h3>
                    <div style="background:#fafafa;border:1px solid #eee;border-radius:8px;padding:16px;white-space:pre-line;line-height:1.6;">{{ $data['message'] }}</div>
                @else
                    <h2 style="margin:0 0 6px;font-size:18px;">¡Gracias por contactarnos!</h2>
                    <p style="margin:0 0 18px;color:#555;line-height:1.6;">Hola {{ $data['name'] }},<br><br>Hemos recibido su mensaje correctamente y nuestro equipo le responderá lo antes posible.</p>

                    <h3 style="font-size:15px;margin:18px 0 8px;">Copia de su mensaje</h3>
                    <div style="background:#fafafa;border:1px solid #eee;border-radius:8px;padding:16px;white-space:pre-line;line-height:1.6;color:#444;">{{ $data['message'] }}</div>

                    <p style="margin:22px 0 0;color:#666;">Un saludo,<br>El equipo de nom-domaine</p>
                @endif
            </div>
        </div>
        <p style="text-align:center;color:#aaa;font-size:12px;margin-top:16px;">© {{ date('Y') }} nom-domaine</p>
    </div>
</body>
</html>
