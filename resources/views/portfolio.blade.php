<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Amine Aboukhassib – Software Engineering Student & Full-Stack Developer. Laravel, PHP 8, MySQL, JavaScript, Stripe API.">
  <title>Amine Aboukhassib | Software Engineering Student</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Space+Mono:wght@400;700&family=Syne:wght@400;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

  <!-- ═══════════════════ NAVBAR ═══════════════════════════════ -->
  <nav id="navbar">
    <div class="container">
      <div class="nav-inner">

        <a href="#hero" class="nav-logo">Amine<span>.</span></a>

        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-actions">
          <button id="darkToggle" title="Toggle theme">☀️</button>

        </div>

        <button class="hamburger" aria-label="Menu">
          <span></span><span></span><span></span>
        </button>
      </div>

      <!-- Mobile menu -->
      <div class="mobile-menu">
        <a href="#about">About</a>
        <a href="#projects">Projects</a>
        <a href="#skills">Skills</a>
        <a href="#experience">Experience</a>
        <a href="#contact">Contact</a>

      </div>
    </div>
  </nav>

  <!-- ═══════════════════ HERO ══════════════════════════════════ -->
  <section id="hero">
    <div class="hero-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="container">
      <div class="hero-content">

        <div class="hero-tag" id="heroTag">
          Software Engineering Student · Istanbul, Türkiye
        </div>

        <h1 class="hero-title">
          Hi, I'm Amine
          <span class="line2">Aboukhassib.</span>
          <span class="line3" id="typingText">Full-Stack Developer.</span>
        </h1>

        <p class="hero-desc">
          I build scalable, production-ready web applications using
          <span class="mono" style="color:var(--accent)">Laravel & PHP 8</span>,
          <span class="mono" style="color:var(--cyan)">MySQL</span>,
          <span class="mono" style="color:var(--pink)">Stripe API</span>, and
          <span class="mono" style="color:var(--green)">JavaScript</span>.
          Currently studying Software Engineering at Haliç Üniversitesi.
        </p>

        <div class="hero-btns">
          <a href="#projects" class="btn-primary">View My Work ↓</a>
          <a href="#contact" class="btn-outline">Get In Touch</a>
        </div>

      </div>
    </div>

    <div class="hero-scroll">
      <span>scroll</span>
      <div class="scroll-arrow"></div>
    </div>
  </section>

  <!-- ═══════════════════ TECH TICKER ══════════════════════════ -->
  <div class="slider-section">
    <div class="slider-track" id="sliderTrack">
      <div class="slider-item">Laravel</div>
      <div class="slider-item">PHP 8</div>
      <div class="slider-item">MySQL</div>
      <div class="slider-item">Stripe API</div>
      <div class="slider-item">RBAC</div>
      <div class="slider-item">CRM Logic</div>
      <div class="slider-item">Real-Time Data Integration</div>
      <div class="slider-item">Pure Vanilla JS</div>
      <div class="slider-item">HTML5</div>
      <div class="slider-item">CSS3</div>
      <div class="slider-item">localStorage</div>
      <div class="slider-item">JSON Export/Import</div>
      <div class="slider-item">i18n</div>
      <div class="slider-item">KPI Dashboards</div>
      <div class="slider-item">MVC Architecture</div>
      <div class="slider-item">API Integration</div>
      <div class="slider-item">Chart.js</div>
      <div class="slider-item">C++</div>
      <div class="slider-item">Python</div>
      <div class="slider-item">Git &amp; GitHub</div>
      <div class="slider-item">Vite</div>
      <div class="slider-item">Google Maps API</div>
      <div class="slider-item">SunCalc</div>
      <!-- Duplicated for seamless loop -->
      <div class="slider-item">Laravel</div>
      <div class="slider-item">PHP 8</div>
      <div class="slider-item">MySQL</div>
      <div class="slider-item">Stripe API</div>
      <div class="slider-item">RBAC</div>
      <div class="slider-item">CRM Logic</div>
      <div class="slider-item">Real-Time Data Integration</div>
      <div class="slider-item">Pure Vanilla JS</div>
      <div class="slider-item">HTML5</div>
      <div class="slider-item">CSS3</div>
      <div class="slider-item">localStorage</div>
      <div class="slider-item">JSON Export/Import</div>
      <div class="slider-item">i18n</div>
      <div class="slider-item">KPI Dashboards</div>
      <div class="slider-item">MVC Architecture</div>
      <div class="slider-item">API Integration</div>
      <div class="slider-item">Chart.js</div>
      <div class="slider-item">C++</div>
      <div class="slider-item">Python</div>
      <div class="slider-item">Git &amp; GitHub</div>
      <div class="slider-item">Vite</div>
      <div class="slider-item">Google Maps API</div>
      <div class="slider-item">SunCalc</div>
    </div>
  </div>

  <!-- ═══════════════════ ABOUT ═════════════════════════════════ -->
  <section id="about" class="section">
    <div class="container">
      <div class="about-grid">

        <!-- Avatar / photo placeholder -->
        <div class="about-img-wrap">
          <div class="about-img" style="background:linear-gradient(135deg,var(--surface2),var(--bg2))">
            <!-- Replace with your actual photo: <img src="images/photo.jpg" alt="Amine Aboukhassib"> -->
            <span style="font-size:6rem;filter:grayscale(0)">👨‍💻</span>
          </div>
        </div>

        <!-- Text -->
        <div class="about-text">
          <div class="section-label">01 &mdash; About Me</div>
          <h2>Building the full stack,<br>one commit at a time.</h2>

          <p>
            I'm a Software Engineering student at <strong>Haliç Üniversitesi</strong> in
            Istanbul, Türkiye. I specialise in building full-stack web applications that are
            scalable, secure, and production-ready.
          </p>
          <p>
            My toolkit centres on <strong>Laravel &amp; PHP 8</strong> for robust backend
            architecture, <strong>MySQL</strong> for complex database design, and
            <strong>Stripe API</strong> for real payment integrations. I also work with
            <strong>JavaScript, HTML5 &amp; CSS3</strong> on the frontend.
          </p>
          <p>
            I've built production systems with RBAC, multi-language support, real-time chat,
            recommendation engines, and analytics dashboards.
          </p>

          <!-- Skills chips -->
          <div class="skills-grid">
            <div class="skill-chip">Laravel</div>
            <div class="skill-chip">PHP 8</div>
            <div class="skill-chip">MySQL</div>
            <div class="skill-chip">Stripe API</div>
            <div class="skill-chip">RBAC</div>
            <div class="skill-chip">CRM Logic</div>
            <div class="skill-chip">Pure Vanilla JS</div>
            <div class="skill-chip">HTML5</div>
            <div class="skill-chip">CSS3</div>
            <div class="skill-chip">localStorage</div>
            <div class="skill-chip">i18n</div>
            <div class="skill-chip">Vite</div>
            <div class="skill-chip">Google Maps API</div>
            <div class="skill-chip">SunCalc</div>
            <div class="skill-chip">C++</div>
            <div class="skill-chip">Python</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════════ PROJECTS ═════════════════════════════ -->
  <section id="projects" class="section">
    <div class="container">

      <div class="section-label">02 &mdash; My Work</div>
      <h2 class="section-title">Projects</h2>
      <p class="section-sub">
        A collection of full-stack applications, tools, and experiments. Each project is
        loaded dynamically from a MySQL database via the Fetch API.
      </p>

      <!-- Filter bar -->
      <div class="filter-bar">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="Web">Web</button>
        <button class="filter-btn" data-filter="App">App</button>
        <button class="filter-btn" data-filter="API">API</button>
      </div>

      <!-- Projects injected here by JS -->
      <div id="projects-grid"></div>

    </div>
  </section>

  <!-- ═══════════════════ SKILLS ════════════════════════════════ -->
  <section id="skills" class="section">
    <div class="container">

      <div class="section-label">03 &mdash; Proficiency</div>
      <h2 class="section-title">Skills</h2>
      <p class="section-sub">Technologies I work with daily, rated by hands-on experience.</p>

      <div class="skills-section-grid">

        <!-- Backend & Architecture -->
        <div class="skill-category">
          <h3>Backend &amp; Architecture</h3>

          <div class="skill-bar-item">
            <div class="skill-bar-label">Laravel &amp; PHP 8 <span>90%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="90"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">MySQL &amp; Database Architecture <span>88%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="88"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">API Integration (Stripe, REST) <span>85%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="85"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">RBAC &amp; Auth Systems <span>85%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="85"></div>
            </div>
          </div>
        </div>

        <!-- Frontend -->
        <div class="skill-category">
          <h3>Frontend</h3>

          <div class="skill-bar-item">
            <div class="skill-bar-label">HTML5 &amp; CSS3 <span>90%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="90"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">Pure Vanilla JS <span>88%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="88"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">Google Maps API <span>85%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="85"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">Vite <span>80%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="80"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">Git &amp; Version Control <span>80%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="80"></div>
            </div>
          </div>
        </div>

        <!-- Programming Languages -->
        <div class="skill-category">
          <h3>Programming Languages</h3>

          <div class="skill-bar-item">
            <div class="skill-bar-label">C++ <span>75%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="75"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="skill-bar-label">Python <span>70%</span></div>
            <div class="skill-bar-bg">
              <div class="skill-bar-fill" data-width="70"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════════ EXPERIENCE (TABLE) ════════════════════ -->
  <section id="experience" class="section">
    <div class="container">

      <div class="section-label">04 &mdash; Background</div>
      <h2 class="section-title">Experience &amp; Education</h2>
      <p class="section-sub">My academic and professional timeline.</p>

      <div style="overflow-x:auto">
        <table class="exp-table">
          <thead>
            <tr>
              <th>Period</th>
              <th>Role / Programme</th>
              <th>Highlights</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="mono" style="white-space:nowrap">Jul – Sep 2025</td>
              <td>
                <div class="exp-title">Full-Stack Developer (Internship)</div>
                <div style="color:var(--muted);font-size:.8rem">Mr.Bit Academy · Istanbul, On-site</div>
              </td>
              <td>Built full backend &amp; frontend with Laravel 10. Stripe API integration with vendor commission system. RBAC, multi-language/currency, live chat, recommendation engine, analytics dashboard with Chart.js. Deployed to production.</td>
              <td><span class="exp-badge">Internship</span></td>
            </tr>
            <tr>
              <td class="mono" style="white-space:nowrap">2022 – Present</td>
              <td>
                <div class="exp-title">Software Engineering (B.Sc.)</div>
                <div style="color:var(--muted);font-size:.8rem">Haliç Üniversitesi · Istanbul</div>
              </td>
              <td>Studying software engineering with focus on web development, algorithms, and database design.</td>
              <td><span class="exp-badge">Education</span></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </section>

  <!-- ═══════════════════ CONTACT ══════════════════════════════ -->
  <section id="contact" class="section">
    <div class="container">

      <div class="contact-grid">

        <!-- Info side -->
        <div class="contact-info">
          <div class="section-label">05 &mdash; Let's Talk</div>
          <h2>Get In Touch</h2>
          <p>
            Have a project in mind, a job opportunity, or just want to say hello?
            Fill in the form — messages are saved directly to the database!
          </p>

          <div class="contact-links">
            <a class="contact-link" href="mailto:amineaboukhassib0@gmail.com">
              <span class="contact-link-icon">✉</span>
              <div class="contact-link-text">
                <strong>Email</strong>
                <span>amineaboukhassib0@gmail.com</span>
              </div>
            </a>
            <a class="contact-link" href="https://github.com/amineaboukhassib" target="_blank" rel="noopener">
              <span class="contact-link-icon">⌥</span>
              <div class="contact-link-text">
                <strong>GitHub</strong>
                <span>github.com/amineaboukhassib</span>
              </div>
            </a>
            <a class="contact-link" href="https://www.linkedin.com/in/amine-aboukhassib-bb227b258/" target="_blank"
              rel="noopener">
              <span class="contact-link-icon">🔗</span>
              <div class="contact-link-text">
                <strong>LinkedIn</strong>
                <span>linkedin.com/in/amine-aboukhassib</span>
              </div>
            </a>
          </div>
        </div>

        <!-- Form side -->
        <div>
          <form id="contactForm" class="contact-form" novalidate>
            @csrf

            <div class="form-row">
              <div class="form-field">
                <label for="fname">Your Name *</label>
                <input type="text" id="fname" name="name" placeholder="Alex Smith" autocomplete="name">
                <span class="field-error"></span>
              </div>
              <div class="form-field">
                <label for="femail">Email Address *</label>
                <input type="email" id="femail" name="email" placeholder="you@example.com" autocomplete="email">
                <span class="field-error"></span>
              </div>
            </div>

            <div class="form-field">
              <label for="fsubject">Subject *</label>
              <input type="text" id="fsubject" name="subject" placeholder="Project enquiry / Hello">
              <span class="field-error"></span>
            </div>

            <div class="form-field">
              <label for="fmessage">Message *</label>
              <textarea id="fmessage" name="message"
                placeholder="Tell me about your project or opportunity…"></textarea>
              <span class="field-error"></span>
            </div>

            <!-- Status message -->
            <div id="formStatus" class="form-status"></div>

            <button type="submit" class="btn-submit">Send Message →</button>

          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════════════ FOOTER ════════════════════════════════ -->
  <footer>
    <div class="container">
      <div class="footer-inner">
        <div class="footer-logo">Amine<span>.</span></div>
        <p class="footer-copy">© 2025 Amine Aboukhassib. Built with Laravel, PHP, MySQL &amp; vanilla JS.</p>
        <div class="footer-links">
          <a href="#hero">Top</a>

          <a href="https://github.com" target="_blank">GitHub</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ═══════════════════ VISITOR INTAKE MODAL ═══════════════ -->
  <div id="visitorModal" class="visitor-modal">
    <div class="visitor-modal-content">
      <button class="visitor-modal-close" id="visitorClose" title="Skip">&times;</button>
      <div class="modal-header-icon">👋</div>
      <h2>Welcome to my Portfolio!</h2>
      <p>I'd love to know who is visiting. Please drop your details below (optional).</p>
      
      <form id="visitorForm">
        @csrf
        <div class="form-field">
          <label for="vName">Your Name *</label>
          <input type="text" id="vName" name="name" placeholder="John Doe" required>
        </div>
        <div class="form-field">
          <label for="vCompany">Company Name</label>
          <input type="text" id="vCompany" name="company" placeholder="Acme Corp">
        </div>
        <div class="form-field">
          <label for="vEmail">Email *</label>
          <input type="email" id="vEmail" name="email" placeholder="john@example.com" required>
        </div>
        <div id="visitorStatus" class="form-status"></div>
        <button type="submit" class="btn-submit">Submit &amp; Enter</button>
      </form>
    </div>
  </div>

  <!-- ═══════════════════ BACK TO TOP ══════════════════════════ -->
  <button id="backTop" title="Back to top">↑</button>

  <!-- Main JS -->
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
