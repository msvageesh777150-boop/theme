<section id="athletes" class="relative overflow-hidden px-6 py-32">
  <div class="mx-auto grid max-w-7xl items-center gap-16 lg-grid-cols-12">
    <div class="reveal-item lg-col-span-5">
      <p class="mb-4 text-[10px] tracking-[0.4em] uppercase text-muted-foreground">Athlete Index</p>
      <h2 class="font-display text-balance text-5xl font-light leading-[1] md-text-6xl">
        Measured against <span class="italic font-extralight">the elite</span>.
      </h2>
      <p class="mt-6 max-w-md text-sm leading-relaxed text-muted-foreground">
        Every formula is benchmarked in closed trials with world-tour cyclists, F1 drivers and Olympic sprinters. The numbers do the talking.
      </p>

      <div class="mt-12 space-y-6">
        <?php
        $stats = [
          ["l" => "VO₂ max gain", "v" => "+11.4%", "w" => 88],
          ["l" => "Time-to-fatigue", "v" => "+27%", "w" => 92],
          ["l" => "Recovery window", "v" => "−38%", "w" => 76],
          ["l" => "Cognitive reaction", "v" => "+18%", "w" => 64]
        ];
        foreach ($stats as $i => $s):
        ?>
          <div class="reveal-item" style="transition-delay: <?php echo $i * 0.08; ?>s;">
            <div>
              <div class="mb-2 flex items-baseline justify-between">
                <span class="text-xs tracking-[0.25em] uppercase text-muted-foreground"><?php echo $s['l']; ?></span>
                <span class="font-display text-2xl"><?php echo $s['v']; ?></span>
              </div>
              <div class="h-px overflow-hidden bg-border">
                <div class="h-full bg-electric" style="transform-origin: left; transform: scaleX(<?php echo $s['w'] / 100; ?>); transition: transform 1.4s var(--ease-cinema) 0.2s;"></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="relative lg-col-span-7">
      <div class="reveal-item relative flex flex-col gap-6">
        <div class="glass relative overflow-hidden rounded-[2rem] flex flex-col items-center justify-center p-6" style="min-height: 520px;">
          <!-- Spotlighting vector glow backings -->
          <div id="jersey-light-beam" class="absolute top-0 inset-x-0 h-40 opacity-30 blur-2xl transition-smooth" style="background: radial-gradient(ellipse at top, var(--electric) 0%, transparent 70%);"></div>

          <!-- Dynamic Draggable Canvas -->
          <canvas id="jersey-3d-canvas" class="relative z-10 w-full max-w-[480px] h-[400px] cursor-none" aria-label="Interactive 3D rotating apparel compression jersey simulator"></canvas>

          <!-- Swatch Selectors Overlay -->
          <div class="relative z-20 flex gap-4 mt-4 bg-black/60 px-6 py-3 rounded-full border border-white/10 backdrop-blur">
            <button onclick="setJerseyColor('electric', '#00f2fe')" class="w-6 h-6 rounded-full border-2 border-white/20 transition-smooth hover:scale-110 active:scale-95" style="background-color: oklch(0.68 0.22 250);"></button>
            <button onclick="setJerseyColor('purple', '#9b51e0')" class="w-6 h-6 rounded-full border-2 border-white/20 transition-smooth hover:scale-110 active:scale-95" style="background-color: oklch(0.55 0.24 305);"></button>
            <button onclick="setJerseyColor('orange', '#f2994a')" class="w-6 h-6 rounded-full border-2 border-white/20 transition-smooth hover:scale-110 active:scale-95" style="background-color: oklch(0.75 0.2 50);"></button>
            <button onclick="setJerseyColor('lime', '#27ae60')" class="w-6 h-6 rounded-full border-2 border-white/20 transition-smooth hover:scale-110 active:scale-95" style="background-color: oklch(0.88 0.2 130);"></button>
          </div>
        </div>
        
        <!-- Live statistics badges -->
        <div class="glass-strong absolute bottom-4 left-4 max-w-[220px] rounded-xl p-4 z-20">
          <div class="text-[9px] tracking-[0.25em] uppercase text-muted-foreground">Live · Heart rate</div>
          <div class="mt-1 font-display text-2xl">142<span class="text-xs text-muted-foreground">bpm</span></div>
          <div class="mt-2 flex gap-1">
            <?php for ($i=0; $i<18; $i++): ?>
              <span class="w-1 rounded-full bg-electric" style="height: <?php echo 5 + ($i % 4) * 3; ?>px;"></span>
            <?php endfor; ?>
          </div>
        </div>
        
        <div class="glass-strong absolute top-4 right-4 rounded-xl p-3 text-right shadow-glow-lime z-20">
          <div class="text-[9px] tracking-[0.25em] uppercase text-muted-foreground">Lactate</div>
          <div class="font-display text-xl">2.1<span class="text-xs text-muted-foreground"> mmol</span></div>
        </div>
      </div>
    </div>
  </div>
</section>
