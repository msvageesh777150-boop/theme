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
        <div class="glass relative overflow-hidden p-0" style="min-height: 520px; height: 520px; border-radius: 2rem !important; overflow: hidden; position: relative;">
          <!-- Spotlighting vector glow backings -->
          <div class="absolute top-0 inset-x-0 h-40 opacity-30 blur-2xl transition-smooth" style="background: radial-gradient(ellipse at top, var(--electric) 0%, transparent 70%);"></div>

          <!-- Static Athlete Image -->
          <img src="assets/athlete.jpg" alt="Elite Athlete Telemetry" class="w-full h-full object-cover" style="border-radius: 2rem !important;" />
          
          <!-- Live statistics badges overlay -->
          <div class="glass-strong z-20 shadow-glow-blue rounded-xl p-4" style="position: absolute; bottom: 1.5rem; left: 1.5rem; max-width: 220px;">
            <div class="text-[9px] tracking-[0.25em] uppercase text-muted-foreground">Live · Heart rate</div>
            <div class="mt-1 font-display text-2xl">142<span class="text-xs text-muted-foreground">bpm</span></div>
            <div class="mt-2 flex gap-1">
              <?php for ($i=0; $i<18; $i++): ?>
                <span class="w-1 rounded-full bg-electric" style="height: <?php echo 5 + ($i % 4) * 3; ?>px;"></span>
              <?php endfor; ?>
            </div>
          </div>
          
          <div class="glass-strong z-20 shadow-glow-lime rounded-xl p-3 text-right" style="position: absolute; top: 1.5rem; right: 1.5rem;">
            <div class="text-[9px] tracking-[0.25em] uppercase text-muted-foreground">Lactate</div>
            <div class="font-display text-xl">2.1<span class="text-xs text-muted-foreground"> mmol</span></div>
          </div>
        </div>
      </div>
    </div>
</section>
