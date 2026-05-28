<?php
$stackJson = file_get_contents(__DIR__ . "/../data/stack.json");
$modules = json_decode($stackJson, true);
?>
<section id="stack" class="relative overflow-hidden px-6 py-32">
  <div aria-hidden class="absolute inset-0">
    <div class="animate-ambient absolute top-1/2 left-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-electric opacity-10 blur-[140px]"></div>
  </div>

  <div class="relative mx-auto max-w-7xl">
    <div class="reveal-item mb-14 text-center">
      <p class="mb-4 text-[10px] tracking-[0.4em] uppercase text-muted-foreground">Configurator</p>
      <h2 class="font-display text-balance text-5xl font-light md-text-6xl">
        Build your <span class="italic font-extralight">stack</span>.
      </h2>
      <p class="mx-auto mt-5 max-w-lg text-sm leading-relaxed text-muted-foreground">
        Tap modules to compose a regimen calibrated to your discipline. Ships as one system.
      </p>
    </div>

    <div class="grid gap-6 lg-grid-cols-3">
      <div class="lg-col-span-2 grid grid-cols-1 gap-3 sm-grid-cols-2">
        <?php foreach ($modules as $i => $m): ?>
          <div class="reveal-item" style="transition-delay: <?php echo $i * 0.05; ?>s;">
            <button
              aria-pressed="false"
              class="glass relative flex w-full items-start justify-between gap-4 rounded-2xl p-5 text-left transition-smooth stack-module-btn"
              data-id="<?php echo $m['id']; ?>"
              data-price="<?php echo $m['price']; ?>"
              data-label="<?php echo $m['label']; ?>"
              data-magnetic
            >
              <div>
                <div class="flex items-center gap-2">
                  <span class="relative grid h-5 w-5 place-items-center rounded-full border border-border">
                    <span class="indicator-dot h-2 w-2 rounded-full bg-electric hidden"></span>
                    <span class="indicator-ring absolute inset-0 rounded-full"></span>
                  </span>
                  <span class="font-display text-lg"><?php echo $m['label']; ?></span>
                </div>
                <p class="mt-2 text-xs leading-relaxed text-muted-foreground"><?php echo $m['desc']; ?></p>
              </div>
              <span class="font-display text-sm">₹<?php echo number_format($m['price'], 0, '.', ','); ?></span>
            </button>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="reveal-item" style="transition-delay: 0.2s;">
        <div class="glass-strong sticky top-28 rounded-3xl p-7">
          <div class="text-[10px] tracking-[0.4em] uppercase text-muted-foreground">Your stack</div>
          <div id="module-count" class="mt-4 font-display text-5xl">0<span class="text-xl text-muted-foreground"> modules</span></div>
          <div class="my-6 h-px bg-border"></div>
          <ul id="selected-modules-list" class="space-y-2 text-sm">
            <!-- Rendered dynamically by main.js -->
          </ul>
          <div class="mt-6 flex items-baseline justify-between">
            <span class="text-[10px] tracking-[0.4em] uppercase text-muted-foreground">Subtotal</span>
            <span id="subtotal-value" class="font-display text-3xl">₹0</span>
          </div>
          <div class="mt-6">
            <button class="btn-magnetic primary w-full py-4" data-magnetic>
              <span class="btn-magnetic-bg"></span>
              Lock my stack
            </button>
          </div>
          <p class="mt-3 text-center text-[10px] tracking-[0.3em] uppercase text-muted-foreground">Free shipping · 30-day</p>
        </div>
      </div>
    </div>
  </div>
</section>
