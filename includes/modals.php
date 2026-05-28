<!-- 1. Fullscreen Cinematic Product Takeover Mode -->
<div id="product-detail-modal" class="modal-overlay" style="align-items: stretch; justify-content: stretch;">
  <div class="modal-content glass-strong" style="width: 100vw; height: 100vh; max-width: none; border-radius: 0; border: none; padding: 4rem; overflow-y: auto; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.95); backdrop-filter: blur(28px);">
    <span class="modal-close cursor-none" onclick="closeProductDetail()" style="position: fixed; top: 2rem; right: 2rem; font-size: 2rem; z-index: 100;">&times; Close</span>
    
    <div class="grid lg-grid-cols-12 gap-16 w-full max-w-[1400px] items-center">
      
      <!-- Visual Display Left Column -->
      <div class="lg-col-span-6 relative flex justify-center items-center">
        <!-- Ambient radial glow behind product -->
        <div class="absolute inset-0 rounded-full opacity-35 blur-3xl bg-aurora animate-aurora pointer-events-none"></div>
        <div class="relative w-full max-w-[520px] aspect-square overflow-hidden rounded-3xl border border-white/10 glass-strong flex items-center justify-center cursor-none" style="aspect-ratio: 1/1;">
          <img id="modal-product-img" src="" alt="Product Image" class="w-[85%] h-[85%] object-contain transition-smooth" style="filter: drop-shadow(0 30px 50px rgba(0, 242, 254, 0.3));" />
        </div>
      </div>

      <!-- Specs & Details Right Column -->
      <div class="lg-col-span-6 flex flex-col gap-6 text-left">
        <div>
          <span id="modal-product-tag" class="glass rounded-full px-4 py-1.5 text-[9px] tracking-[0.3em] uppercase text-lime">Supplements</span>
          <h2 id="modal-product-title" class="font-display text-5xl md-text-6xl font-extrabold uppercase mt-6 tracking-tight text-gradient">Whey Protein Reactor</h2>
          <p id="modal-product-tone" class="text-xs text-muted-foreground mt-2 uppercase tracking-widest">Lean synthesis · 27g</p>
        </div>
        
        <p class="text-sm leading-relaxed text-foreground/80 max-w-xl">
          Calibrated using premium performance grade synthetics. Designed to lock into your metabolic recovery cycle smoothly. Lab-certified and Olympians benchmarked.
        </p>

        <!-- Dynamic Stock Status HUD -->
        <div class="glass p-4 rounded-xl border border-white/5 max-w-md">
          <div class="flex items-center justify-between text-[9px] uppercase tracking-wider text-muted-foreground">
            <span>Availability Status</span>
            <span class="text-lime">Calibrated & In Stock</span>
          </div>
          <div class="mt-2 font-display text-xs text-white">System standard: <span class="text-lime font-bold">12 units remain</span></div>
        </div>
        
        <div>
          <div class="text-[9px] tracking-[0.2em] uppercase text-muted-foreground mb-3">Select System Variant</div>
          <div class="flex gap-2">
            <button class="variant-btn active border border-electric/40 bg-electric/10 text-electric px-4 py-2 rounded-full text-xs">Standard</button>
            <button class="variant-btn border border-white/10 px-4 py-2 rounded-full text-xs hover:bg-white/5">Calibrated</button>
            <button class="variant-btn border border-white/10 px-4 py-2 rounded-full text-xs hover:bg-white/5">Pro Core</button>
          </div>
        </div>

        <div class="flex items-center gap-6 mt-4">
          <div class="quantity-control glass-strong" style="max-width: 9rem;">
            <button class="cursor-none" onclick="updateQty(-1)">&minus;</button>
            <span id="modal-qty" class="font-display text-base">1</span>
            <button class="cursor-none" onclick="updateQty(1)">&plus;</button>
          </div>
          <div id="modal-product-price" class="font-display text-4xl font-bold">₹5,312</div>
        </div>

        <button id="add-to-cart-btn" class="btn-magnetic primary w-full max-w-md py-4 mt-4 cursor-none" data-magnetic>
          <span class="btn-magnetic-bg"></span>
          Add to Bag
        </button>
      </div>

    </div>
  </div>
</div>


<!-- 2. Slide-out Cart Sidebar Drawer -->
<div id="cart-drawer-overlay" class="cart-drawer-overlay">
  <div class="cart-drawer glass-strong">
    <div class="flex justify-between items-center mb-6">
      <h3 class="font-display text-2xl uppercase tracking-wider">Your Bag</h3>
      <button onclick="closeCart()" class="text-muted-foreground text-sm hover:text-white transition-smooth uppercase tracking-wider">Close &times;</button>
    </div>
    
    <div class="my-4 h-px bg-border"></div>
    
    <!-- Cart Items Scroll Area -->
    <div id="cart-items-container" class="flex-1" style="display: flex; flex-direction: column; gap: 1rem; overflow-y: auto; margin-bottom: 1.5rem; max-height: 55vh; padding-right: 0.5rem;">
      <!-- Dynamic list in main.js -->
    </div>
    
    <div class="my-4 h-px bg-border"></div>

    <div class="mt-4 flex flex-col gap-4">
      <div class="flex justify-between items-baseline">
        <span class="text-[10px] tracking-[0.3em] uppercase text-muted-foreground">Estimated Total</span>
        <span id="cart-total" class="font-display text-3xl">₹0</span>
      </div>
      
      <button onclick="openCheckout()" class="btn-magnetic primary w-full py-4 mt-2" data-magnetic>
        <span class="btn-magnetic-bg"></span>
        Proceed to Checkout
      </button>
      <p class="text-center text-[8px] tracking-[0.2em] uppercase text-muted-foreground mt-2">Free shipping · 30-day warranty</p>
    </div>
  </div>
</div>

<!-- 3. Checkout Modal -->
<div id="checkout-modal" class="modal-overlay">
  <div class="modal-content glass-strong" style="max-width: 40rem;">
    <span class="modal-close" onclick="closeCheckout()">&times;</span>
    <h2 class="font-display text-3xl font-extrabold uppercase mb-6 text-center">Secure Checkout</h2>
    
    <form id="checkout-form" onsubmit="handlePlaceOrder(event)" class="grid gap-4">
      <div class="form-group">
        <label for="checkout-name">Full Name</label>
        <input type="text" id="checkout-name" required placeholder="Alexander Sprinter" />
      </div>
      <div class="form-group">
        <label for="checkout-email">Email Frequency</label>
        <input type="email" id="checkout-email" required placeholder="alex@frequency.com" />
      </div>
      <div class="form-group">
        <label for="checkout-address">Calibrated Shipping Address</label>
        <textarea id="checkout-address" required rows="3" placeholder="42 Plasma Way, Elite Sector 7, Bengaluru, Karnataka"></textarea>
      </div>

      <div class="my-4 h-px bg-border"></div>
      
      <div class="flex justify-between items-baseline mb-4">
        <span class="text-[10px] tracking-[0.3em] uppercase text-muted-foreground">Amount Calibrated</span>
        <span id="checkout-total" class="font-display text-2xl text-lime">₹0</span>
      </div>

      <button type="submit" class="btn-magnetic primary w-full py-4" data-magnetic>
        <span class="btn-magnetic-bg"></span>
        Confirm & Place Order
      </button>
    </form>
  </div>
</div>

<!-- 4. Order Success Success Overlay -->
<div id="success-modal" class="modal-overlay">
  <div class="modal-content glass-strong text-center" style="max-width: 32rem; padding: 3rem 2rem;">
    <div class="relative grid h-16 w-16 place-items-center rounded-full border border-electric mx-auto mb-6 shadow-glow-blue">
      <span class="h-4 w-4 rounded-full bg-electric"></span>
      <span class="absolute inset-0 animate-pulse-ring rounded-full"></span>
    </div>
    
    <h2 class="font-display text-4xl font-extrabold uppercase mb-4 text-gradient">Systems Nominal</h2>
    <p class="text-[10px] tracking-[0.3em] uppercase text-lime mb-6">Order calib_0974x successfully placed</p>
    
    <p class="text-sm leading-relaxed text-muted-foreground mb-8">
      Your metabolic performance stack has been locked and calibrated. Tracking frequencies will be transmitted to your email shortly.
    </p>
    
    <button onclick="closeSuccess()" class="btn-magnetic ghost px-8 py-3" data-magnetic>
      Return to System
    </button>
  </div>
</div>
