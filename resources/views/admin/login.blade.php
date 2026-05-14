<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login – Portfolio</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --bg:      #0a0a0f;
    --surface: #13131a;
    --border:  #2a2a3a;
    --accent:  #6c63ff;
    --accent2: #ff6b9d;
    --text:    #e8e8f0;
    --muted:   #666680;
  }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Syne', sans-serif;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  /* Animated grid background */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image:
      linear-gradient(rgba(108,99,255,.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(108,99,255,.05) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: gridMove 20s linear infinite;
    pointer-events: none;
  }
  @keyframes gridMove { to { transform: translateY(50px); } }

  .glow {
    position: fixed;
    width: 500px; height: 500px;
    border-radius: 50%;
    filter: blur(120px);
    opacity: .15;
    pointer-events: none;
  }
  .glow-1 { background: var(--accent);  top: -100px; left: -100px; }
  .glow-2 { background: var(--accent2); bottom: -100px; right: -100px; }

  .card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 48px 40px;
    width: 100%;
    max-width: 400px;
    position: relative;
    z-index: 1;
    animation: fadeUp .5s ease both;
  }
  @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:none; } }

  .logo { font-size: 1.6rem; font-weight: 800; letter-spacing: -1px; margin-bottom: 8px; }
  .logo span { color: var(--accent); }
  .subtitle { color: var(--muted); font-family: 'Space Mono', monospace; font-size: .8rem; margin-bottom: 36px; }

  label { display: block; font-size: .8rem; color: var(--muted); margin-bottom: 6px; letter-spacing: 1px; text-transform: uppercase; }

  input[type=text], input[type=password] {
    width: 100%;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    color: var(--text);
    font-family: 'Space Mono', monospace;
    font-size: .9rem;
    padding: 12px 16px;
    margin-bottom: 20px;
    transition: border-color .2s;
    outline: none;
  }
  input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(108,99,255,.15); }

  .btn {
    width: 100%;
    background: var(--accent);
    border: none;
    border-radius: 8px;
    color: #fff;
    cursor: pointer;
    font-family: 'Syne', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    padding: 14px;
    transition: opacity .2s, transform .1s;
    letter-spacing: .5px;
  }
  .btn:hover { opacity: .9; transform: translateY(-1px); }
  .btn:active { transform: translateY(0); }

  .error {
    background: rgba(255,107,107,.1);
    border: 1px solid rgba(255,107,107,.3);
    border-radius: 8px;
    color: #ff6b6b;
    font-size: .85rem;
    padding: 12px 16px;
    margin-bottom: 20px;
  }

  .back { display: block; text-align: center; margin-top: 20px; color: var(--muted); font-size: .85rem; text-decoration: none; }
  .back:hover { color: var(--accent); }

  .hint { color: var(--muted); font-size: .75rem; font-family: 'Space Mono', monospace; margin-top: 20px; text-align: center; }
</style>
</head>
<body>
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<div class="card">
  <div class="logo">Amine<span>.</span></div>
  <div class="subtitle">// admin dashboard access</div>

  @if (session('error'))
    <div class="error">{{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="admin" autocomplete="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required>

    <button class="btn" type="submit">Access Dashboard →</button>
  </form>

  <a class="back" href="{{ route('home') }}">← Back to portfolio</a>

</div>
</body>
</html>
