<section id="hero-scene" class="bg-hero relative flex min-h-110vh items-center overflow-hidden pt-28">
  <!-- Ambient auroras -->
  <div aria-hidden class="pointer-events-none absolute inset-0">
    <div id="hero-aurora-bg" class="animate-aurora absolute top-1/2 left-1/2 h-[1100px] w-[1100px] -translate-x-1/2 -translate-y-1/2 rounded-full opacity-30 blur-[120px] bg-aurora"></div>
    <div class="animate-ambient absolute -top-24 left-[6%] h-[460px] w-[460px] rounded-full opacity-50 blur-[140px]" style="background: var(--purple);"></div>
    <div class="animate-ambient absolute right-[4%] top-[20%] h-[420px] w-[420px] rounded-full opacity-50 blur-[140px]" style="background: var(--electric); animation-delay: -3s;"></div>
    <div class="animate-ambient absolute right-[10%] bottom-0 h-[480px] w-[480px] rounded-full opacity-50 blur-[140px]" style="background: var(--orange); animation-delay: -6s;"></div>
    <div class="animate-ambient absolute left-[10%] bottom-[5%] h-[360px] w-[360px] rounded-full opacity-40 blur-[120px]" style="background: var(--coral); animation-delay: -9s;"></div>
    <div class="noise absolute inset-0 opacity-40 mix-blend-overlay"></div>
  </div>

  <div class="relative mx-auto grid w-full max-w-1400px grid-cols-1 items-center gap-12 px-6 lg-grid-cols-12">
    <div class="relative z-10 lg-col-span-7">
      <div class="glass mb-8 inline-flex items-center gap-3 rounded-full px-4 py-1.5 text-10px tracking-[0.4em] uppercase text-muted-foreground">
        <span class="h-1.5 w-1.5 animate-pulse rounded-full" style="background: var(--lime);"></span>
        <span class="text-foreground/80">Drop 04</span>
        <span>·</span>
        <span>Shipping Worldwide</span>
      </div>
      
      <h1 id="hero-main-title" class="font-display text-balance hero-title uppercase transition-smooth">
        <span class="block animate-reveal" style="animation-delay: 1.1s;">Run</span>
        <span class="block animate-reveal text-gradient" style="animation-delay: 1.25s;">Faster.</span>
        <span class="block animate-reveal italic font-extralight text-muted-foreground" style="animation-delay: 1.4s;">recover</span>
        <span class="block animate-reveal" style="animation-delay: 1.55s;">
          <span class="text-orange">beyond</span> limit.
        </span>
      </h1>

      <p id="hero-desc" class="mt-10 max-w-md text-balance text-base leading-relaxed text-muted-foreground transition-smooth">
        A precision-engineered performance ecosystem — supplements, footwear, smart wearables and gear, calibrated as one cinematic system.
      </p>

      <div class="mt-10 flex flex-wrap items-center gap-4">
        <button onclick="document.getElementById('shop').scrollIntoView({behavior: 'smooth'})" class="btn-magnetic primary px-8 py-4" data-magnetic>
          <span class="btn-magnetic-bg"></span>
          Shop the Drop →
        </button>
        <button onclick="document.getElementById('reactor-centerpiece').scrollIntoView({behavior: 'smooth'})" class="btn-magnetic ghost px-8 py-4" data-magnetic>
          Explore Core
        </button>
      </div>

      <div class="mt-16 grid max-w-lg grid-cols-3 gap-6">
        <div>
          <div id="hero-stat-1-val" class="font-display text-3xl font-bold transition-smooth">0.02s</div>
          <div id="hero-stat-1-lbl" class="mt-1 text-10px tracking-[0.3em] uppercase text-muted-foreground transition-smooth">Onset</div>
        </div>
        <div>
          <div id="hero-stat-2-val" class="font-display text-3xl font-bold transition-smooth">98.7%</div>
          <div id="hero-stat-2-lbl" class="mt-1 text-10px tracking-[0.3em] uppercase text-muted-foreground transition-smooth">Bioavailable</div>
        </div>
        <div>
          <div id="hero-stat-3-val" class="font-display text-3xl font-bold transition-smooth">12+</div>
          <div id="hero-stat-3-lbl" class="mt-1 text-10px tracking-[0.3em] uppercase text-muted-foreground transition-smooth">Olympians</div>
        </div>
      </div>
    </div>

    <div class="relative lg-col-span-5">
      <div id="hero-carousel-container" class="relative mx-auto aspect-square w-full max-w-640px transition-smooth cursor-none" style="aspect-ratio: 1/1;">
        <!-- dynamic ambient glow layers -->
        <div id="hero-glow-1" class="absolute inset-10 rounded-full opacity-70 blur-3xl transition-smooth" style="background: var(--gradient-electric);"></div>
        <div id="hero-glow-2" class="absolute inset-20 rounded-full opacity-50 blur-3xl transition-smooth" style="background: var(--gradient-sunset);"></div>
        
        <div class="absolute inset-0 flex items-center justify-center">
          <img
            id="hero-carousel-img"
            src="assets/hero-product.png"
            alt="Cinematic sports tech showcases"
            class="animate-float relative hero-product-img transition-smooth"
            style="will-change: transform, opacity, filter;"
          />
        </div>

        <!-- Floating spec chips -->
        <div id="hero-chip-1" class="glass absolute top-12pct -left-2 rounded-2xl px-4 py-3 shadow-glow-blue transition-smooth" style="will-change: transform, opacity;">
          <div id="hero-chip-1-lbl" class="text-[9px] tracking-[0.3em] uppercase text-muted-foreground">Compound</div>
          <div id="hero-chip-1-val" class="font-display text-sm">N-Acetyl · L-Tyr</div>
        </div>
        <div id="hero-chip-2" class="glass absolute right-0 bottom-24pct rounded-2xl px-4 py-3 shadow-glow-orange transition-smooth" style="will-change: transform, opacity;">
          <div id="hero-chip-2-lbl" class="text-[9px] tracking-[0.3em] uppercase text-muted-foreground">Dose</div>
          <div id="hero-chip-2-val" class="font-display text-sm">2.4 g · AM</div>
        </div>
        <div id="hero-chip-3" class="glass absolute right-12pct neg-bottom-6 rounded-full px-5 py-2 text-10px tracking-[0.3em] uppercase shadow-glow-lime transition-smooth" style="will-change: transform, opacity;">
          <span class="mr-2 inline-block h-1.5 w-1.5 rounded-full" style="background: var(--lime);"></span>
          <span id="hero-chip-3-val">Lab certified</span>
        </div>
      </div>
    </div>
  </div>

  <!-- scroll cue -->
  <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-10px tracking-[0.4em] uppercase text-muted-foreground pointer-events-none">
    Scroll · to feel it
  </div>
</section>
