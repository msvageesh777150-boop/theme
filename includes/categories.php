<?php
$productsJson = file_get_contents(__DIR__ . "/../data/products.json");
$products = json_decode($productsJson, true);
?>
<section id="shop" class="relative overflow-hidden px-6 py-40">
  <div aria-hidden class="pointer-events-none absolute inset-0">
    <div class="animate-ambient absolute top-[10%] left-[5%] h-[420px] w-[420px] rounded-full opacity-25 blur-[140px]" style="background: var(--purple);"></div>
    <div class="animate-ambient absolute right-[5%] bottom-[10%] h-[480px] w-[480px] rounded-full opacity-25 blur-[140px]" style="background: var(--orange); animation-delay: -5s;"></div>
  </div>

  <div class="relative mx-auto max-w-[1400px]">
    <div class="reveal-item mb-20 flex flex-col items-start justify-between gap-8 md-flex" style="flex-direction: row; align-items: flex-end;">
      <div>
        <p class="mb-5 text-[10px] tracking-[0.4em] uppercase text-muted-foreground">Catalogue · 2026</p>
        <h2 class="font-display text-balance text-6xl font-extrabold uppercase leading-[0.9] tracking-tight md-text-8xl">
          The <span class="text-gradient">entire</span><br />
          <span class="italic font-extralight text-muted-foreground">ecosystem</span>.
        </h2>
      </div>
      <p class="max-w-sm text-sm leading-relaxed text-muted-foreground">
        Five product lines. Engineered to interlock. From the molecule in your bloodstream to the carbon plate beneath your foot.
      </p>
    </div>

    <!-- Featured product wide card -->
    <?php foreach ($products as $it): ?>
      <?php if ($it['featured']): ?>
        <div class="reveal-item">
          <a href="#" role="button" aria-haspopup="dialog" aria-label="View details for <?php echo htmlspecialchars($it['title']); ?>" onclick="event.preventDefault(); openProductDetail('<?php echo htmlspecialchars($it['title']); ?>')" class="group glass relative mb-8 grid overflow-hidden rounded-2xl-strong card-tilt" style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));">
            <div class="relative aspect-[5/4] overflow-hidden" style="aspect-ratio: 5/4;">
              <img
                src="<?php echo $it['img']; ?>"
                alt="<?php echo $it['title']; ?>"
                loading="lazy"
                class="h-full w-full object-cover transition-smooth card-tilt-inner"
              />
              <div class="absolute left-5 top-5 glass rounded-full px-3 py-1 text-[9px] tracking-[0.3em] uppercase categories-tag-bubble"><?php echo $it['tag']; ?></div>
            </div>
            <div class="flex flex-col justify-between p-10">
              <div>
                <div class="text-[10px] tracking-[0.4em] uppercase text-muted-foreground"><?php echo $it['code']; ?> · Featured drop</div>
                <h3 class="mt-4 font-display text-5xl font-bold uppercase leading-[0.9]"><?php echo $it['title']; ?></h3>
                <p class="mt-6 max-w-md text-sm leading-relaxed text-muted-foreground">
                  A carbon-plated geometry tuned over 14,000km of testing. Energy return north of 87%. The fastest shoe we have ever shipped.
                </p>
              </div>
              <div class="mt-10 flex items-end justify-between">
                <div>
                  <div class="text-[10px] tracking-[0.4em] uppercase text-muted-foreground"><?php echo $it['tone']; ?></div>
                  <div class="mt-3 font-display text-4xl font-bold">₹<?php echo number_format($it['price'], 0, '.', ','); ?></div>
                </div>
                <div class="font-display text-sm tracking-[0.3em] uppercase text-orange">Add to bag →</div>
              </div>
            </div>
          </a>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

    <div class="grid grid-cols-1 gap-5 sm-grid-cols-2 lg-grid-cols-4">
      <?php $delayIndex = 0; ?>
      <?php foreach ($products as $it): ?>
        <?php if (!$it['featured']): ?>
          <div class="reveal-item" style="transition-delay: <?php echo $delayIndex * 0.08; ?>s;">
            <a href="#" role="button" aria-haspopup="dialog" aria-label="View details for <?php echo htmlspecialchars($it['title']); ?>" onclick="event.preventDefault(); openProductDetail('<?php echo htmlspecialchars($it['title']); ?>')" class="group glass relative block overflow-hidden rounded-3xl transition-smooth card-tilt categories-grid-card" style="aspect-ratio: 1/1;">
              <!-- Specular reflection sweep line -->
              <div class="absolute inset-0 pointer-events-none z-10" style="background: linear-gradient(135deg, transparent 35%, rgba(255,255,255,0.12) 50%, transparent 65%); transform: translate3d(-100%, -100%, 0); transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1); will-change: transform;" data-sheen></div>
              
              <div class="absolute inset-0 transition-smooth card-tilt-inner">
                <img src="<?php echo $it['img']; ?>" alt="<?php echo $it['title']; ?>" loading="lazy" class="h-full w-full object-cover transition-smooth group-hover:scale-105" />
              </div>
              <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 40%, oklch(0.08 0.02 280 / 0.85) 100%);"></div>
              
              <div class="absolute inset-x-0 top-0 flex items-center justify-between p-5">
                <span class="font-display text-[10px] tracking-[0.3em] text-white/80"><?php echo $it['code']; ?></span>
                <span class="glass rounded-full px-3 py-1 text-[9px] tracking-[0.25em] uppercase categories-tag-bubble"><?php echo $it['tag']; ?></span>
              </div>
              
              <div class="absolute inset-x-0 bottom-0 p-5">
                <div class="font-display categories-card-title"><?php echo $it['title']; ?></div>
                <div class="mt-1 text-[10px] tracking-[0.3em] uppercase text-muted-foreground"><?php echo $it['tone']; ?></div>
                
                <div class="mt-4 flex items-center justify-between border-t border-white/10 pt-3 text-xs">
                  <span class="font-display text-base font-bold">₹<?php echo number_format($it['price'], 0, '.', ','); ?></span>
                  <span class="text-lime">Shop →</span>
                </div>
              </div>
            </a>
          </div>
          <?php $delayIndex++; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
