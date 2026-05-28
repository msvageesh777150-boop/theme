<footer id="science" class="relative overflow-hidden border-t border-border px-6 pt-24 pb-10">
  <div aria-hidden class="pointer-events-none absolute inset-0">
    <div class="animate-ambient absolute -bottom-40 left-1/2 h-[500px] w-[900px] -translate-x-1/2 rounded-full opacity-30 blur-[160px]" style="background: var(--gradient-electric);"></div>
  </div>

  <div class="relative mx-auto max-w-7xl">
    <div class="reveal-item mb-20 grid items-end gap-10 md-grid-cols-2" style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));">
      <h2 class="font-display text-balance text-5xl font-light leading-[0.95] md-text-7xl">
        Join the <span class="italic font-extralight">signal.</span>
      </h2>
      <form class="glass flex items-center gap-2 rounded-full p-2">
        <input
          type="email"
          placeholder="your@frequency.com"
          class="flex-1 bg-transparent px-4 py-2 text-sm outline-none placeholder:text-muted-foreground"
        />
        <button class="btn-magnetic primary px-6 py-3 !text-[10px]" data-magnetic>
          <span class="btn-magnetic-bg"></span>
          Subscribe
        </button>
      </form>
    </div>

    <div class="grid gap-12 border-t border-border pt-16 md-grid-cols-4" style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr));">
      <div>
        <div class="font-display text-xl tracking-[0.3em]">AETHER°</div>
        <p class="mt-4 max-w-xs text-xs leading-relaxed text-muted-foreground">
          Precision performance, engineered in Zürich. Lab-tested, athlete-approved, climate-neutral.
        </p>
      </div>
      
      <?php
      $menus = [
        ["t" => "Catalogue", "l" => ["Recovery", "Energy", "Protein", "Hydration"]],
        ["t" => "Company", "l" => ["Science", "Athletes", "Lab", "Press"]],
        ["t" => "Support", "l" => ["Help", "Returns", "Subscriptions", "Contact"]]
      ];
      foreach ($menus as $menu):
      ?>
        <div>
          <div class="mb-5 text-[10px] tracking-[0.4em] uppercase text-muted-foreground"><?php echo $menu['t']; ?></div>
          <ul class="space-y-3 text-sm">
            <?php foreach ($menu['l'] as $x): ?>
              <li style="margin-bottom: 0.75rem;">
                <a href="#" class="transition-smooth hover:text-electric"><?php echo $x; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-20 flex flex-col items-center gap-6 border-t border-border pt-8 text-[10px] tracking-[0.3em] uppercase text-muted-foreground md-flex" style="flex-direction: row; justify-content: space-between;">
      <span>© 2026 Aether Performance Systems</span>
      <div class="flex items-center gap-2">
        <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-electric"></span>
        All systems nominal · Zürich
      </div>
      <div class="flex gap-6">
        <a href="#" style="margin-right: 1.5rem;">Privacy</a>
        <a href="#" style="margin-right: 1.5rem;">Terms</a>
        <a href="#">Cookies</a>
      </div>
    </div>

    <!-- Massive wordmark -->
    <div aria-hidden class="pointer-events-none -mb-16 mt-12 select-none text-center font-display text-[clamp(4rem,22vw,20rem)] font-extrabold leading-none tracking-tight uppercase" style="background: var(--gradient-text); -webkit-background-clip: text; -webkit-text-fill-color: transparent; opacity: 0.85;">
      AETHER°
    </div>
  </div>
</footer>
