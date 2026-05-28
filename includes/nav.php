<header class="header-glass">
  <nav class="glass flex items-center justify-between rounded-full px-6 py-3">
    <a href="/" class="font-display text-sm tracking-[0.35em]">
      AETHER<span class="text-electric">°</span>
    </a>
    <ul class="hidden items-center gap-8 text-xs tracking-[0.2em] uppercase md-flex">
      <?php foreach (["Shop", "Stack", "Athletes", "Science"] as $link): ?>
        <li>
          <a href="#<?php echo strtolower($link); ?>" class="relative text-muted-foreground transition-smooth hover:text-foreground">
            <?php echo $link; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
    <button id="bag-btn" onclick="openCart()" class="btn-magnetic primary px-5 py-2 !text-[10px]" data-magnetic>
      <span class="btn-magnetic-bg"></span>
      Bag · 0
    </button>
  </nav>
</header>
