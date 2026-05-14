// ============================================================
//  js/main.js  –  Portfolio interactive behaviours (Laravel)
// ============================================================

/* ─── Navbar scroll effect ─────────────────────────────────── */
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 40);
  document.getElementById('backTop').classList.toggle('visible', window.scrollY > 400);
}, { passive: true });

/* ─── Dark / Light mode toggle ─────────────────────────────── */
const darkToggle = document.getElementById('darkToggle');
const body       = document.body;

// Persist preference in localStorage (state management)
const savedMode = localStorage.getItem('portfolio-theme') || 'dark';
if (savedMode === 'light') { body.classList.add('light-mode'); darkToggle.textContent = '🌙'; }

darkToggle.addEventListener('click', () => {
  body.classList.toggle('light-mode');
  const isLight = body.classList.contains('light-mode');
  darkToggle.textContent = isLight ? '🌙' : '☀️';
  localStorage.setItem('portfolio-theme', isLight ? 'light' : 'dark');
});

/* ─── Mobile hamburger menu ─────────────────────────────────── */
const hamburger  = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-menu');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('open');
  mobileMenu.classList.toggle('open');
});

// Close on link click
mobileMenu.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    hamburger.classList.remove('open');
    mobileMenu.classList.remove('open');
  });
});

/* ─── Active nav link on scroll ─────────────────────────────── */
const sections = document.querySelectorAll('section[id]');
const navLinks  = document.querySelectorAll('.nav-links a');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.id;
      navLinks.forEach(a => {
        a.style.color = a.getAttribute('href') === `#${id}` ? 'var(--accent)' : '';
      });
    }
  });
}, { rootMargin: '-40% 0px -55% 0px' });

sections.forEach(s => observer.observe(s));

/* ─── Skill bar animation on viewport entry ─────────────────── */
const skillBars = document.querySelectorAll('.skill-bar-fill');

const barObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const fill   = entry.target;
      const target = fill.dataset.width || '75';
      fill.style.width = target + '%';
      barObserver.unobserve(fill);
    }
  });
}, { threshold: 0.3 });

skillBars.forEach(b => barObserver.observe(b));

/* ─── Load projects via AJAX (Fetch API) ─────────────────────── */
const projectsGrid   = document.getElementById('projects-grid');
const filterBtns     = document.querySelectorAll('.filter-btn');
let   currentFilter  = 'all';

async function loadProjects(category = 'all') {
  projectsGrid.innerHTML = '<div class="projects-loader">Loading projects…</div>';

  try {
    // ✅ Updated URL for Laravel route
    const url      = `/api/projects?category=${encodeURIComponent(category)}`;
    const response = await fetch(url);
    const json     = await response.json();

    if (!json.success || !json.data.length) {
      projectsGrid.innerHTML = '<div class="projects-loader">No projects found.</div>';
      return;
    }

    projectsGrid.innerHTML = '';

    const emojis = { Web:'🌐', App:'📱', API:'⚡' };

    json.data.forEach((p, i) => {
      const card = document.createElement('div');
      card.className = 'project-card';
      card.style.animationDelay = `${i * 0.08}s`;

      const techs = p.tech_stack.split(',').map(t =>
        `<span class="tech-tag">${t.trim()}</span>`
      ).join('');

      card.innerHTML = `
        <div class="project-thumb">${emojis[p.category] || '💻'}</div>
        <div class="project-body">
          <div class="project-cat">${escapeHTML(p.category)}</div>
          <h3 class="project-title">${escapeHTML(p.title)}</h3>
          <p class="project-desc">${escapeHTML(p.description)}</p>
          <div class="project-tech">${techs}</div>
          <div class="project-links">
            <a href="${escapeHTML(p.github_url)}" class="proj-link primary" target="_blank" rel="noopener">GitHub</a>
          </div>
        </div>`;

      projectsGrid.appendChild(card);
    });

  } catch (err) {
    projectsGrid.innerHTML = `
      <div class="projects-loader" style="color:var(--pink)">
        ⚠ Could not load projects — make sure the server is running.<br>
        <small style="color:var(--muted)">(Static demo mode active)</small>
      </div>`;
    loadStaticProjects(category);
  }
}

// Fallback static demo when no server
function loadStaticProjects(category) {
  const staticProjects = [
    { id:1, title:'E-Commerce Platform',  category:'Web', description:'Full-featured online store with cart, checkout, and payment integration.',    tech_stack:'PHP, MySQL, JavaScript', live_url:'#', github_url:'#', featured:1 },
    { id:2, title:'Task Manager App',     category:'App', description:'Productivity tool with drag-and-drop, priority labels, and deadline reminders.',tech_stack:'JavaScript, CSS3, HTML5', live_url:'#', github_url:'#', featured:1 },
    { id:3, title:'Weather Dashboard',    category:'API', description:'Fetches live OpenWeatherMap data and renders 7-day animated forecasts.',        tech_stack:'JavaScript, Fetch API', live_url:'#', github_url:'#', featured:0 },
    { id:4, title:'Blog CMS',             category:'Web', description:'Lightweight CMS for writing, editing, and publishing posts with Markdown.',     tech_stack:'PHP, MySQL, Bootstrap', live_url:'#', github_url:'#', featured:0 },
    { id:5, title:'Grade Tracker',        category:'App', description:'MySQL-backed grade tool with role-based access and Chart.js visualisations.',   tech_stack:'PHP, MySQL, Chart.js',  live_url:'#', github_url:'#', featured:1 },
    { id:6, title:'Portfolio Website',    category:'Web', description:'This very portfolio — a full-stack web application with admin dashboard.',      tech_stack:'HTML5, CSS3, JS, PHP',  live_url:'#', github_url:'#', featured:1 },
  ];

  const filtered = category === 'all' ? staticProjects : staticProjects.filter(p => p.category === category);
  const emojis   = { Web:'🌐', App:'📱', API:'⚡' };

  projectsGrid.innerHTML = '';
  filtered.forEach((p, i) => {
    const card = document.createElement('div');
    card.className = 'project-card';
    card.style.animationDelay = `${i * 0.08}s`;
    const techs = p.tech_stack.split(',').map(t => `<span class="tech-tag">${t.trim()}</span>`).join('');
    card.innerHTML = `
      <div class="project-thumb">${emojis[p.category] || '💻'}</div>
      <div class="project-body">
        <div class="project-cat">${p.category}</div>
        <h3 class="project-title">${p.title}</h3>
        <p class="project-desc">${p.description}</p>
        <div class="project-tech">${techs}</div>
        <div class="project-links">
          <a href="#" class="proj-link primary">GitHub</a>
        </div>
      </div>`;
    projectsGrid.appendChild(card);
  });
}

// Filter buttons
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentFilter = btn.dataset.filter;
    loadProjects(currentFilter);
  });
});

// Initial load
loadProjects('all');

/* ─── Contact form  (JS validation + AJAX) ───────────────────── */
const contactForm   = document.getElementById('contactForm');
const formStatus    = document.getElementById('formStatus');

function validateField(field, rules) {
  const wrapper = field.closest('.form-field');
  const errEl   = wrapper.querySelector('.field-error');
  const val     = field.value.trim();
  let   error   = '';

  if (rules.required && !val)                            error = 'This field is required.';
  else if (rules.minLen && val.length < rules.minLen)    error = `Minimum ${rules.minLen} characters.`;
  else if (rules.email  && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) error = 'Enter a valid email address.';

  wrapper.classList.toggle('error', !!error);
  if (errEl) errEl.textContent = error;
  return !error;
}

// Live validation on blur
const fields = {
  '#fname':   { required: true, minLen: 2 },
  '#femail':  { required: true, email: true },
  '#fsubject':{ required: true, minLen: 3 },
  '#fmessage':{ required: true, minLen: 10 },
};

Object.entries(fields).forEach(([sel, rules]) => {
  const el = document.querySelector(sel);
  if (el) {
    el.addEventListener('blur',  () => validateField(el, rules));
    el.addEventListener('input', () => {
      if (el.closest('.form-field').classList.contains('error')) validateField(el, rules);
    });
  }
});

contactForm.addEventListener('submit', async e => {
  e.preventDefault();

  // Validate all
  let valid = true;
  Object.entries(fields).forEach(([sel, rules]) => {
    const el = document.querySelector(sel);
    if (el && !validateField(el, rules)) valid = false;
  });
  if (!valid) return;

  const submitBtn = contactForm.querySelector('.btn-submit');
  submitBtn.disabled    = true;
  submitBtn.textContent = 'Sending…';
  formStatus.className  = 'form-status';

  const payload = {
    name:    document.querySelector('#fname').value.trim(),
    email:   document.querySelector('#femail').value.trim(),
    subject: document.querySelector('#fsubject').value.trim(),
    message: document.querySelector('#fmessage').value.trim(),
  };

  // Get CSRF token from the form's hidden input
  const csrfToken = document.querySelector('input[name="_token"]')?.value || '';

  try {
    // ✅ Updated URL for Laravel route
    const res  = await fetch('/api/contact', {
      method:  'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body:    JSON.stringify(payload),
    });
    const json = await res.json();

    if (json.success) {
      formStatus.className   = 'form-status success';
      formStatus.textContent = '✓ ' + json.message;
      contactForm.reset();
    } else {
      formStatus.className   = 'form-status error';
      formStatus.textContent = '✗ ' + (json.error || json.errors?.join(' | ') || 'Something went wrong.');
    }
  } catch {
    // Graceful offline demo
    formStatus.className   = 'form-status success';
    formStatus.textContent = '✓ Message received (demo mode — server may be offline)!';
    contactForm.reset();
  } finally {
    submitBtn.disabled    = false;
    submitBtn.textContent = 'Send Message →';
  }
});

/* ─── Cookie: pre-fill name if returning visitor ─────────────── */
function getCookie(name) {
  const v = document.cookie.split(';').find(r => r.trim().startsWith(name + '='));
  return v ? decodeURIComponent(v.split('=')[1]) : null;
}
const savedName = getCookie('last_contact_name');
if (savedName) {
  const nameField = document.querySelector('#fname');
  if (nameField && !nameField.value) nameField.value = savedName;
}

/* ─── Back to top ────────────────────────────────────────────── */
document.getElementById('backTop').addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ─── Typing animation ──────────────────────────────────────── */
const typingTarget = document.getElementById('typingText');
if (typingTarget) {
  const words = ['Full-Stack Developer.', 'Laravel & PHP Expert.', 'Software Engineering Student.', 'Problem Solver.'];
  let   wi = 0, ci = 0, deleting = false;

  function type() {
    const word  = words[wi];
    const delay = deleting ? 60 : 110;

    if (!deleting) {
      typingTarget.textContent = word.substring(0, ++ci);
      if (ci === word.length) { deleting = true; setTimeout(type, 1800); return; }
    } else {
      typingTarget.textContent = word.substring(0, --ci);
      if (ci === 0) { deleting = false; wi = (wi + 1) % words.length; }
    }
    setTimeout(type, delay);
  }
  type();
}

/* ─── Utility: safe HTML escape ─────────────────────────────── */
function escapeHTML(str) {
  const d = document.createElement('div');
  d.textContent = str;
  return d.innerHTML;
}

/* ─── Visitor Intake Modal ──────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  const vModal = document.getElementById('visitorModal');
  const vForm = document.getElementById('visitorForm');
  const vClose = document.getElementById('visitorClose');
  const vStatus = document.getElementById('visitorStatus');
  const heroTag = document.getElementById('heroTag');

  if (!vModal) return;

  // Personalization helper
  const personalize = (name, company) => {
    if (heroTag && name) {
      heroTag.textContent = `Welcome, ${name}${company ? ' from ' + company : ''}! 👋`;
      heroTag.style.color = 'var(--accent)';
      heroTag.style.fontWeight = 'bold';
    }
  };

  // Check if they have visited before
  const hasVisited = localStorage.getItem('has_visited_portfolio');
  const savedName = localStorage.getItem('visitor_name');
  const savedCompany = localStorage.getItem('visitor_company');

  if (savedName) {
    personalize(savedName, savedCompany);
  }
  
  if (!hasVisited) {
    // Show modal after 1.5 seconds
    setTimeout(() => {
      vModal.classList.add('show');
    }, 1500);
  }

  // Close handler (Skip)
  const closeModal = () => {
    vModal.classList.remove('show');
    localStorage.setItem('has_visited_portfolio', 'true');
  };

  vClose.addEventListener('click', closeModal);

  // Handle form submission
  vForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = vForm.querySelector('.btn-submit');
    btn.disabled = true;
    btn.textContent = 'Submitting...';

    const name = document.getElementById('vName').value.trim();
    const company = document.getElementById('vCompany').value.trim();
    const email = document.getElementById('vEmail').value.trim();

    const payload = { name, company, email };

    try {
      const csrfToken = vForm.querySelector('input[name="_token"]')?.value || document.querySelector('input[name="_token"]')?.value;

      const res = await fetch('/api/visitors', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken || ''
        },
        body: JSON.stringify(payload)
      });
      
      const json = await res.json();
      if (json.success) {
        vStatus.className = 'form-status success';
        vStatus.textContent = '✓ ' + json.message;
        
        // Save for personalization
        localStorage.setItem('visitor_name', name);
        localStorage.setItem('visitor_company', company);
        personalize(name, company);

        setTimeout(closeModal, 1000);
      } else {
        throw new Error('Validation failed');
      }
    } catch (err) {
      // Graceful fallback if no server
      vStatus.className = 'form-status success';
      vStatus.textContent = '✓ Thanks! (Demo mode)';
      
      localStorage.setItem('visitor_name', name);
      localStorage.setItem('visitor_company', company);
      personalize(name, company);

      setTimeout(closeModal, 1000);
    } finally {
      btn.disabled = false;
      btn.textContent = 'Submit & Enter';
    }
  });
});
