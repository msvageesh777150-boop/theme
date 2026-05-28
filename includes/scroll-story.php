<?php
$chapters = [
  ["kicker" => "Chapter 01", "title" => "The first millisecond", "body" => "Reaction begins before the gun. We engineered a neural primer that compresses the gap between thought and motion.", "img" => "assets/scene-athlete.jpg"],
  ["kicker" => "Chapter 02", "title" => "Velocity, transmitted", "body" => "Carbon plates, vacuum-formed mesh, and a midsole tuned to return 87% of impact. Every step is a refund.", "img" => "assets/product-shoe.jpg"],
  ["kicker" => "Chapter 03", "title" => "Recovered, faster", "body" => "Mitochondrial repair compounds, electrolyte plasma, and sleep-grade REM optimization — engineered as one system.", "img" => "assets/product-watch.jpg"]
];
?>
<section id="scroll-story-section" class="relative overflow-hidden" style="height: <?php echo count($chapters) * 100; ?>vh;">
  <!-- Sticky cinematic visual -->
  <div class="sticky top-0 h-screen overflow-hidden">
    <?php foreach ($chapters as $i => $c): ?>
      <div
        class="story-chapter-visual absolute inset-0"
        style="opacity: <?php echo $i === 0 ? '1' : '0'; ?>; transition: opacity 0.5s ease-out; transform: scale(1.05); will-change: opacity;"
      >
        <img src="<?php echo $c['img']; ?>" alt="<?php echo $c['title']; ?>" class="h-full w-full object-cover" loading="lazy" />
      </div>
    <?php endforeach; ?>
    
    <div class="absolute inset-0" style="opacity: 0.7; transition: opacity 0.5s ease-out;">
      <div class="absolute inset-0" style="background: radial-gradient(60% 60% at 50% 60%, transparent 0%, oklch(0.1 0.03 280 / 0.95) 80%);"></div>
    </div>
    <div class="absolute inset-0 mix-blend-screen opacity-30 bg-aurora animate-aurora"></div>

    <!-- Scrub HUD -->
    <div class="absolute inset-x-0 bottom-10 px-6">
      <div class="mx-auto flex max-w-[1400px] items-center gap-4 text-[10px] tracking-[0.4em] uppercase text-muted-foreground">
        <span>Reel · 02</span>
        <div class="relative h-px flex-1 overflow-hidden bg-white/10">
          <div id="scroll-story-progress-rail" class="absolute inset-y-0 left-0 h-full" style="width: 0%;">
            <div class="h-full w-full" style="background: var(--gradient-electric);"></div>
          </div>
        </div>
        <span>Cinematic mode</span>
      </div>
    </div>
  </div>

  <!-- Scrolling chapters text -->
  <div class="relative" style="margin-top: -100vh; z-index: 10;">
    <?php foreach ($chapters as $i => $c): ?>
      <div class="flex h-screen items-center px-6">
        <div class="reveal-item mx-auto w-full max-w-[1400px]" style="<?php echo $i % 2 ? 'text-align: right;' : 'text-align: left;'; ?>">
          <div class="max-w-xl" style="<?php echo $i % 2 ? 'margin-left: auto;' : 'margin-right: auto;'; ?>">
            <div class="text-[10px] tracking-[0.5em] uppercase text-lime"><?php echo $c['kicker']; ?></div>
            <h3 class="mt-4 font-display text-5xl font-extrabold uppercase leading-[0.92] md-text-7xl">
              <?php echo $c['title']; ?>
            </h3>
            <p class="mt-6 text-base leading-relaxed text-foreground/80"><?php echo $c['body']; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
