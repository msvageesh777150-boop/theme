<?php
$items = ["Free worldwide shipping", "Lab-tested in Zürich", "Worn by 12 Olympians", "Climate-neutral logistics", "30-day satisfaction guarantee", "Series 04 — Now shipping"];
$row = array_merge($items, $items);
?>
<section aria-hidden class="relative overflow-hidden border-y border-border py-6">
  <div class="flex animate-marquee gap-12 whitespace-nowrap" style="will-change: transform;">
    <?php foreach ($row as $i => $t): ?>
      <span class="flex items-center gap-12 font-display text-2xl font-extrabold uppercase tracking-tight md-text-4xl">
        <span class="<?php echo ($i % 3 === 0 ? "text-gradient" : ($i % 3 === 1 ? "text-orange" : "text-foreground")); ?>"><?php echo $t; ?></span>
        <span class="text-lime">✦</span>
      </span>
    <?php endforeach; ?>
  </div>
</section>
