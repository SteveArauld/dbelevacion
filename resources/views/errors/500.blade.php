<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error del servidor · 500</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" sizes="32x32">
    <style>
        :root { --brand: #e2401c; --ink: #1f2937; --muted: #6b7280; }
        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
            font-family: "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: linear-gradient(160deg, #fafafa 0%, #f1f1f1 100%); color: var(--ink); padding: 24px;
        }
        .err-card {
            width: 100%; max-width: 560px; background: #fff; border-radius: 16px; padding: 48px 36px;
            text-align: center; box-shadow: 0 18px 50px rgba(0,0,0,.08); border: 1px solid #eee;
        }
        .err-logo { height: 46px; width: auto; margin-bottom: 28px; }
        .err-code { font-size: 92px; line-height: 1; font-weight: 800; color: var(--brand); letter-spacing: -2px; margin: 0; }
        .err-title { font-size: 1.5rem; font-weight: 700; margin: 14px 0 10px; }
        .err-text { color: var(--muted); line-height: 1.6; margin: 0 0 28px; font-size: 1rem; }
        .err-actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
        .err-btn {
            display: inline-block; padding: 13px 26px; border-radius: 50px; font-weight: 600; text-decoration: none;
            font-size: .95rem; transition: opacity .2s, background .2s;
        }
        .err-btn-primary { background: var(--brand); color: #fff; }
        .err-btn-primary:hover { opacity: .9; }
        .err-btn-light { background: #f2f2f2; color: var(--ink); }
        .err-btn-light:hover { background: #e8e8e8; }
        @media (max-width: 480px) {
            .err-card { padding: 36px 22px; }
            .err-code { font-size: 70px; }
        }
    </style>
</head>
<body>
    <div class="err-card">
        <img class="err-logo" src="{{ asset('assets/images/logo.png') }}" alt="nom-domaine">
        <p class="err-code">500</p>
        <h1 class="err-title">Error del servidor</h1>
        <p class="err-text">Algo ha salido mal por nuestra parte. Estamos trabajando para solucionarlo. Por favor, inténtelo de nuevo en unos minutos.</p>
        <div class="err-actions">
            <a class="err-btn err-btn-primary" href="{{ url('/') }}">Volver al inicio</a>
            <a class="err-btn err-btn-light" href="javascript:location.reload()">Reintentar</a>
        </div>
    </div>
</body>
</html>
