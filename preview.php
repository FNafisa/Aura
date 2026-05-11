<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aura Artifacts – Preview Navigator</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; display: flex; height: 100vh; overflow: hidden; }
  #sidebar { width: 200px; min-width: 200px; background: #1a1a2e; color: #fff; display: flex; flex-direction: column; padding: 20px 0; gap: 4px; overflow-y: auto; }
  #sidebar h2 { text-align: center; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; color: #f0a0b8; padding: 0 16px 16px; border-bottom: 1px solid #333; margin-bottom: 8px; }
  #sidebar a { display: block; color: #ccc; text-decoration: none; padding: 10px 20px; font-size: 13px; letter-spacing: 1px; text-transform: uppercase; transition: all 0.2s; border-left: 3px solid transparent; }
  #sidebar a:hover, #sidebar a.active { background: #2a2a4a; color: #fff; border-left-color: #f0a0b8; }
  #main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
  #toolbar { background: #fff; border-bottom: 1px solid #ddd; padding: 8px 16px; display: flex; align-items: center; gap: 8px; }
  #toolbar button { background: #eee; border: 1px solid #ccc; border-radius: 4px; padding: 4px 10px; cursor: pointer; font-size: 16px; }
  #url-bar { flex: 1; border: 1px solid #ccc; border-radius: 4px; padding: 5px 10px; font-size: 13px; color: #555; background: #fafafa; }
  iframe { flex: 1; width: 100%; border: none; }
</style>
</head>
<body>
<div id="sidebar">
  <h2>Aura Artifacts</h2>
  <a href="#" onclick="nav('/')">🏠 Home</a>
  <a href="#" onclick="nav('/collections.php')">💎 Collections</a>
  <a href="#" onclick="nav('/about.php')">ℹ️ About Us</a>
  <a href="#" onclick="nav('/contact.php')">✉️ Contact</a>
  <a href="#" onclick="nav('/login.php')">🔑 Login</a>
  <a href="#" onclick="nav('/register.php')">📝 Register</a>
  <a href="#" onclick="nav('/cart.php')">🛒 Cart</a>
  <a href="#" onclick="nav('/profile.php')">👤 Profile</a>
  <a href="#" onclick="nav('/order-history.php')">📦 Orders</a>
  <a href="#" onclick="nav('/help.php')">❓ Help</a>
  <a href="#" onclick="nav('/BraceletCustomization.php')">🪬 Customize</a>
  <a href="#" onclick="nav('/admin/')">⚙️ Admin</a>
</div>
<div id="main">
  <div id="toolbar">
    <button onclick="document.getElementById('frame').contentWindow.history.back()">&#8592;</button>
    <button onclick="document.getElementById('frame').contentWindow.history.forward()">&#8594;</button>
    <button onclick="document.getElementById('frame').location.reload()">&#8635;</button>
    <input id="url-bar" type="text" readonly>
  </div>
  <iframe id="frame" src="/"></iframe>
</div>
<script>
  const frame = document.getElementById('frame');
  const urlBar = document.getElementById('url-bar');
  const links = document.querySelectorAll('#sidebar a');
  function nav(path) { frame.src = path; urlBar.value = 'localhost:8080' + path; links.forEach(l => l.classList.remove('active')); event.target.classList.add('active'); }
  frame.addEventListener('load', () => { try { const path = new URL(frame.contentWindow.location.href).pathname; urlBar.value = 'localhost:8080' + path; links.forEach(l => { const href = l.getAttribute('onclick').match(/'([^']+)'/)?.[1]; l.classList.toggle('active', href === path || (path === '/' && href === '/')); }); } catch(e) {} });
  urlBar.value = 'localhost:8080/'; links[0].classList.add('active');
</script>
</body>
</html>
