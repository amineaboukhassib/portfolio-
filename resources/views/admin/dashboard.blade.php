<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard – Portfolio</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --bg:      #0a0a0f; --surface: #13131a; --surface2: #1a1a26;
    --border:  #2a2a3a; --accent: #6c63ff; --accent2: #ff6b9d;
    --green:   #4ade80; --red: #f87171; --yellow: #fbbf24;
    --text:    #e8e8f0; --muted: #666680;
  }
  body { background:var(--bg); color:var(--text); font-family:'Syne',sans-serif; min-height:100vh; display:flex; }

  /* Sidebar */
  .sidebar {
    width: 220px; min-height: 100vh; background: var(--surface);
    border-right: 1px solid var(--border); padding: 28px 0;
    display: flex; flex-direction: column; flex-shrink: 0; position: sticky; top: 0; height: 100vh; overflow-y: auto;
  }
  .sidebar-logo { font-size: 1.4rem; font-weight: 800; padding: 0 24px 28px; border-bottom: 1px solid var(--border); }
  .sidebar-logo span { color: var(--accent); }
  .sidebar-nav { padding: 20px 12px; flex: 1; }
  .nav-item {
    display: flex; align-items: center; gap: 10px; padding: 10px 12px;
    border-radius: 8px; cursor: pointer; font-size: .9rem; color: var(--muted);
    transition: all .2s; text-decoration: none; margin-bottom: 4px;
  }
  .nav-item:hover, .nav-item.active { background: var(--surface2); color: var(--text); }
  .nav-item.active { color: var(--accent); }
  .badge { background: var(--accent2); color:#fff; border-radius: 10px; font-size:.7rem; padding: 2px 7px; margin-left: auto; }
  .sidebar-user { padding: 16px 24px; border-top: 1px solid var(--border); font-size:.85rem; color: var(--muted); }
  .sidebar-user strong { color: var(--text); display:block; }
  .logout-btn { display:inline-block; margin-top:8px; color:var(--red); font-size:.8rem; text-decoration:none; background:none; border:none; cursor:pointer; font-family:'Syne',sans-serif; }
  .logout-btn:hover { text-decoration: underline; }

  /* Main */
  .main { flex: 1; padding: 36px; overflow-x: hidden; }
  .page-header { margin-bottom: 32px; }
  .page-header h1 { font-size: 1.8rem; font-weight: 800; }
  .page-header p { color: var(--muted); margin-top: 4px; font-size: .9rem; }

  /* Stats row */
  .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; margin-bottom: 36px; }
  .stat {
    background: var(--surface); border: 1px solid var(--border); border-radius: 12px;
    padding: 20px; text-align: center;
  }
  .stat-val { font-size: 2rem; font-weight: 800; color: var(--accent); font-family:'Space Mono',monospace; }
  .stat-label { color: var(--muted); font-size: .8rem; margin-top: 4px; }

  /* Cards / Tables */
  .card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
  .card-header { padding: 16px 20px; border-bottom: 1px solid var(--border); display:flex; justify-content:space-between; align-items:center; }
  .card-header h2 { font-size: 1rem; font-weight: 700; }

  table { width: 100%; border-collapse: collapse; }
  th { background: var(--surface2); padding: 12px 16px; text-align:left; font-size:.75rem; color:var(--muted); text-transform:uppercase; letter-spacing:1px; }
  td { padding: 12px 16px; border-bottom: 1px solid var(--border); font-size:.88rem; vertical-align:middle; }
  tr:last-child td { border: none; }
  tr:hover td { background: rgba(108,99,255,.04); }

  .badge-pill { border-radius: 20px; font-size:.75rem; padding: 3px 10px; font-weight:600; }
  .pill-web    { background:rgba(108,99,255,.15); color:var(--accent); }
  .pill-app    { background:rgba(74,222,128,.12); color:var(--green); }
  .pill-api    { background:rgba(255,107,157,.12); color:var(--accent2); }
  .pill-read   { background:rgba(74,222,128,.12); color:var(--green); }
  .pill-unread { background:rgba(251,191,36,.12); color:var(--yellow); }

  .actions { display:flex; gap:8px; }
  .btn-sm {
    background: transparent; border: 1px solid var(--border); border-radius: 6px;
    color: var(--muted); cursor: pointer; font-size:.78rem; padding: 5px 12px;
    transition: all .2s; font-family:'Syne',sans-serif;
  }
  .btn-sm:hover { border-color: var(--accent); color: var(--accent); }
  .btn-sm.danger:hover { border-color: var(--red); color: var(--red); }

  /* Form */
  .form-overlay {
    position: fixed; inset:0; background:rgba(0,0,0,.7); z-index:100;
    display:none; align-items:center; justify-content:center; padding:20px;
  }
  .form-overlay.open { display:flex; }
  .form-card {
    background: var(--surface); border:1px solid var(--border); border-radius:16px;
    padding: 32px; width: 100%; max-width: 520px; max-height: 90vh; overflow-y:auto;
    animation: popIn .25s ease both;
  }
  @keyframes popIn { from { opacity:0; transform:scale(.95); } to { opacity:1; transform:scale(1); } }
  .form-card h2 { font-size:1.2rem; font-weight:800; margin-bottom:24px; }

  .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .form-group { display:flex; flex-direction:column; gap:6px; }
  .form-group.full { grid-column: 1/-1; }
  label { font-size:.78rem; color:var(--muted); text-transform:uppercase; letter-spacing:1px; }
  input[type=text], input[type=url], textarea, select {
    background: var(--bg); border:1px solid var(--border); border-radius:8px;
    color:var(--text); font-family:'Space Mono',monospace; font-size:.85rem;
    padding:10px 14px; outline:none; transition:border-color .2s;
    width:100%;
  }
  input:focus, textarea:focus, select:focus { border-color:var(--accent); box-shadow:0 0 0 3px rgba(108,99,255,.12); }
  textarea { resize:vertical; min-height:90px; }
  .checkbox-row { display:flex; align-items:center; gap:8px; }
  .checkbox-row input { width:auto; }

  .form-footer { display:flex; gap:12px; justify-content:flex-end; margin-top:24px; }
  .btn-primary { background:var(--accent); border:none; border-radius:8px; color:#fff; cursor:pointer; font-family:'Syne',sans-serif; font-weight:700; padding:10px 24px; transition:opacity .2s; }
  .btn-primary:hover { opacity:.88; }
  .btn-cancel { background:transparent; border:1px solid var(--border); border-radius:8px; color:var(--muted); cursor:pointer; font-family:'Syne',sans-serif; padding:10px 20px; }

  /* Notification */
  .notify {
    position:fixed; top:20px; right:20px; background:var(--green); color:#000;
    border-radius:8px; padding:12px 20px; font-weight:700; font-size:.9rem;
    z-index:200; opacity:0; transform:translateY(-10px); transition:all .3s;
  }
  .notify.show { opacity:1; transform:none; }

  .msg { font-size:.85rem; }
  .msg-subject { font-weight:700; }
  .msg-email { color:var(--muted); font-family:'Space Mono',monospace; font-size:.78rem; }
  .msg-body { color:var(--muted); margin-top:2px; }
</style>
</head>
<body>

<!-- Sidebar -->
<nav class="sidebar">
  <div class="sidebar-logo">Amine<span>.</span>Admin</div>
  <div class="sidebar-nav">
    <a class="nav-item active" onclick="showTab('projects')">
      <span>📁</span> Projects
    </a>
    <a class="nav-item" onclick="showTab('messages')">
      <span>💬</span> Messages
      @if ($unread > 0)<span class="badge">{{ $unread }}</span>@endif
    </a>
    <a class="nav-item" onclick="showTab('visitors')">
      <span>👀</span> Visitors
    </a>
  </div>
  <div class="sidebar-user">
    Logged in as<br>
    <strong>{{ session('admin_user') }}</strong>
    <form method="POST" action="{{ route('admin.logout') }}" style="display:inline">
      @csrf
      <button type="submit" class="logout-btn">Sign out →</button>
    </form>
  </div>
</nav>

<!-- Main -->
<main class="main">
  <div class="page-header">
    <h1>Dashboard</h1>
    <p>Manage your portfolio projects and messages.</p>
  </div>

  <!-- Stats -->
  <div class="stats">
    <div class="stat">
      <div class="stat-val">{{ count($projects) }}</div>
      <div class="stat-label">Projects</div>
    </div>
    <div class="stat">
      <div class="stat-val">{{ count($messages) }}</div>
      <div class="stat-label">Messages</div>
    </div>
    <div class="stat">
      <div class="stat-val" style="color:var(--accent2)">{{ $unread }}</div>
      <div class="stat-label">Unread</div>
    </div>
    <div class="stat">
      <div class="stat-val" style="color:var(--green)">{{ collect($projects)->where('featured', true)->count() }}</div>
      <div class="stat-label">Featured</div>
    </div>
    <div class="stat">
      <div class="stat-val" style="color:var(--accent)">{{ count($visitors) }}</div>
      <div class="stat-label">Visitors</div>
    </div>
  </div>

  @if (session('msg'))
  <div id="notify" class="notify">{{ session('msg') }}</div>
  <script>
    const n=document.getElementById('notify');
    setTimeout(()=>n.classList.add('show'),100);
    setTimeout(()=>n.classList.remove('show'),3500);
  </script>
  @endif

  <!-- Projects Tab -->
  <div id="tab-projects">
    <div class="card">
      <div class="card-header">
        <h2>All Projects</h2>
        <button class="btn-primary" onclick="openAddForm()">+ Add Project</button>
      </div>
      <table>
        <thead><tr>
          <th>Title</th><th>Category</th><th>Tech Stack</th><th>Featured</th><th>Date</th><th>Actions</th>
        </tr></thead>
        <tbody>
        @foreach ($projects as $p)
          <tr>
            <td><strong>{{ $p->title }}</strong></td>
            <td><span class="badge-pill pill-{{ strtolower($p->category) }}">{{ $p->category }}</span></td>
            <td style="color:var(--muted);font-size:.8rem">{{ $p->tech_stack }}</td>
            <td>{{ $p->featured ? '⭐' : '—' }}</td>
            <td style="color:var(--muted);font-size:.8rem">{{ $p->created_at->format('M j, Y') }}</td>
            <td>
              <div class="actions">
                <button class="btn-sm" onclick="openEditForm({{ $p->toJson() }})">Edit</button>
                <form method="POST" action="{{ route('admin.projects.destroy', $p->id) }}" style="display:inline" onsubmit="return confirm('Delete this project?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn-sm danger" type="submit">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Messages Tab -->
  <div id="tab-messages" style="display:none">
    <div class="card">
      <div class="card-header"><h2>Contact Messages</h2></div>
      <table>
        <thead><tr>
          <th>From</th><th>Subject</th><th>Message</th><th>Date</th><th>Status</th><th></th>
        </tr></thead>
        <tbody>
        @foreach ($messages as $m)
          <tr>
            <td>
              <div class="msg-subject">{{ $m->name }}</div>
              <div class="msg-email">{{ $m->email }}</div>
            </td>
            <td>{{ $m->subject }}</td>
            <td><div class="msg-body">{{ Str::limit($m->body, 80) }}</div></td>
            <td style="color:var(--muted);font-size:.8rem">{{ $m->sent_at->format('M j, g:ia') }}</td>
            <td>
              <span class="badge-pill {{ $m->is_read ? 'pill-read' : 'pill-unread' }}">
                {{ $m->is_read ? 'Read' : 'New' }}
              </span>
            </td>
            <td>
              @if (!$m->is_read)
              <form method="POST" action="{{ route('admin.messages.read', $m->id) }}">
                @csrf
                <button class="btn-sm" type="submit">Mark Read</button>
              </form>
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Visitors Tab -->
  <div id="tab-visitors" style="display:none">
    <div class="card">
      <div class="card-header"><h2>Visitor Intake Logs</h2></div>
      <table>
        <thead><tr>
          <th>Name</th><th>Company</th><th>Email</th><th>Date Visited</th>
        </tr></thead>
        <tbody>
        @foreach ($visitors as $v)
          <tr>
            <td><strong>{{ $v->name }}</strong></td>
            <td>{{ $v->company ?: '—' }}</td>
            <td style="font-family:'Space Mono',monospace; font-size:.85rem; color:var(--muted)">{{ $v->email }}</td>
            <td style="color:var(--muted);font-size:.8rem">{{ $v->created_at->format('M j, Y g:ia') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Add/Edit Modal -->
<div class="form-overlay" id="formOverlay">
  <div class="form-card">
    <h2 id="formTitle">Add Project</h2>
    <form method="POST" id="projectForm" action="{{ route('admin.projects.store') }}">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">
      <div class="form-grid">
        <div class="form-group full">
          <label>Title</label>
          <input type="text" name="title" id="fTitle" required>
        </div>
        <div class="form-group full">
          <label>Description</label>
          <textarea name="description" id="fDesc" required></textarea>
        </div>
        <div class="form-group full">
          <label>Tech Stack</label>
          <input type="text" name="tech_stack" id="fTech" placeholder="PHP, MySQL, JavaScript">
        </div>
        <div class="form-group">
          <label>Live URL</label>
          <input type="text" name="live_url" id="fLive" placeholder="https://...">
        </div>
        <div class="form-group">
          <label>GitHub URL</label>
          <input type="text" name="github_url" id="fGithub" placeholder="https://github.com/...">
        </div>
        <div class="form-group">
          <label>Category</label>
          <select name="category" id="fCat">
            <option value="Web">Web</option>
            <option value="App">App</option>
            <option value="API">API</option>
          </select>
        </div>
        <div class="form-group">
          <label>&nbsp;</label>
          <div class="checkbox-row">
            <input type="checkbox" name="featured" id="fFeatured" value="1">
            <label for="fFeatured" style="text-transform:none;font-size:.9rem;">Featured project</label>
          </div>
        </div>
      </div>
      <div class="form-footer">
        <button type="button" class="btn-cancel" onclick="closeForm()">Cancel</button>
        <button type="submit" class="btn-primary">Save Project</button>
      </div>
    </form>
  </div>
</div>

<script>
const storeUrl = "{{ route('admin.projects.store') }}";
const updateUrlBase = "{{ url('admin/projects') }}";

function showTab(name) {
  document.getElementById('tab-projects').style.display = name==='projects' ? '' : 'none';
  document.getElementById('tab-messages').style.display = name==='messages' ? '' : 'none';
  document.getElementById('tab-visitors').style.display = name==='visitors' ? '' : 'none';
  
  const items = document.querySelectorAll('.nav-item');
  items.forEach((el) => el.classList.remove('active'));
  
  if (name === 'projects') items[0].classList.add('active');
  if (name === 'messages') items[1].classList.add('active');
  if (name === 'visitors') items[2].classList.add('active');
}
function openAddForm() {
  document.getElementById('formTitle').textContent = 'Add Project';
  document.getElementById('projectForm').action = storeUrl;
  document.getElementById('formMethod').value = 'POST';
  ['fTitle','fDesc','fTech','fLive','fGithub'].forEach(id=>document.getElementById(id).value='');
  document.getElementById('fCat').value='Web';
  document.getElementById('fFeatured').checked=false;
  document.getElementById('formOverlay').classList.add('open');
}
function openEditForm(p) {
  document.getElementById('formTitle').textContent = 'Edit Project';
  document.getElementById('projectForm').action = updateUrlBase + '/' + p.id;
  document.getElementById('formMethod').value = 'PUT';
  document.getElementById('fTitle').value = p.title;
  document.getElementById('fDesc').value = p.description;
  document.getElementById('fTech').value = p.tech_stack;
  document.getElementById('fLive').value = p.live_url;
  document.getElementById('fGithub').value = p.github_url;
  document.getElementById('fCat').value = p.category;
  document.getElementById('fFeatured').checked = p.featured==1 || p.featured===true;
  document.getElementById('formOverlay').classList.add('open');
}
function closeForm() { document.getElementById('formOverlay').classList.remove('open'); }
document.getElementById('formOverlay').addEventListener('click', e => { if(e.target===e.currentTarget) closeForm(); });
</script>
</body>
</html>
