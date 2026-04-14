<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHPForge — Master PHP Development</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
<style>
  :root {
    --bg-primary: #080c12;
    --bg-secondary: #0d1320;
    --bg-card: #111827;
    --bg-card2: #0f1c2e;
    --accent-green: #00e5a0;
    --accent-blue: #3b8cff;
    --accent-purple: #a78bfa;
    --accent-orange: #ff7043;
    --text-primary: #f0f4ff;
    --text-secondary: #8896b3;
    --text-muted: #4a5568;
    --border: rgba(255,255,255,0.07);
    --border-accent: rgba(0,229,160,0.25);
    --glow-green: rgba(0,229,160,0.15);
    --glow-blue: rgba(59,140,255,0.15);
    --font-head: 'Syne', sans-serif;
    --font-mono: 'JetBrains Mono', monospace;
    --font-body: 'DM Sans', sans-serif;
  }
  *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
  html{scroll-behavior:smooth;overflow-x:hidden}
  body{background:var(--bg-primary);color:var(--text-primary);font-family:var(--font-body);font-size:16px;line-height:1.7;overflow-x:hidden}

  /* ── NAV ── */
  nav{position:fixed;top:0;left:0;right:0;z-index:100;padding:0 5%;display:flex;align-items:center;justify-content:space-between;height:70px;background:rgba(8,12,18,0.85);backdrop-filter:blur(16px);border-bottom:1px solid var(--border)}
  .nav-logo{font-family:var(--font-head);font-size:1.4rem;font-weight:800;letter-spacing:-0.03em}
  .nav-logo span{color:var(--accent-green)}
  .nav-links{display:flex;gap:2rem;align-items:center;list-style:none}
  .nav-links a{color:var(--text-secondary);text-decoration:none;font-size:0.9rem;font-weight:400;transition:color .2s}
  .nav-links a:hover{color:var(--text-primary)}
  .nav-cta{background:var(--accent-green);color:#040b07;padding:9px 22px;border-radius:8px;font-size:0.85rem;font-weight:600;text-decoration:none;font-family:var(--font-head);transition:opacity .2s,transform .15s}
  .nav-cta:hover{opacity:0.88;transform:translateY(-1px)}

  /* ── HERO ── */
  .hero{min-height:100vh;display:flex;align-items:center;padding:100px 5% 60px;position:relative;overflow:hidden}
  .hero::before{content:'';position:absolute;top:-200px;right:-200px;width:700px;height:700px;background:radial-gradient(circle,rgba(59,140,255,0.08) 0%,transparent 70%);pointer-events:none}
  .hero::after{content:'';position:absolute;bottom:-100px;left:10%;width:500px;height:500px;background:radial-gradient(circle,rgba(0,229,160,0.06) 0%,transparent 70%);pointer-events:none}
  .hero-inner{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;max-width:1300px;margin:0 auto;width:100%}
  .hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(0,229,160,0.08);border:1px solid var(--border-accent);border-radius:100px;padding:6px 16px;font-size:0.78rem;font-family:var(--font-mono);color:var(--accent-green);margin-bottom:1.5rem;animation:fadeUp .6s ease both}
  .badge-dot{width:7px;height:7px;background:var(--accent-green);border-radius:50%;animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(0.8)}}
  .hero-title{font-family:var(--font-head);font-size:clamp(2.8rem,5vw,4.4rem);font-weight:800;line-height:1.05;letter-spacing:-0.04em;animation:fadeUp .7s .1s ease both}
  .hero-title .line2{color:var(--accent-green)}
  .hero-title .line3{background:linear-gradient(90deg,var(--accent-blue),var(--accent-purple));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
  .hero-subtitle{margin:1.5rem 0 2.5rem;color:var(--text-secondary);font-size:1.05rem;font-weight:300;max-width:480px;line-height:1.8;animation:fadeUp .7s .2s ease both}
  .hero-actions{display:flex;gap:1rem;align-items:center;flex-wrap:wrap;animation:fadeUp .7s .3s ease both}
  .btn-primary{background:var(--accent-green);color:#040b07;padding:14px 32px;border-radius:10px;font-family:var(--font-head);font-size:0.95rem;font-weight:700;text-decoration:none;transition:all .2s;display:inline-flex;align-items:center;gap:8px}
  .btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(0,229,160,0.3)}
  .btn-ghost{color:var(--text-primary);padding:14px 28px;border-radius:10px;font-size:0.9rem;font-weight:500;text-decoration:none;display:inline-flex;align-items:center;gap:8px;border:1px solid var(--border);transition:all .2s}
  .btn-ghost:hover{border-color:var(--accent-green);color:var(--accent-green);background:var(--glow-green)}
  .hero-stats{display:flex;gap:2.5rem;margin-top:2.5rem;animation:fadeUp .7s .4s ease both}
  .stat-item .num{font-family:var(--font-head);font-size:1.8rem;font-weight:800;color:var(--text-primary)}
  .stat-item .label{font-size:0.8rem;color:var(--text-muted);margin-top:2px}

  /* ── CODE WINDOW ── */
  .code-window{background:var(--bg-card);border:1px solid var(--border);border-radius:16px;overflow:hidden;animation:fadeUp .8s .2s ease both;box-shadow:0 0 80px rgba(59,140,255,0.08)}
  .code-titlebar{background:#0d1320;padding:14px 20px;display:flex;align-items:center;gap:12px;border-bottom:1px solid var(--border)}
  .dot{width:12px;height:12px;border-radius:50%}
  .dot-r{background:#ff5f57}.dot-y{background:#febc2e}.dot-g{background:#28c840}
  .code-filename{font-family:var(--font-mono);font-size:0.75rem;color:var(--text-muted);margin-left:8px}
  .code-body{padding:24px;font-family:var(--font-mono);font-size:0.82rem;line-height:1.9;overflow:hidden}
  .ln{color:var(--text-muted);margin-right:20px;user-select:none;font-size:0.7rem}
  .kw{color:#c792ea}.fn{color:var(--accent-green)}.st{color:#f78c6c}.cm{color:var(--text-muted);font-style:italic}.vr{color:var(--accent-blue)}.op{color:#89ddff}.nb{color:#ffcb6b}
  .code-cursor{display:inline-block;width:2px;height:14px;background:var(--accent-green);animation:blink 1.1s infinite;vertical-align:middle;margin-left:2px}
  @keyframes blink{0%,100%{opacity:1}50%{opacity:0}}

  /* ── SECTIONS ── */
  section{padding:90px 5%}
  .section-inner{max-width:1300px;margin:0 auto}
  .section-tag{font-family:var(--font-mono);font-size:0.75rem;color:var(--accent-green);letter-spacing:.12em;text-transform:uppercase;margin-bottom:.8rem}
  .section-title{font-family:var(--font-head);font-size:clamp(2rem,3.5vw,3rem);font-weight:800;letter-spacing:-0.03em;line-height:1.1}
  .section-sub{color:var(--text-secondary);font-weight:300;margin-top:.8rem;font-size:1rem;max-width:500px}

  /* ── PATH / TRACK ── */
  .path-section{background:var(--bg-secondary)}
  .path-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem;margin-top:3rem}
  .path-card{background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:28px;position:relative;overflow:hidden;transition:all .25s;cursor:pointer}
  .path-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--track-color,var(--accent-green))}
  .path-card:hover{border-color:rgba(255,255,255,0.15);transform:translateY(-4px);box-shadow:0 20px 40px rgba(0,0,0,0.3)}
  .path-icon{width:46px;height:46px;border-radius:10px;background:var(--icon-bg,rgba(0,229,160,0.1));display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:1.2rem}
  .path-level{font-family:var(--font-mono);font-size:0.7rem;color:var(--track-color,var(--accent-green));margin-bottom:.5rem;letter-spacing:.08em;text-transform:uppercase}
  .path-name{font-family:var(--font-head);font-size:1.15rem;font-weight:700;margin-bottom:.6rem}
  .path-desc{font-size:0.85rem;color:var(--text-secondary);font-weight:300;line-height:1.7}
  .path-meta{display:flex;gap:1rem;margin-top:1.4rem;padding-top:1.2rem;border-top:1px solid var(--border)}
  .path-meta span{font-size:0.78rem;color:var(--text-muted);display:flex;align-items:center;gap:5px}
  .progress-bar{height:3px;background:rgba(255,255,255,0.06);border-radius:2px;margin-top:1rem;overflow:hidden}
  .progress-fill{height:100%;background:var(--track-color,var(--accent-green));border-radius:2px;transition:width 1s .3s}

  /* ── CURRICULUM ── */
  .curriculum-grid{display:grid;grid-template-columns:340px 1fr;gap:2rem;margin-top:3rem;align-items:start}
  .curriculum-nav{display:flex;flex-direction:column;gap:.5rem}
  .module-btn{background:var(--bg-card);border:1px solid var(--border);border-radius:10px;padding:16px 20px;cursor:pointer;transition:all .2s;display:flex;align-items:center;gap:14px;text-align:left}
  .module-btn.active,.module-btn:hover{border-color:var(--border-accent);background:rgba(0,229,160,0.05)}
  .module-btn.active .module-num{background:var(--accent-green);color:#040b07}
  .module-num{width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,0.05);font-family:var(--font-mono);font-size:0.75rem;font-weight:600;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s}
  .module-info h4{font-family:var(--font-head);font-size:0.9rem;font-weight:600;margin-bottom:2px}
  .module-info span{font-size:0.75rem;color:var(--text-muted)}
  .curriculum-content{background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:32px}
  .lesson-list{display:flex;flex-direction:column;gap:0}
  .lesson-item{display:flex;align-items:center;gap:16px;padding:14px 0;border-bottom:1px solid var(--border);transition:all .2s;cursor:pointer}
  .lesson-item:last-child{border-bottom:none}
  .lesson-item:hover .lesson-title{color:var(--accent-green)}
  .lesson-icon{width:34px;height:34px;border-radius:8px;background:rgba(255,255,255,0.04);display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0}
  .lesson-icon.done{background:rgba(0,229,160,0.1)}
  .lesson-title{font-size:0.9rem;font-weight:400;flex:1;transition:color .2s}
  .lesson-duration{font-family:var(--font-mono);font-size:0.72rem;color:var(--text-muted)}
  .lesson-badge{font-size:0.68rem;padding:3px 10px;border-radius:100px;background:rgba(59,140,255,0.1);color:var(--accent-blue);font-family:var(--font-mono)}
  .lesson-badge.free{background:rgba(0,229,160,0.08);color:var(--accent-green)}

  /* ── PROJECTS ── */
  .projects-section{background:var(--bg-secondary)}
  .projects-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:1.5rem;margin-top:3rem}
  .project-card{background:var(--bg-card);border:1px solid var(--border);border-radius:16px;overflow:hidden;transition:all .25s;cursor:pointer}
  .project-card:hover{border-color:rgba(255,255,255,0.12);transform:translateY(-4px);box-shadow:0 24px 48px rgba(0,0,0,0.35)}
  .project-preview{height:180px;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;font-family:var(--font-mono);font-size:0.78rem}
  .project-body{padding:22px}
  .project-tags{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:.8rem}
  .tag{font-family:var(--font-mono);font-size:0.68rem;padding:4px 10px;border-radius:100px;background:rgba(255,255,255,0.05);color:var(--text-muted);border:1px solid var(--border)}
  .project-title{font-family:var(--font-head);font-size:1.05rem;font-weight:700;margin-bottom:.5rem}
  .project-desc{font-size:0.83rem;color:var(--text-secondary);font-weight:300;line-height:1.7;margin-bottom:1.2rem}
  .project-footer{display:flex;justify-content:space-between;align-items:center}
  .difficulty{display:flex;gap:4px}
  .difficulty-dot{width:8px;height:8px;border-radius:50%}
  .diff-label{font-size:0.75rem;color:var(--text-muted)}
  .project-link{font-size:0.8rem;color:var(--accent-green);font-weight:500;text-decoration:none;display:flex;align-items:center;gap:4px;transition:gap .2s}
  .project-link:hover{gap:8px}

  /* ── FEATURES ── */
  .features-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:3rem}
  .feature-card{background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:28px;transition:all .25s}
  .feature-card:hover{border-color:rgba(255,255,255,0.12);background:var(--bg-card2)}
  .feature-icon{font-size:1.6rem;margin-bottom:1.2rem}
  .feature-title{font-family:var(--font-head);font-size:1rem;font-weight:700;margin-bottom:.6rem}
  .feature-desc{font-size:0.85rem;color:var(--text-secondary);font-weight:300;line-height:1.75}

  /* ── EDITOR SECTION ── */
  .editor-section{background:var(--bg-secondary)}
  .editor-inner{display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center}
  .editor-window{background:var(--bg-card);border:1px solid var(--border);border-radius:16px;overflow:hidden;box-shadow:0 0 60px rgba(0,0,0,0.4)}
  .editor-topbar{background:#0a1119;padding:12px 16px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border)}
  .editor-tabs{display:flex;gap:.3rem}
  .etab{font-family:var(--font-mono);font-size:0.72rem;padding:6px 14px;border-radius:6px;color:var(--text-muted);cursor:pointer;transition:all .2s}
  .etab.active{background:var(--bg-card);color:var(--text-primary)}
  .editor-content{padding:22px;font-family:var(--font-mono);font-size:0.8rem;line-height:2;min-height:300px}
  .output-bar{background:#070d14;padding:14px 20px;border-top:1px solid var(--border);font-family:var(--font-mono);font-size:0.78rem}
  .output-label{font-size:0.7rem;color:var(--text-muted);margin-bottom:6px;text-transform:uppercase;letter-spacing:.08em}
  .output-line{color:var(--accent-green)}

  /* ── TESTIMONIALS ── */
  .testimonials-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:3rem}
  .testimonial-card{background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:28px;position:relative}
  .testimonial-card::before{content:'"';position:absolute;top:18px;right:22px;font-size:4rem;font-family:var(--font-head);color:rgba(0,229,160,0.1);line-height:1;font-weight:800}
  .t-text{font-size:0.88rem;color:var(--text-secondary);line-height:1.8;font-weight:300;margin-bottom:1.5rem}
  .t-author{display:flex;align-items:center;gap:12px}
  .t-avatar{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:var(--font-head);font-size:0.85rem;font-weight:700;flex-shrink:0}
  .t-name{font-size:0.88rem;font-weight:500}
  .t-role{font-size:0.75rem;color:var(--text-muted)}
  .stars{display:flex;gap:2px;margin-bottom:.8rem}
  .star{color:var(--accent-orange);font-size:0.8rem}

  /* ── CTA ── */
  .cta-section{text-align:center;padding:100px 5%;position:relative;overflow:hidden}
  .cta-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 100%,rgba(0,229,160,0.07) 0%,transparent 60%);pointer-events:none}
  .cta-title{font-family:var(--font-head);font-size:clamp(2.5rem,5vw,4rem);font-weight:800;letter-spacing:-0.04em;max-width:700px;margin:0 auto 1.5rem}
  .cta-sub{color:var(--text-secondary);font-size:1rem;font-weight:300;margin-bottom:3rem;max-width:450px;margin-left:auto;margin-right:auto}
  .pricing-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;max-width:1000px;margin:0 auto 3rem;text-align:left}
  .price-card{background:var(--bg-card);border:1px solid var(--border);border-radius:16px;padding:32px;position:relative;transition:all .25s}
  .price-card.featured{border-color:var(--border-accent);background:linear-gradient(135deg,rgba(0,229,160,0.04) 0%,rgba(59,140,255,0.04) 100%)}
  .price-card.featured::before{content:'Most Popular';position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--accent-green);color:#040b07;font-family:var(--font-mono);font-size:0.7rem;font-weight:600;padding:5px 16px;border-radius:100px;white-space:nowrap}
  .price-label{font-family:var(--font-mono);font-size:0.72rem;color:var(--text-muted);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.8rem}
  .price-amount{font-family:var(--font-head);font-size:2.5rem;font-weight:800;letter-spacing:-0.04em;margin-bottom:.3rem}
  .price-period{font-size:0.8rem;color:var(--text-muted);margin-bottom:1.5rem}
  .price-features{list-style:none;display:flex;flex-direction:column;gap:.7rem;margin-bottom:2rem}
  .price-features li{font-size:0.85rem;color:var(--text-secondary);display:flex;align-items:center;gap:10px;font-weight:300}
  .check{color:var(--accent-green);font-size:0.9rem}
  .price-btn{width:100%;padding:12px;border-radius:9px;font-family:var(--font-head);font-size:0.9rem;font-weight:700;cursor:pointer;transition:all .2s;border:none;text-align:center}
  .price-btn.outline{background:transparent;border:1px solid var(--border);color:var(--text-primary)}
  .price-btn.outline:hover{border-color:var(--accent-green);color:var(--accent-green)}
  .price-btn.solid{background:var(--accent-green);color:#040b07}
  .price-btn.solid:hover{opacity:0.88;transform:translateY(-1px)}

  /* ── FOOTER ── */
  footer{background:var(--bg-secondary);border-top:1px solid var(--border);padding:60px 5% 30px}
  .footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:3rem;max-width:1300px;margin:0 auto;padding-bottom:50px;border-bottom:1px solid var(--border)}
  .footer-logo{font-family:var(--font-head);font-size:1.3rem;font-weight:800;margin-bottom:1rem}
  .footer-logo span{color:var(--accent-green)}
  .footer-tagline{font-size:0.85rem;color:var(--text-muted);font-weight:300;max-width:260px;line-height:1.7}
  .footer-col h5{font-family:var(--font-head);font-size:0.85rem;font-weight:600;margin-bottom:1.2rem;color:var(--text-primary)}
  .footer-col ul{list-style:none;display:flex;flex-direction:column;gap:.6rem}
  .footer-col ul li a{font-size:0.83rem;color:var(--text-muted);text-decoration:none;transition:color .2s;font-weight:300}
  .footer-col ul li a:hover{color:var(--text-primary)}
  .footer-bottom{max-width:1300px;margin:0 auto;padding-top:30px;display:flex;justify-content:space-between;align-items:center}
  .footer-copy{font-size:0.8rem;color:var(--text-muted)}
  .footer-social{display:flex;gap:1rem}
  .social-btn{width:34px;height:34px;border-radius:8px;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);font-size:0.8rem;transition:all .2s;cursor:pointer;text-decoration:none}
  .social-btn:hover{border-color:var(--accent-green);color:var(--accent-green)}

  /* ── SCROLL ANIMATIONS ── */
  @keyframes fadeUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
  .reveal{opacity:0;transform:translateY(20px);transition:opacity .6s ease,transform .6s ease}
  .reveal.visible{opacity:1;transform:translateY(0)}

  /* ── RESPONSIVE ── */
  @media(max-width:1024px){
    .hero-inner,.editor-inner{grid-template-columns:1fr}
    .curriculum-grid{grid-template-columns:1fr}
    .features-grid{grid-template-columns:repeat(2,1fr)}
    .testimonials-grid{grid-template-columns:repeat(2,1fr)}
    .pricing-cards{grid-template-columns:1fr}
    .footer-grid{grid-template-columns:1fr 1fr}
  }
  @media(max-width:640px){
    .nav-links{display:none}
    .features-grid,.testimonials-grid{grid-template-columns:1fr}
    .projects-grid{grid-template-columns:1fr}
    .hero-stats{gap:1.5rem}
  }

  /* ── SCROLLBAR ── */
  ::-webkit-scrollbar{width:6px}
  ::-webkit-scrollbar-track{background:var(--bg-primary)}
  ::-webkit-scrollbar-thumb{background:var(--text-muted);border-radius:3px}
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">PHP<span>Forge</span></div>
  <ul class="nav-links">
    <li><a href="#tracks">Learning Paths</a></li>
    <li><a href="#curriculum">Curriculum</a></li>
    <li><a href="#projects">Projects</a></li>
    <li><a href="#pricing">Pricing</a></li>
  </ul>
  <a href="#pricing" class="nav-cta">Start Free →</a>
</nav>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-badge"><span class="badge-dot"></span> PHP 8.3 · Laravel · MySQL · REST APIs</div>
      <h1 class="hero-title">
        <span class="line1">Master</span><br>
        <span class="line2">Modern PHP</span><br>
        <span class="line3">Development.</span>
      </h1>
      <p class="hero-subtitle">From syntax fundamentals to building full-stack applications — a structured, project-driven curriculum designed by senior engineers.</p>
      <div class="hero-actions">
        <a href="#tracks" class="btn-primary">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          Start Learning Free
        </a>
        <a href="#curriculum" class="btn-ghost">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12h6M9 16h6M9 8h3M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
          View Curriculum
        </a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><div class="num">14K+</div><div class="label">Active Students</div></div>
        <div class="stat-item"><div class="num">240+</div><div class="label">Video Lessons</div></div>
        <div class="stat-item"><div class="num">38</div><div class="label">Real Projects</div></div>
      </div>
    </div>
    <div class="hero-right">
      <div class="code-window">
        <div class="code-titlebar">
          <div class="dot dot-r"></div><div class="dot dot-y"></div><div class="dot dot-g"></div>
          <span class="code-filename">api_controller.php</span>
        </div>
        <div class="code-body">
          <div><span class="ln">1</span><span class="cm">// RESTful API Controller — Module 7</span></div>
          <div><span class="ln">2</span></div>
          <div><span class="ln">3</span><span class="kw">namespace</span> <span class="fn">App\Controllers</span><span class="op">;</span></div>
          <div><span class="ln">4</span></div>
          <div><span class="ln">5</span><span class="kw">class</span> <span class="nb">UserController</span></div>
          <div><span class="ln">6</span><span class="op">{</span></div>
          <div><span class="ln">7</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="kw">public function</span> <span class="fn">index</span><span class="op">(): array</span></div>
          <div><span class="ln">8</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">{</span></div>
          <div><span class="ln">9</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="vr">$users</span> <span class="op">=</span> <span class="nb">User</span><span class="op">::</span><span class="fn">query</span><span class="op">()</span></div>
          <div><span class="ln">10</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">-></span><span class="fn">with</span><span class="op">(</span><span class="st">'posts'</span><span class="op">)</span></div>
          <div><span class="ln">11</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">-></span><span class="fn">paginate</span><span class="op">(</span><span class="nb">20</span><span class="op">);</span></div>
          <div><span class="ln">12</span></div>
          <div><span class="ln">13</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kw">return</span> <span class="fn">response</span><span class="op">()-></span><span class="fn">json</span><span class="op">([</span></div>
          <div><span class="ln">14</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="st">'status'</span> <span class="op">=></span> <span class="st">'ok'</span><span class="op">,</span></div>
          <div><span class="ln">15</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="st">'data'</span> <span class="op">=></span> <span class="vr">$users</span></div>
          <div><span class="ln">16</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">]);</span><span class="code-cursor"></span></div>
          <div><span class="ln">17</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="op">}</span></div>
          <div><span class="ln">18</span><span class="op">}</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LEARNING PATHS -->
<section class="path-section" id="tracks">
  <div class="section-inner">
    <div class="reveal">
      <p class="section-tag">// learning_paths</p>
      <h2 class="section-title">Choose Your Path</h2>
      <p class="section-sub">Structured tracks built for every experience level — from writing your first variable to deploying production apps.</p>
    </div>
    <div class="path-grid">
      <div class="path-card reveal" style="--track-color:#00e5a0;--icon-bg:rgba(0,229,160,0.1)">
        <div class="path-icon">🌱</div>
        <div class="path-level">Beginner</div>
        <div class="path-name">PHP Foundations</div>
        <div class="path-desc">Variables, data types, control flow, functions, arrays, forms, and file I/O. Build your first dynamic web page.</div>
        <div class="progress-bar"><div class="progress-fill" style="width:0%"></div></div>
        <div class="path-meta">
          <span>📚 42 lessons</span>
          <span>⏱ 18 hrs</span>
          <span>🔓 Free</span>
        </div>
      </div>
      <div class="path-card reveal" style="--track-color:#3b8cff;--icon-bg:rgba(59,140,255,0.1)">
        <div class="path-icon">⚙️</div>
        <div class="path-level">Intermediate</div>
        <div class="path-name">OOP & Design Patterns</div>
        <div class="path-desc">Classes, interfaces, traits, SOLID principles, MVC architecture, and the most used design patterns in real codebases.</div>
        <div class="progress-bar"><div class="progress-fill" style="width:0%"></div></div>
        <div class="path-meta">
          <span>📚 58 lessons</span>
          <span>⏱ 26 hrs</span>
          <span>🔒 Pro</span>
        </div>
      </div>
      <div class="path-card reveal" style="--track-color:#a78bfa;--icon-bg:rgba(167,139,250,0.1)">
        <div class="path-icon">🚀</div>
        <div class="path-level">Advanced</div>
        <div class="path-name">Laravel Full-Stack</div>
        <div class="path-desc">Routing, Eloquent ORM, Blade, authentication, queues, events, testing, and deploying to production with Docker + CI/CD.</div>
        <div class="progress-bar"><div class="progress-fill" style="width:0%"></div></div>
        <div class="path-meta">
          <span>📚 86 lessons</span>
          <span>⏱ 40 hrs</span>
          <span>🔒 Pro</span>
        </div>
      </div>
      <div class="path-card reveal" style="--track-color:#ff7043;--icon-bg:rgba(255,112,67,0.1)">
        <div class="path-icon">🔌</div>
        <div class="path-level">Specialized</div>
        <div class="path-name">REST API Engineering</div>
        <div class="path-desc">Build, version, secure, document and test production-grade REST APIs with JWT, OAuth2, rate limiting, and Swagger.</div>
        <div class="progress-bar"><div class="progress-fill" style="width:0%"></div></div>
        <div class="path-meta">
          <span>📚 34 lessons</span>
          <span>⏱ 16 hrs</span>
          <span>🔒 Pro</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CURRICULUM -->
<section id="curriculum">
  <div class="section-inner">
    <div class="reveal">
      <p class="section-tag">// curriculum</p>
      <h2 class="section-title">What You'll Learn</h2>
      <p class="section-sub">A carefully sequenced curriculum — each module builds directly on the previous one.</p>
    </div>
    <div class="curriculum-grid reveal">
      <div class="curriculum-nav" id="moduleNav">
        <div class="module-btn active" onclick="setModule(0,this)">
          <div class="module-num">01</div>
          <div class="module-info"><h4>PHP Syntax & Basics</h4><span>12 lessons · 5 hrs</span></div>
        </div>
        <div class="module-btn" onclick="setModule(1,this)">
          <div class="module-num">02</div>
          <div class="module-info"><h4>Functions & Arrays</h4><span>10 lessons · 4.5 hrs</span></div>
        </div>
        <div class="module-btn" onclick="setModule(2,this)">
          <div class="module-num">03</div>
          <div class="module-info"><h4>Object-Oriented PHP</h4><span>16 lessons · 8 hrs</span></div>
        </div>
        <div class="module-btn" onclick="setModule(3,this)">
          <div class="module-num">04</div>
          <div class="module-info"><h4>Database & MySQL</h4><span>14 lessons · 7 hrs</span></div>
        </div>
        <div class="module-btn" onclick="setModule(4,this)">
          <div class="module-num">05</div>
          <div class="module-info"><h4>Laravel Fundamentals</h4><span>20 lessons · 10 hrs</span></div>
        </div>
        <div class="module-btn" onclick="setModule(5,this)">
          <div class="module-num">06</div>
          <div class="module-info"><h4>APIs & Authentication</h4><span>18 lessons · 9 hrs</span></div>
        </div>
      </div>
      <div class="curriculum-content" id="curriculumContent">
        <div id="moduleTitle" style="font-family:var(--font-head);font-size:1.2rem;font-weight:700;margin-bottom:.4rem">PHP Syntax & Basics</div>
        <div style="font-size:0.82rem;color:var(--text-muted);margin-bottom:1.5rem;font-family:var(--font-mono)">12 lessons · 5 hours · Free module</div>
        <div class="lesson-list" id="lessonList"></div>
      </div>
    </div>
  </div>
</section>

<!-- LIVE EDITOR SECTION -->
<section class="editor-section" id="editor">
  <div class="section-inner">
    <div class="editor-inner">
      <div class="reveal">
        <p class="section-tag">// interactive_editor</p>
        <h2 class="section-title">Code in the Browser</h2>
        <p style="color:var(--text-secondary);font-weight:300;margin-top:.8rem;line-height:1.8;max-width:420px">Write and run PHP snippets directly inside the platform — no setup required. See output instantly and compare with solution code.</p>
        <div style="margin-top:2rem;display:flex;flex-direction:column;gap:1rem">
          <div style="display:flex;align-items:flex-start;gap:14px">
            <div style="width:34px;height:34px;border-radius:8px;background:rgba(0,229,160,0.1);display:flex;align-items:center;justify-content:center;font-size:0.9rem;flex-shrink:0">⚡</div>
            <div>
              <div style="font-size:0.9rem;font-weight:500;margin-bottom:3px">Instant execution</div>
              <div style="font-size:0.82rem;color:var(--text-muted);font-weight:300">PHP 8.3 sandbox runs your code server-side in under 300ms</div>
            </div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:14px">
            <div style="width:34px;height:34px;border-radius:8px;background:rgba(59,140,255,0.1);display:flex;align-items:center;justify-content:center;font-size:0.9rem;flex-shrink:0">🔍</div>
            <div>
              <div style="font-size:0.9rem;font-weight:500;margin-bottom:3px">Smart hints</div>
              <div style="font-size:0.82rem;color:var(--text-muted);font-weight:300">Inline error explanations and suggestions when you get stuck</div>
            </div>
          </div>
          <div style="display:flex;align-items:flex-start;gap:14px">
            <div style="width:34px;height:34px;border-radius:8px;background:rgba(167,139,250,0.1);display:flex;align-items:center;justify-content:center;font-size:0.9rem;flex-shrink:0">💾</div>
            <div>
              <div style="font-size:0.9rem;font-weight:500;margin-bottom:3px">Save & share</div>
              <div style="font-size:0.82rem;color:var(--text-muted);font-weight:300">Bookmark snippets, share solutions, and review past work</div>
            </div>
          </div>
        </div>
      </div>
      <div class="editor-window reveal">
        <div class="editor-topbar">
          <div class="editor-tabs">
            <div class="etab active">index.php</div>
            <div class="etab">output</div>
          </div>
          <div style="display:flex;gap:.5rem">
            <div style="width:7px;height:7px;border-radius:50%;background:var(--accent-green);margin-top:2px"></div>
            <span style="font-family:var(--font-mono);font-size:0.68rem;color:var(--text-muted)">PHP 8.3.0</span>
          </div>
        </div>
        <div class="editor-content">
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">1</span><span class="op">&lt;?php</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">2</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">3</span><span class="cm">// Challenge: Filter even numbers</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">4</span><span class="vr">$numbers</span> <span class="op">=</span> <span class="op">[</span><span class="nb">1</span><span class="op">,</span><span class="nb">2</span><span class="op">,</span><span class="nb">3</span><span class="op">,</span><span class="nb">4</span><span class="op">,</span><span class="nb">5</span><span class="op">,</span><span class="nb">6</span><span class="op">,</span><span class="nb">7</span><span class="op">,</span><span class="nb">8</span><span class="op">,</span><span class="nb">9</span><span class="op">,</span><span class="nb">10</span><span class="op">];</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">5</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">6</span><span class="vr">$evens</span> <span class="op">=</span> <span class="fn">array_filter</span><span class="op">(</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">7</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="vr">$numbers</span><span class="op">,</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">8</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="kw">fn</span><span class="op">(</span><span class="vr">$n</span><span class="op">)</span> <span class="op">=></span> <span class="vr">$n</span> <span class="op">%</span> <span class="nb">2</span> <span class="op">===</span> <span class="nb">0</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">9</span><span class="op">);</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">10</span></div>
          <div><span class="ln" style="user-select:none;color:var(--text-muted);font-family:var(--font-mono);font-size:0.7rem;margin-right:20px">11</span><span class="fn">print_r</span><span class="op">(</span><span class="vr">$evens</span><span class="op">);</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">Output</div>
          <div class="output-line">Array ( [1] => 2 [3] => 4 [5] => 6 [7] => 8 [9] => 10 )</div>
          <div style="margin-top:6px;font-size:0.72rem;color:var(--accent-green);">✓ Executed in 0.4ms — All tests passed</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECTS -->
<section class="projects-section" id="projects">
  <div class="section-inner">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1rem" class="reveal">
      <div>
        <p class="section-tag">// build_projects</p>
        <h2 class="section-title">38 Real Projects</h2>
        <p class="section-sub">Not todo apps — real-world projects that go straight to your portfolio.</p>
      </div>
      <a href="#" style="font-size:0.85rem;color:var(--accent-green);text-decoration:none;font-weight:500">View all projects →</a>
    </div>
    <div class="projects-grid">
      <div class="project-card reveal">
        <div class="project-preview" style="background:linear-gradient(135deg,#0f1c2e 0%,#0d2a1a 100%)">
          <div style="text-align:center;padding:20px">
            <div style="color:var(--accent-green);font-size:0.75rem;line-height:1.8">
              <div><span class="kw">class</span> <span class="nb">BlogPost</span> {</div>
              <div>&nbsp;&nbsp;<span class="fn">title</span>: <span class="st">string</span></div>
              <div>&nbsp;&nbsp;<span class="fn">slug</span>: <span class="st">string</span></div>
              <div>&nbsp;&nbsp;<span class="fn">save</span>() { ... }</div>
              <div>}</div>
            </div>
          </div>
        </div>
        <div class="project-body">
          <div class="project-tags"><span class="tag">PHP 8.3</span><span class="tag">MySQL</span><span class="tag">MVC</span></div>
          <div class="project-title">Blog CMS Platform</div>
          <div class="project-desc">Build a fully functional blog CMS with user roles, markdown rendering, file uploads, categories, tags, and an admin panel.</div>
          <div class="project-footer">
            <div>
              <div class="difficulty">
                <div class="difficulty-dot" style="background:var(--accent-green)"></div>
                <div class="difficulty-dot" style="background:var(--accent-green)"></div>
                <div class="difficulty-dot" style="background:rgba(255,255,255,0.1)"></div>
              </div>
              <div class="diff-label" style="font-size:0.72rem;color:var(--text-muted);margin-top:4px">Intermediate</div>
            </div>
            <a class="project-link" href="#">Start Project →</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <div class="project-preview" style="background:linear-gradient(135deg,#0f1427 0%,#1a0d2e 100%)">
          <div style="text-align:center;padding:16px;font-family:var(--font-mono);font-size:0.72rem;color:#a78bfa">
            <div style="border:1px solid rgba(167,139,250,0.2);border-radius:8px;padding:14px 18px;background:rgba(167,139,250,0.05)">
              <div style="color:#a78bfa;font-weight:600;margin-bottom:8px">POST /api/auth/login</div>
              <div style="color:var(--text-muted)">Authorization: Bearer •••</div>
              <div style="margin-top:8px;color:#00e5a0">200 OK { token: "eyJ..." }</div>
            </div>
          </div>
        </div>
        <div class="project-body">
          <div class="project-tags"><span class="tag">Laravel</span><span class="tag">JWT</span><span class="tag">REST</span></div>
          <div class="project-title">JWT Auth REST API</div>
          <div class="project-desc">Build a secure authentication API with JWT tokens, refresh tokens, role-based access control, and rate limiting middleware.</div>
          <div class="project-footer">
            <div>
              <div class="difficulty">
                <div class="difficulty-dot" style="background:var(--accent-blue)"></div>
                <div class="difficulty-dot" style="background:var(--accent-blue)"></div>
                <div class="difficulty-dot" style="background:var(--accent-blue)"></div>
              </div>
              <div class="diff-label" style="font-size:0.72rem;color:var(--text-muted);margin-top:4px">Advanced</div>
            </div>
            <a class="project-link" href="#">Start Project →</a>
          </div>
        </div>
      </div>

      <div class="project-card reveal">
        <div class="project-preview" style="background:linear-gradient(135deg,#1a1006 0%,#0f1720 100%)">
          <div style="text-align:center;padding:16px;font-family:var(--font-mono);font-size:0.75rem">
            <div style="display:flex;justify-content:space-between;margin-bottom:8px;color:var(--text-muted)"><span>Product</span><span>Qty</span><span style="color:var(--accent-orange)">Price</span></div>
            <div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="color:var(--text-primary)">Laptop</span><span style="color:var(--text-muted)">×1</span><span style="color:var(--accent-orange)">$999</span></div>
            <div style="display:flex;justify-content:space-between;margin-bottom:5px"><span style="color:var(--text-primary)">Mouse</span><span style="color:var(--text-muted)">×2</span><span style="color:var(--accent-orange)">$58</span></div>
            <div style="border-top:1px solid rgba(255,255,255,0.07);margin-top:8px;padding-top:8px;display:flex;justify-content:space-between"><span style="color:var(--text-muted)">Total</span><span style="color:var(--accent-orange);font-weight:600">$1,057</span></div>
          </div>
        </div>
        <div class="project-body">
          <div class="project-tags"><span class="tag">PHP</span><span class="tag">Stripe</span><span class="tag">MySQL</span><span class="tag">Sessions</span></div>
          <div class="project-title">E-Commerce Store</div>
          <div class="project-desc">Full e-commerce platform with product management, shopping cart, Stripe payments, order history, and inventory tracking.</div>
          <div class="project-footer">
            <div>
              <div class="difficulty">
                <div class="difficulty-dot" style="background:var(--accent-orange)"></div>
                <div class="difficulty-dot" style="background:var(--accent-orange)"></div>
                <div class="difficulty-dot" style="background:var(--accent-orange)"></div>
              </div>
              <div class="diff-label" style="font-size:0.72rem;color:var(--text-muted);margin-top:4px">Advanced</div>
            </div>
            <a class="project-link" href="#">Start Project →</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section id="features">
  <div class="section-inner">
    <div class="reveal">
      <p class="section-tag">// platform_features</p>
      <h2 class="section-title">Built for Developers</h2>
    </div>
    <div class="features-grid">
      <div class="feature-card reveal">
        <div class="feature-icon">🖥️</div>
        <div class="feature-title">In-Browser PHP IDE</div>
        <div class="feature-desc">A full-featured editor with syntax highlighting, autocompletion, and instant PHP 8.3 execution — no environment setup needed.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon">🧪</div>
        <div class="feature-title">Automated Testing</div>
        <div class="feature-desc">Every lesson includes automated test cases. Get immediate, specific feedback on what's passing and what needs fixing.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon">📊</div>
        <div class="feature-title">Progress Tracking</div>
        <div class="feature-desc">Visual dashboards track your completion rate, code quality scores, time spent, and streak — all in one place.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon">🤝</div>
        <div class="feature-title">Peer Code Review</div>
        <div class="feature-desc">Submit projects for community review. Get actionable feedback from fellow learners and experienced mentors.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon">🎯</div>
        <div class="feature-title">Coding Challenges</div>
        <div class="feature-desc">Daily and weekly PHP challenges ranked by difficulty, with a leaderboard. Sharpen your problem-solving consistently.</div>
      </div>
      <div class="feature-card reveal">
        <div class="feature-icon">🏆</div>
        <div class="feature-title">Certificate of Completion</div>
        <div class="feature-desc">Earn verifiable certificates after each track. Share directly to LinkedIn to validate your expertise to employers.</div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section style="background:var(--bg-secondary);padding:90px 5%">
  <div class="section-inner">
    <div class="reveal" style="text-align:center;margin-bottom:3rem">
      <p class="section-tag" style="justify-content:center;display:block">// student_reviews</p>
      <h2 class="section-title">What Students Say</h2>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card reveal">
        <div class="stars">★★★★★</div>
        <div class="t-text">The project-based curriculum is what sold me. I didn't just learn syntax — I built things I could actually show in interviews. Landed a backend role 3 months in.</div>
        <div class="t-author">
          <div class="t-avatar" style="background:rgba(0,229,160,0.1);color:var(--accent-green)">AR</div>
          <div><div class="t-name">Aditya Rao</div><div class="t-role">Junior Backend Dev at Razorpay</div></div>
        </div>
      </div>
      <div class="testimonial-card reveal">
        <div class="stars">★★★★★</div>
        <div class="t-text">I tried 3 other platforms before this one. The in-browser IDE and instant test feedback is miles ahead. The Laravel track is insanely comprehensive.</div>
        <div class="t-author">
          <div class="t-avatar" style="background:rgba(59,140,255,0.1);color:var(--accent-blue)">SK</div>
          <div><div class="t-name">Sarah Kim</div><div class="t-role">Freelance PHP Developer</div></div>
        </div>
      </div>
      <div class="testimonial-card reveal">
        <div class="stars">★★★★☆</div>
        <div class="t-text">Switched from Python to PHP in 6 weeks following the Foundations path. The pace is perfect — challenging but never overwhelming. Worth every rupee.</div>
        <div class="t-author">
          <div class="t-avatar" style="background:rgba(167,139,250,0.1);color:var(--accent-purple)">MP</div>
          <div><div class="t-name">Mihail Popescu</div><div class="t-role">Full-Stack Dev, Romania</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="cta-section" id="pricing">
  <div class="section-inner">
    <div class="reveal">
      <p class="section-tag" style="display:block">// pricing</p>
      <h2 class="cta-title">Pick Your Plan</h2>
      <p class="cta-sub">Start free. Upgrade when you're ready to go deeper.</p>
    </div>
    <div class="pricing-cards reveal">
      <div class="price-card">
        <div class="price-label">Starter</div>
        <div class="price-amount">$0</div>
        <div class="price-period">Free forever</div>
        <ul class="price-features">
          <li><span class="check">✓</span> PHP Foundations track</li>
          <li><span class="check">✓</span> In-browser IDE</li>
          <li><span class="check">✓</span> 42 free lessons</li>
          <li><span class="check">✓</span> 3 beginner projects</li>
          <li style="color:var(--text-muted)"><span style="color:var(--text-muted)">✗</span> Certificate</li>
        </ul>
        <button class="price-btn outline">Get Started Free</button>
      </div>
      <div class="price-card featured">
        <div class="price-label">Pro</div>
        <div class="price-amount" style="color:var(--accent-green)">$19</div>
        <div class="price-period">per month · cancel anytime</div>
        <ul class="price-features">
          <li><span class="check">✓</span> All 4 learning tracks</li>
          <li><span class="check">✓</span> 240+ lessons unlocked</li>
          <li><span class="check">✓</span> All 38 projects</li>
          <li><span class="check">✓</span> Peer code review</li>
          <li><span class="check">✓</span> Completion certificates</li>
        </ul>
        <button class="price-btn solid">Start 7-day Free Trial</button>
      </div>
      <div class="price-card">
        <div class="price-label">Team</div>
        <div class="price-amount">$12</div>
        <div class="price-period">per seat / month · 5+ seats</div>
        <ul class="price-features">
          <li><span class="check">✓</span> Everything in Pro</li>
          <li><span class="check">✓</span> Team progress dashboard</li>
          <li><span class="check">✓</span> Custom learning paths</li>
          <li><span class="check">✓</span> Dedicated Slack support</li>
          <li><span class="check">✓</span> Invoice billing</li>
        </ul>
        <button class="price-btn outline">Contact Sales</button>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div>
      <div class="footer-logo">PHP<span>Forge</span></div>
      <div class="footer-tagline">The modern PHP learning platform built by engineers, for engineers.</div>
    </div>
    <div class="footer-col">
      <h5>Platform</h5>
      <ul>
        <li><a href="#">Learning Paths</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Challenges</a></li>
        <li><a href="#">Leaderboard</a></li>
        <li><a href="#">Certificates</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Resources</h5>
      <ul>
        <li><a href="#">PHP Docs</a></li>
        <li><a href="#">Cheat Sheets</a></li>
        <li><a href="#">Community Forum</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Changelog</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Company</h5>
      <ul>
        <li><a href="#">About</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Terms</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-copy">© 2025 PHPForge. All rights reserved.</div>
    <div class="footer-social">
      <a class="social-btn" href="#">G</a>
      <a class="social-btn" href="#">𝕏</a>
      <a class="social-btn" href="#">in</a>
    </div>
  </div>
</footer>

<script>
const modules = [
  {
    title:'PHP Syntax & Basics',
    meta:'12 lessons · 5 hours · Free module',
    lessons:[
      {icon:'▶',done:false,title:'What is PHP? Setting up your environment',dur:'12min',badge:'free'},
      {icon:'▶',done:false,title:'Variables, constants & data types',dur:'18min',badge:'free'},
      {icon:'▶',done:false,title:'Strings and string functions',dur:'22min',badge:'free'},
      {icon:'▶',done:false,title:'Arithmetic & comparison operators',dur:'15min',badge:'free'},
      {icon:'▶',done:false,title:'if / else / match statements',dur:'20min',badge:'free'},
      {icon:'▶',done:false,title:'for, while, foreach loops',dur:'18min',badge:'free'},
      {icon:'▶',done:false,title:'Working with HTML forms',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'GET and POST superglobals',dur:'14min',badge:null},
      {icon:'▶',done:false,title:'Include and require files',dur:'10min',badge:null},
      {icon:'▶',done:false,title:'Error handling basics',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'Type juggling and type coercion',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Project: Contact form with validation',dur:'40min',badge:null},
    ]
  },
  {
    title:'Functions & Arrays',
    meta:'10 lessons · 4.5 hours · Pro module',
    lessons:[
      {icon:'▶',done:false,title:'Defining and calling functions',dur:'15min',badge:null},
      {icon:'▶',done:false,title:'Parameters, defaults & named args',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Return types & type declarations',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Arrow functions and closures',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Indexed and associative arrays',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Multidimensional arrays',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'array_map, array_filter, array_reduce',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'Sorting and searching arrays',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'Spread operator & unpacking',dur:'14min',badge:null},
      {icon:'▶',done:false,title:'Project: Data transformation pipeline',dur:'45min',badge:null},
    ]
  },
  {
    title:'Object-Oriented PHP',
    meta:'16 lessons · 8 hours · Pro module',
    lessons:[
      {icon:'▶',done:false,title:'Classes, objects & properties',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Constructor & destructor methods',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'Visibility: public, private, protected',dur:'14min',badge:null},
      {icon:'▶',done:false,title:'Inheritance and method overriding',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Abstract classes and interfaces',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'Traits in PHP',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Static methods and properties',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'Magic methods',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'SOLID principles in PHP',dur:'40min',badge:null},
      {icon:'▶',done:false,title:'Design Patterns: Singleton & Factory',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'Design Patterns: Observer & Strategy',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'Namespaces and autoloading',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Composer and packages',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Exception handling',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'PHP 8.x: Enums, Fibers, attributes',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'Project: OOP Blog engine',dur:'60min',badge:null},
    ]
  },
  {
    title:'Database & MySQL',
    meta:'14 lessons · 7 hours · Pro module',
    lessons:[
      {icon:'▶',done:false,title:'Relational databases & SQL basics',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'PHP PDO connection',dur:'15min',badge:null},
      {icon:'▶',done:false,title:'Prepared statements & binding',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'CRUD operations',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'SQL JOINs and relationships',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'Migrations and schema management',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Transactions and error handling',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Database normalization',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Indexing for performance',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Full-text search',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Pagination patterns',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'SQL injection prevention',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Caching with Redis',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'Project: User management system',dur:'55min',badge:null},
    ]
  },
  {
    title:'Laravel Fundamentals',
    meta:'20 lessons · 10 hours · Pro module',
    lessons:[
      {icon:'▶',done:false,title:'Installing Laravel & Artisan CLI',dur:'15min',badge:null},
      {icon:'▶',done:false,title:'Routing: web, API, resource routes',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Controllers and middleware',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'Blade templating engine',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'Request validation & form requests',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Eloquent ORM: models & relationships',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'Migrations and database seeding',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Authentication with Breeze/Fortify',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'Authorization: policies & gates',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'File storage and S3 integration',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Mail and notifications',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Queues and jobs',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'Events and listeners',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Testing with PHPUnit & Pest',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'API resources and transformers',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Caching and performance',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Laravel Horizon & Telescope',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Docker + deployment basics',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'CI/CD with GitHub Actions',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Project: Full-stack SaaS MVP',dur:'90min',badge:null},
    ]
  },
  {
    title:'APIs & Authentication',
    meta:'18 lessons · 9 hours · Pro module',
    lessons:[
      {icon:'▶',done:false,title:'REST API design principles',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'HTTP methods & status codes',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'Building a CRUD API in Laravel',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'JWT authentication deep dive',dur:'30min',badge:null},
      {icon:'▶',done:false,title:'OAuth2 and social login',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'Laravel Sanctum for SPA auth',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'API versioning strategies',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Rate limiting and throttling',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'API documentation with Swagger',dur:'25min',badge:null},
      {icon:'▶',done:false,title:'Consuming external APIs with Guzzle',dur:'22min',badge:null},
      {icon:'▶',done:false,title:'Webhooks: sending and receiving',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'GraphQL with Lighthouse',dur:'35min',badge:null},
      {icon:'▶',done:false,title:'API testing with Postman',dur:'18min',badge:null},
      {icon:'▶',done:false,title:'Error handling and API responses',dur:'16min',badge:null},
      {icon:'▶',done:false,title:'CORS configuration',dur:'12min',badge:null},
      {icon:'▶',done:false,title:'API security best practices',dur:'28min',badge:null},
      {icon:'▶',done:false,title:'Caching API responses',dur:'20min',badge:null},
      {icon:'▶',done:false,title:'Project: Production-ready REST API',dur:'80min',badge:null},
    ]
  }
];

function setModule(idx, btn) {
  document.querySelectorAll('.module-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const m = modules[idx];
  document.getElementById('moduleTitle').textContent = m.title;
  document.getElementById('curriculumContent').querySelector('div:nth-child(2)').textContent = m.meta;
  const list = document.getElementById('lessonList');
  list.innerHTML = m.lessons.slice(0,8).map(l => `
    <div class="lesson-item">
      <div class="lesson-icon${l.done?' done':''}">${l.icon}</div>
      <div class="lesson-title">${l.title}</div>
      ${l.badge ? `<span class="lesson-badge ${l.badge}">${l.badge}</span>` : ''}
      <div class="lesson-duration">${l.dur}</div>
    </div>
  `).join('') + (m.lessons.length > 8 ? `<div style="padding:14px 0;font-size:0.82rem;color:var(--text-muted);cursor:pointer;text-align:center;border-top:1px solid var(--border)">+${m.lessons.length-8} more lessons</div>` : '');
}
setModule(0, document.querySelector('.module-btn'));

// Scroll reveal
const obs = new IntersectionObserver((entries) => {
  entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); } });
}, {threshold:0.1});
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// Animate progress bars on scroll
const progObs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if(e.isIntersecting) {
      e.target.querySelectorAll('.progress-fill').forEach(f => {
        f.style.width = Math.random() < 0.5 ? '0%' : '0%';
      });
    }
  });
}, {threshold:0.3});
document.querySelectorAll('.path-card').forEach(c => progObs.observe(c));
</script>
</body>
</html>