<section id="reactor-centerpiece" class="relative overflow-hidden px-6 py-40 border-y border-border bg-background">
  <!-- Dynamic atmospheric background glows -->
  <div aria-hidden class="pointer-events-none absolute inset-0">
    <div id="reactor-glow-field" class="animate-ambient absolute top-1/2 left-1/2 h-[700px] w-[700px] -translate-x-1/2 -translate-y-1/2 rounded-full opacity-20 blur-[130px] transition-smooth" style="background: radial-gradient(circle, var(--electric) 0%, transparent 70%);"></div>
    <div class="noise absolute inset-0 opacity-20 mix-blend-overlay"></div>
  </div>

  <div class="relative mx-auto max-w-[1400px]">
    <div class="grid grid-cols-1 items-center gap-16 lg-grid-cols-12">
      
      <!-- Copy Details Left Column -->
      <div class="reveal-item lg-col-span-5 z-10">
        <p class="mb-4 text-[10px] tracking-[0.5em] uppercase text-lime">Telemetry · Core</p>
        <h2 class="font-display text-balance text-5xl font-extrabold uppercase leading-[0.9] tracking-tight md-text-7xl">
          The <span class="text-gradient">Holographic</span><br />
          <span class="italic font-extralight text-muted-foreground">reactor</span>.
        </h2>
        <p class="mt-6 text-sm leading-relaxed text-muted-foreground">
          Calibrating the active metabolic energy fields of the human machine. A mathematical 3D simulation running live telemetry vectors to balance recovery, focus, and explosive velocity.
        </p>

        <!-- Live Core Status HUD -->
        <div class="glass-strong mt-10 rounded-2xl p-5 border border-border">
          <div class="flex items-center justify-between">
            <span class="text-[10px] tracking-[0.3em] uppercase text-muted-foreground">System Engine Status</span>
            <span class="inline-flex items-center gap-2 rounded-full bg-lime/10 px-3 py-1 text-[9px] font-semibold text-lime">
              <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-lime"></span>
              Active · 250Hz
            </span>
          </div>
          <div class="mt-4 grid grid-cols-2 gap-4 pt-3 border-t border-white/5">
            <div>
              <span class="text-[8px] tracking-[0.2em] uppercase text-muted-foreground">Quantum Charge</span>
              <div class="font-display text-lg font-bold text-white mt-1">98.42%</div>
            </div>
            <div>
              <span class="text-[8px] tracking-[0.2em] uppercase text-muted-foreground">Thermal Calibration</span>
              <div class="font-display text-lg font-bold text-electric mt-1">Nominal</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Holographic Interactive Canvas Render Column -->
      <div class="relative lg-col-span-7 flex justify-center items-center">
        <div class="relative w-full max-w-[640px] aspect-square rounded-[2rem] glass border border-white/10 overflow-hidden flex items-center justify-center" style="aspect-ratio: 1/1;">
          
          <!-- Volumetric light flare backdrop -->
          <div class="absolute inset-20 rounded-full opacity-35 blur-3xl bg-aurora animate-aurora pointer-events-none"></div>

          <!-- Master Core Canvas Node -->
          <canvas id="hologram-reactor-canvas" class="relative z-10 w-full h-full block cursor-none" aria-label="Interactive 3D mathematical core reactor showing spinning energy waves"></canvas>

          <!-- Core interactive overlay instructions -->
          <div class="pointer-events-none absolute bottom-5 left-1/2 -translate-x-1/2 z-20 text-[9px] tracking-[0.4em] uppercase text-white/50 bg-black/40 backdrop-blur px-4 py-1.5 rounded-full border border-white/5">
            Hold & Drag · to calibrate telemetry
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
