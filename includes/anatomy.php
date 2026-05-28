<?php
$panels = [
  [
    "img" => "assets/product-shoe.jpg",
    "code" => "A / 01",
    "title" => "Carbon Architecture",
    "spec" => "178g · 87% energy return",
    "body" => "A full-length carbon plate suspended in vacuum-formed PEBA. Tuned over 14,000km of closed-track testing.",
    "accent" => "var(--orange)"
  ],
  [
    "img" => "assets/product-watch.jpg",
    "code" => "A / 02",
    "title" => "Pulse Telemetry",
    "spec" => "96h battery · titanium",
    "body" => "Eight biometric channels sampled at 250 Hz. Surfaces lactate threshold, HRV drift and stride asymmetry — live.",
    "accent" => "var(--electric)"
  ],
  [
    "img" => "assets/product-hydration.jpg",
    "code" => "A / 03",
    "title" => "Plasma Hydration",
    "spec" => "Electrolyte matrix · 750ml",
    "body" => "A sodium-potassium plasma calibrated to your sweat rate. Vacuum steel keeps it cold for 22 hours.",
    "accent" => "var(--lime)"
  ],
  [
    "img" => "assets/product-protein.jpg",
    "code" => "A / 04",
    "title" => "Synthesis Reactor",
    "spec" => "27g · 4.2g leucine",
    "body" => "Cold-filtered whey isolate paired with a fast-uptake leucine peptide. Engineered for the 60-minute repair window.",
    "accent" => "var(--purple)"
  ]
];
?>
<section id="anatomy-section" aria-label="Product anatomy" class="relative" style="height: <?php echo count($panels) * 100; ?>vh;">
  <div class="sticky top-0 h-screen overflow-hidden">
    <!-- ambient backdrop -->
    <div aria-hidden class="pointer-events-none absolute inset-0">
      <div class="animate-aurora absolute top-1/2 left-1/2 h-[900px] w-[900px] -translate-x-1/2 -translate-y-1/2 rounded-full opacity-20 blur-[140px] bg-aurora"></div>
      <div class="noise absolute inset-0 opacity-40 mix-blend-overlay"></div>
    </div>

    <!-- header -->
    <div class="absolute inset-x-0 top-0 z-20 mx-auto flex max-w-[1400px] items-center justify-between px-6 pt-28 md-pt-32" style="padding-top: 8rem;">
      <div>
        <p class="text-[10px] tracking-[0.5em] uppercase text-muted-foreground">Anatomy · Reel 03</p>
        <h2 class="mt-3 font-display text-3xl font-extrabold uppercase leading-none md-text-5xl">
          Engineered, <span class="italic font-extralight text-muted-foreground">component by component.</span>
        </h2>
      </div>
      <div class="hidden text-right text-[10px] tracking-[0.4em] uppercase text-muted-foreground md-block">
        Drag · or scroll
      </div>
    </div>

    <!-- horizontal track -->
    <div id="anatomy-horizontal-track" class="flex h-full" style="will-change: transform; transition: transform 0.1s ease-out; width: <?php echo count($panels) * 100; ?>vw;">
      <?php foreach ($panels as $i => $p): ?>
        <div class="relative flex h-full w-screen shrink-0 items-center px-6 md-px-16" style="width: 100vw;">
          <div class="relative mx-auto grid w-full max-w-[1400px] items-center gap-10 md-grid-cols-12">
            <!-- image -->
            <div class="relative md-col-span-7">
              <div class="relative aspect-[4/3] overflow-hidden rounded-[2rem] glass-strong" style="aspect-ratio: 4/3;">
                <div class="absolute -inset-10 rounded-full opacity-40 blur-3xl" style="background: <?php echo $p['accent']; ?>;"></div>
                <img
                  src="<?php echo $p['img']; ?>"
                  alt="<?php echo $p['title']; ?>"
                  loading="lazy"
                  class="relative h-full w-full object-cover transition-smooth"
                />
                <!-- corner ticks -->
                <div class="pointer-events-none absolute inset-4 flex items-start justify-between text-[9px] tracking-[0.4em] uppercase text-white/70">
                  <span><?php echo $p['code']; ?></span>
                  <span>● rec</span>
                </div>
                <div class="pointer-events-none absolute inset-x-4 bottom-4 flex items-end justify-between text-[9px] tracking-[0.4em] uppercase text-white/70">
                  <span>iso · 200</span>
                  <span><?php echo $p['spec']; ?></span>
                </div>
              </div>
            </div>

            <!-- copy -->
            <div class="md-col-span-5">
              <div class="font-display text-[clamp(5rem,12vw,11rem)] font-extrabold leading-[0.85] tracking-tight" style="-webkit-text-stroke: 1px oklch(1 0 0 / 0.4); color: transparent;">
                0<?php echo $i + 1; ?>
              </div>
              <h3 class="mt-2 font-display text-3xl font-extrabold uppercase leading-[0.9]">
                <?php echo $p['title']; ?>
              </h3>
              <p class="mt-5 max-w-md text-sm leading-relaxed text-foreground/80"><?php echo $p['body']; ?></p>
              <div class="mt-8 inline-flex items-center gap-3 rounded-full glass px-4 py-2 text-[10px] tracking-[0.35em] uppercase">
                <span class="h-1.5 w-1.5 rounded-full" style="background: <?php echo $p['accent']; ?>;"></span>
                <?php echo $p['spec']; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- progress rail -->
    <div class="absolute inset-x-0 bottom-8 z-20 mx-auto flex max-w-[1400px] items-center gap-4 px-6 text-[10px] tracking-[0.4em] uppercase text-muted-foreground">
      <span>01</span>
      <div class="relative h-px flex-1 overflow-hidden bg-white/10">
        <div id="scroll-progress-rail" class="absolute inset-y-0 left-0 h-full" style="width: 0%; transition: width 0.1s ease-out;">
          <div class="h-full w-full" style="background: var(--gradient-sunset);"></div>
        </div>
      </div>
      <span>0<?php echo count($panels); ?></span>
    </div>
  </div>
</section>
