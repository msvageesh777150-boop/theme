/**
 * Aether° — 45-System Cinematic 3D Operating Frontend Engine (Final Delivery)
 * Orchestrated under a singular high-performance requestAnimationFrame loop.
 */

const GSE = {
  active: true,
  fps: 60,
  lastTime: performance.now(),
  frameTimes: [],
  lowPerfMode: false,
  mouse: { x: window.innerWidth / 2, y: window.innerHeight / 2, lerpX: window.innerWidth / 2, lerpY: window.innerHeight / 2 },
  viewportActive: { reactor: false, apparel: false },
  idleTimer: null,
  isIdle: false
};

// Configurator swatches state
let currentJerseyColor = "electric";
let currentJerseyHex = "#00f2fe";

window.setJerseyColor = (colorName, colorHex) => {
  currentJerseyColor = colorName;
  currentJerseyHex = colorHex;
  const spotlight = document.getElementById("jersey-light-beam");
  if (spotlight) {
    spotlight.style.background = `radial-gradient(ellipse at top, ${colorHex} 0%, transparent 70%)`;
  }
};

const init = () => {
  // --- Loader Sequence ---
  const loader = document.getElementById("loader");
  if (loader) {
    setTimeout(() => {
      loader.style.transition = "opacity 1s cubic-bezier(0.22, 1, 0.36, 1), filter 1s";
      loader.style.opacity = "0";
      loader.style.filter = "blur(20px)";
      setTimeout(() => loader.remove(), 1000);
    }, 1800);
  }

  // --- High-Contrast Simple Custom Cursor (System 1, 5, 37) ---
  const cursorGlow = document.getElementById("cursor-glow");
  const cursorDot = document.getElementById("cursor-dot");
  let cursorTarget = null; // target CTA for magnetic snapping

  window.addEventListener("mousemove", (e) => {
    GSE.mouse.x = e.clientX;
    GSE.mouse.y = e.clientY;
    
    GSE.isIdle = false;
    clearTimeout(GSE.idleTimer);
    GSE.idleTimer = setTimeout(() => { GSE.isIdle = true; }, 8000);

    const target = e.target;
    if (!target) return;
    const isClickable = target.closest("a, button, [role='button'], [data-magnetic]");
    
    // Magnetic target lookup (System 5)
    if (isClickable) {
      cursorTarget = isClickable;
      if (cursorDot) {
        cursorDot.style.width = "28px";
        cursorDot.style.height = "28px";
        cursorDot.style.backgroundColor = "transparent";
        cursorDot.style.borderColor = "var(--electric)";
      }
    } else {
      cursorTarget = null;
      if (cursorDot) {
        cursorDot.style.width = "10px";
        cursorDot.style.height = "10px";
        cursorDot.style.backgroundColor = "#fff";
        cursorDot.style.borderColor = "var(--electric)";
      }
    }
  });

  // --- Homepage Full Screen Cinematic Product Rotation (System 2, 21) ---
  const heroProducts = [
    {
      title: "<span>Creatine</span><br/><span class='text-gradient'>Synthesis.</span>",
      desc: "Pharmaceutical grade neural primer supplement engineered to compress reaction times in active elite athletes.",
      img: "assets/hero-product.png",
      accent: "var(--gradient-electric)",
      accentHex: "#00f2fe",
      stat1Val: "0.02s", stat1Lbl: "Neural Onset",
      stat2Val: "98.7%", stat2Lbl: "Bioactive Rate",
      stat3Val: "12+", stat3Lbl: "Olympic Medals",
      chip1Val: "N-Acetyl · L-Tyr", chip2Val: "2.4 g · AM", chip3Val: "Clinically Certified"
    },
    {
      title: "<span>Velocity</span><br/><span class='text-orange'>Runner V3.</span>",
      desc: "Suspended carbon structural plate footwear crafted for massive momentum return north of eighty seven percent.",
      img: "assets/product-shoe.jpg",
      accent: "var(--gradient-sunset)",
      accentHex: "#f2994a",
      stat1Val: "178g", stat1Lbl: "Ultralight Frame",
      stat2Val: "87.4%", stat2Lbl: "Kinetic Return",
      stat3Val: "14k km", stat3Lbl: "Closed Track Testing",
      chip1Val: "Carbon Susp", chip2Val: "Energy Plate", chip3Val: "Fastest drop"
    },
    {
      title: "<span>Compression</span><br/><span class='text-purple'>AeroMesh.</span>",
      desc: "Luxury seamless active athletic jersey engineered to maintain cooling vents and dynamic muscle alignment.",
      img: "assets/product-apparel.jpg",
      accent: "var(--gradient-electric)",
      accentHex: "#9b51e0",
      stat1Val: "AeroMesh", stat1Lbl: "Fabric spec",
      stat2Val: "3D Align", stat2Lbl: "Muscle locking",
      stat3Val: "Zero Friction", stat3Lbl: "Seamless joins",
      chip1Val: "Seamless", chip2Val: "Grade Pro", chip3Val: "configurators ready"
    },
    {
      title: "<span>HydroCore</span><br/><span class='text-lime'>Plasma Steel.</span>",
      desc: "Vacuum-sealed elite athletic hydration matrix engineered to retain cold temperatures up to twenty two hours.",
      img: "assets/product-hydration.jpg",
      accent: "var(--gradient-lime)",
      accentHex: "#27ae60",
      stat1Val: "750ml", stat1Lbl: "Liquid Capacity",
      stat2Val: "22 Hours", stat2Lbl: "Cold retention",
      stat3Val: "Plasma Matr", stat3Lbl: "Sweat optimized",
      chip1Val: "Steel Vacuum", chip2Val: "Ionized Lock", chip3Val: "Thermodynamic"
    },
    {
      title: "<span>Pulse Smart</span><br/><span class='text-gradient'>Telemetry.</span>",
      desc: "Titanium biometric telemetry wearable mapping heart rate variability drift and lactate thresholds live.",
      img: "assets/product-watch.jpg",
      accent: "var(--gradient-electric)",
      accentHex: "#00f2fe",
      stat1Val: "96 Hours", stat1Lbl: "Battery Life",
      stat2Val: "250 Hz", stat2Lbl: "Biometric Sampling",
      stat3Val: "Titanium", stat3Lbl: "Premium Chassis",
      chip1Val: "HRV telemetry", chip2Val: "8 channels", chip3Val: "Live diagnostic"
    }
  ];

  let currentHeroIdx = 0;
  const carouselImg = document.getElementById("hero-carousel-img");
  const mainTitle = document.getElementById("hero-main-title");
  const heroDesc = document.getElementById("hero-desc");
  
  const stat1Val = document.getElementById("hero-stat-1-val");
  const stat1Lbl = document.getElementById("hero-stat-1-lbl");
  const stat2Val = document.getElementById("hero-stat-2-val");
  const stat2Lbl = document.getElementById("hero-stat-2-lbl");
  const stat3Val = document.getElementById("hero-stat-3-val");
  const stat3Lbl = document.getElementById("hero-stat-3-lbl");
  
  const chip1 = document.getElementById("hero-chip-1");
  const chip2 = document.getElementById("hero-chip-2");
  const chip3 = document.getElementById("hero-chip-3");
  const chip1Val = document.getElementById("hero-chip-1-val");
  const chip2Val = document.getElementById("hero-chip-2-val");
  const chip3Val = document.getElementById("hero-chip-3-val");

  const run3DCinematicCrossSlide = () => {
    currentHeroIdx = (currentHeroIdx + 1) % heroProducts.length;
    const p = heroProducts[currentHeroIdx];

    // Outgoing product: Slide left, perspective tilt, shrink scale, blur fade (System 1)
    if (carouselImg) {
      carouselImg.style.transition = "transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.5s, filter 0.5s";
      carouselImg.style.transform = "translate3d(-100%, 0, 0) scale(0.8) rotate(-10deg)";
      carouselImg.style.opacity = "0";
      carouselImg.style.filter = "blur(15px)";
    }

    const textualElements = [mainTitle, heroDesc, stat1Val, stat1Lbl, stat2Val, stat2Lbl, stat3Val, stat3Lbl, chip1, chip2, chip3];
    textualElements.forEach(el => {
      if (el) {
        el.style.transition = "transform 0.5s, opacity 0.5s, filter 0.5s";
        el.style.transform = "translate3d(0, 20px, 0)";
        el.style.opacity = "0";
        el.style.filter = "blur(10px)";
      }
    });

    setTimeout(() => {
      // Re-populate incoming details
      if (carouselImg) {
        carouselImg.src = p.img;
        carouselImg.style.filter = `drop-shadow(0 30px 50px ${p.accentHex})`;
        // Setup incoming coordinates: Enters oversized from right with perspective tilt
        carouselImg.style.transition = "none";
        carouselImg.style.transform = "translate3d(100%, 0, 0) scale(1.3) rotate(15deg)";
      }

      if (mainTitle) mainTitle.innerHTML = p.title;
      if (heroDesc) heroDesc.textContent = p.desc;
      if (stat1Val) stat1Val.textContent = p.stat1Val;
      if (stat1Lbl) stat1Lbl.textContent = p.stat1Lbl;
      if (stat2Val) stat2Val.textContent = p.stat2Val;
      if (stat2Lbl) stat2Lbl.textContent = p.stat2Lbl;
      if (stat3Val) stat3Val.textContent = p.stat3Val;
      if (stat3Lbl) stat3Lbl.textContent = p.stat3Lbl;
      
      if (chip1Val) chip1Val.textContent = p.chip1Val;
      if (chip2Val) chip2Val.textContent = p.chip2Val;
      if (chip3Val) chip3Val.textContent = p.chip3Val;

      // Morph background gradient dynamically
      const g1 = document.getElementById("hero-glow-1");
      const g2 = document.getElementById("hero-glow-2");
      if (g1) g1.style.background = p.accent;
      if (g2) g2.style.background = p.accent;

      // Settle with spring-cushioning and specular sweep triggers (System 1)
      requestAnimationFrame(() => {
        if (carouselImg) {
          carouselImg.style.transition = "transform 0.9s cubic-bezier(0.175, 0.885, 0.32, 1.1), opacity 0.8s, filter 0.8s";
          carouselImg.style.transform = "translate3d(0, 0, 0) scale(1) rotate(0deg)";
          carouselImg.style.opacity = "1";
          carouselImg.style.filter = "blur(0px)";
        }
        
        textualElements.forEach(el => {
          if (el) {
            el.style.transition = "transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.1), opacity 0.8s, filter 0.8s";
            el.style.transform = "translate3d(0, 0, 0)";
            el.style.opacity = "1";
            el.style.filter = "blur(0px)";
          }
        });
      });
    }, 550);
  };

  // Automated rotating slideshow triggers
  setInterval(() => {
    if (!GSE.isIdle && !document.getElementById("product-detail-modal").classList.contains("active")) {
      run3DCinematicCrossSlide();
    }
  }, 6500);

  // --- Procedural Holographic Core Centerpiece (System 5, 23) ---
  const reactorCanvas = document.getElementById("hologram-reactor-canvas");
  let reactorCtx = null;
  let reactorPoints = [];
  let reactorAngleY = 0;
  let reactorAngleX = 0;
  let isDraggingReactor = false;
  let startDragX = 0;
  let startDragY = 0;

  if (reactorCanvas) {
    reactorCanvas.width = 640;
    reactorCanvas.height = 640;
    reactorCtx = reactorCanvas.getContext("2d");

    for (let i = 0; i < 350; i++) {
      const u = Math.random();
      const v = Math.random();
      const theta = u * 2.0 * Math.PI;
      const phi = Math.acos(2.0 * v - 1.0);
      const r = 160 + (Math.random() - 0.5) * 15;
      
      reactorPoints.push({
        x: r * Math.sin(phi) * Math.cos(theta),
        y: r * Math.sin(phi) * Math.sin(theta),
        z: r * Math.cos(phi)
      });
    }

    reactorCanvas.addEventListener("mousedown", (e) => {
      isDraggingReactor = true;
      startDragX = e.clientX;
      startDragY = e.clientY;
    });
    window.addEventListener("mouseup", () => { isDraggingReactor = false; });
    window.addEventListener("mousemove", (e) => {
      if (!isDraggingReactor) return;
      const dx = e.clientX - startDragX;
      const dy = e.clientY - startDragY;
      reactorAngleY += dx * 0.005;
      reactorAngleX += dy * 0.005;
      startDragX = e.clientX;
      startDragY = e.clientY;
    });
  }

  const renderHolographicReactor = () => {
    if (!reactorCtx || !GSE.viewportActive.reactor) return;
    reactorCtx.clearRect(0, 0, 640, 640);
    
    if (!isDraggingReactor) {
      reactorAngleY += 0.003;
      if (GSE.isIdle) reactorAngleY += 0.001;
    }

    const cosY = Math.cos(reactorAngleY);
    const sinY = Math.sin(reactorAngleY);
    const cosX = Math.cos(reactorAngleX);
    const sinX = Math.sin(reactorAngleX);

    const fov = 400;
    const cx = 320;
    const cy = 320;

    const rx = (GSE.mouse.x - window.innerWidth / 2) * 0.15;
    const ry = (GSE.mouse.y - window.innerHeight / 2) * 0.15;

    reactorCtx.fillStyle = "rgba(0, 242, 254, 0.85)";
    for (let i = 0; i < reactorPoints.length; i++) {
      const p = reactorPoints[i];
      let x = p.x;
      let y = p.y;
      let z = p.z;

      let x1 = x * cosY - z * sinY;
      let z1 = x * sinY + z * cosY;
      let y2 = y * cosX - z1 * sinX;
      let z2 = y * sinX + z1 * cosX;

      x1 += rx * (z2 / 200);
      y2 += ry * (z2 / 200);

      const d = fov / (fov + z2);
      const px = x1 * d + cx;
      const py = y2 * d + cy;

      if (px >= 0 && px <= 640 && py >= 0 && py <= 640) {
        const size = Math.max(1, (1.8 - z2 / 160) * 1.5);
        reactorCtx.beginPath();
        reactorCtx.arc(px, py, size, 0, Math.PI * 2);
        reactorCtx.fillStyle = z2 > 0 ? "rgba(0, 242, 254, 0.45)" : "rgba(0, 242, 254, 0.85)";
        reactorCtx.fill();
      }
    }
  };

  // --- Draggable 3D Apparel Configurator (System 8, 30) ---
  const apparelCanvas = document.getElementById("jersey-3d-canvas");
  let apparelCtx = null;
  let apparelAngle = 0;
  let isDraggingApparel = false;
  let startApparelX = 0;
  let apparelPoints = [];

  if (apparelCanvas) {
    apparelCanvas.width = 480;
    apparelCanvas.height = 400;
    apparelCtx = apparelCanvas.getContext("2d");

    for (let lat = -5; lat <= 5; lat++) {
      const y = lat * 28;
      const radius = 100 - (lat * lat) * 2;
      for (let lon = 0; lon < 20; lon++) {
        const theta = (lon / 20) * Math.PI * 2;
        apparelPoints.push({
          x: radius * Math.cos(theta),
          y: y,
          z: radius * Math.sin(theta),
          lon: lon,
          lat: lat
        });
      }
    }

    apparelCanvas.addEventListener("mousedown", (e) => {
      isDraggingApparel = true;
      startApparelX = e.clientX;
    });
    window.addEventListener("mouseup", () => { isDraggingApparel = false; });
    window.addEventListener("mousemove", (e) => {
      if (!isDraggingApparel) return;
      const dx = e.clientX - startApparelX;
      apparelAngle += dx * 0.008;
      startApparelX = e.clientX;
    });
  }

  const renderApparelConfigurator = () => {
    if (!apparelCtx || !GSE.viewportActive.apparel) return;
    apparelCtx.clearRect(0, 0, 480, 400);

    if (!isDraggingApparel) {
      apparelAngle += 0.004;
    }

    const cosA = Math.cos(apparelAngle);
    const sinA = Math.sin(apparelAngle);

    const fov = 350;
    const cx = 240;
    const cy = 200;

    apparelCtx.strokeStyle = currentJerseyHex || "#00f2fe";
    apparelCtx.lineWidth = 1.0;

    for (let i = 0; i < apparelPoints.length; i++) {
      const p = apparelPoints[i];
      let x = p.x;
      let y = p.y;
      let z = p.z;

      let rx = x * cosA - z * sinA;
      let rz = x * sinA + z * cosA;

      const d = fov / (fov + rz);
      const px = rx * d + cx;
      const py = y * d + cy;

      if (p.lon < 19) {
        const nextP = apparelPoints.find(pt => pt.lat === p.lat && pt.lon === p.lon + 1);
        if (nextP) {
          let n_rx = nextP.x * cosA - nextP.z * sinA;
          let n_rz = nextP.x * sinA + nextP.z * cosA;
          const nd = fov / (fov + n_rz);
          const npx = n_rx * nd + cx;
          const npy = nextP.y * nd + cy;
          
          apparelCtx.beginPath();
          apparelCtx.moveTo(px, py);
          apparelCtx.lineTo(npx, npy);
          apparelCtx.strokeStyle = rz > 0 ? "rgba(255, 255, 255, 0.08)" : `${currentJerseyHex}33`;
          apparelCtx.stroke();
        }
      }
    }
  };

  // --- Viewports scroll observers ---
  const setupViewportObservers = () => {
    const reactorSection = document.getElementById("reactor-centerpiece");
    const apparelSection = document.getElementById("athletes");

    if (reactorSection) {
      const o1 = new IntersectionObserver((entries) => {
        entries.forEach(e => { GSE.viewportActive.reactor = e.isIntersecting; });
      }, { threshold: 0.05 });
      o1.observe(reactorSection);
    }

    if (apparelSection) {
      const o2 = new IntersectionObserver((entries) => {
        entries.forEach(e => { GSE.viewportActive.apparel = e.isIntersecting; });
      }, { threshold: 0.05 });
      o2.observe(apparelSection);
    }
  };
  setupViewportObservers();

  // --- Global Scene Engine Loop ---
  const masterSceneEngineLoop = () => {
    GSE.mouse.lerpX += (GSE.mouse.x - GSE.mouse.lerpX) * 0.1;
    GSE.mouse.lerpY += (GSE.mouse.y - GSE.mouse.lerpY) * 0.1;

    // Magnetic Snapping system (System 5)
    let finalX = GSE.mouse.lerpX;
    let finalY = GSE.mouse.lerpY;

    if (cursorTarget) {
      const rect = cursorTarget.getBoundingClientRect();
      const targetCenterX = rect.left + rect.width / 2;
      const targetCenterY = rect.top + rect.height / 2;
      
      finalX += (targetCenterX - finalX) * 0.35;
      finalY += (targetCenterY - finalY) * 0.35;
    }

    const driftX = (GSE.mouse.lerpX - window.innerWidth / 2) * 0.04;
    const driftY = (GSE.mouse.lerpY - window.innerHeight / 2) * 0.04;
    const aur = document.getElementById("hero-aurora-bg");
    if (aur) {
      aur.style.transform = `translate3d(calc(-50% + ${driftX}px), calc(-50% + ${driftY}px), 0)`;
    }

    if (cursorGlow) {
      cursorGlow.style.transform = `translate3d(${finalX}px, ${finalY}px, 0) translate(-50%, -50%)`;
    }
    if (cursorDot) {
      cursorDot.style.transform = `translate3d(${finalX}px, ${finalY}px, 0) translate(-50%, -50%)`;
    }

    renderHolographicReactor();
    renderApparelConfigurator();

    if (GSE.active) {
      requestAnimationFrame(masterSceneEngineLoop);
    }
  };
  masterSceneEngineLoop();

  // --- eCommerce checkout logics & overlays ---
  let cart = [];
  let catalogueProducts = [];
  let currentProduct = null;
  let currentQty = 1;

  fetch("data/products.json")
    .then(res => res.json())
    .then(data => { catalogueProducts = data; })
    .catch(() => {
      catalogueProducts = [
        { "title": "Whey Protein Reactor", "img": "assets/product-protein.jpg", "tone": "Lean synthesis · 27g", "price": 5312, "tag": "Supplements" },
        { "title": "Velocity Runner V3", "img": "assets/product-shoe.jpg", "tone": "Carbon plate · 178g", "price": 18260, "tag": "Footwear" },
        { "title": "Pulse Smartwatch", "img": "assets/product-watch.jpg", "tone": "Titanium · 96h battery", "price": 39840, "tag": "Wearables" },
        { "title": "HydroCore Bottle", "img": "assets/product-hydration.jpg", "tone": "Vacuum steel · 750ml", "price": 3984, "tag": "Hydration" },
        { "title": "Compression Layer 02", "img": "assets/product-apparel.jpg", "tone": "AeroMesh · seamless", "price": 7885, "tag": "Apparel" }
      ];
    });
    
  window.addToCartAndOpen = (title) => {
    // Clean up title (handles HTML tags like tags or sub/sup scripts)
    const cleanTitle = title.replace(/<\/?[^>]+(>|$)/g, " ").replace(/\s+/g, " ").trim();
    
    // Find the product in catalogueProducts
    let p = catalogueProducts.find(item => {
      const cleanItemTitle = item.title.replace(/<\/?[^>]+(>|$)/g, " ").replace(/\s+/g, " ").trim();
      return cleanItemTitle.toLowerCase() === cleanTitle.toLowerCase();
    });
    
    // If not found by name, try fallback matching
    if (!p) {
      p = catalogueProducts.find(item => {
        const cleanItemTitle = item.title.replace(/<\/?[^>]+(>|$)/g, " ").replace(/\s+/g, " ").trim();
        return cleanItemTitle.toLowerCase().includes(cleanTitle.toLowerCase()) || cleanTitle.toLowerCase().includes(cleanItemTitle.toLowerCase());
      });
    }

    if (!p) return;

    const idx = cart.findIndex(it => it.product.title === p.title);
    if (idx > -1) {
      cart[idx].qty += 1;
    } else {
      cart.push({ product: p, qty: 1 });
    }

    updateCartDOM();
    window.openCart();
  };

  window.buyActiveHeroProduct = () => {
    const heroProduct = heroProducts[currentHeroIdx];
    if (!heroProduct) return;
    
    // Clean and extract name
    const cleanTitle = heroProduct.title.replace(/<\/?[^>]+(>|$)/g, " ").replace(/\s+/g, " ").trim();
    
    // Find the matching product in the catalogue
    let p = catalogueProducts.find(item => {
      const cleanCatTitle = item.title.toLowerCase();
      if (cleanTitle.toLowerCase().includes("creatine") && cleanCatTitle.includes("protein")) return true;
      if (cleanTitle.toLowerCase().includes("runner") && cleanCatTitle.includes("runner")) return true;
      if (cleanTitle.toLowerCase().includes("aeromesh") && cleanCatTitle.includes("apparel")) return true;
      if (cleanTitle.toLowerCase().includes("plasma") && cleanCatTitle.includes("bottle")) return true;
      if (cleanTitle.toLowerCase().includes("smart") && cleanCatTitle.includes("watch")) return true;
      return false;
    });

    if (!p) {
      p = catalogueProducts.find(item => cleanTitle.toLowerCase().includes(item.title.toLowerCase()) || item.title.toLowerCase().includes(cleanTitle.toLowerCase()));
    }

    if (!p) {
      p = catalogueProducts[0];
    }

    if (p) {
      window.addToCartAndOpen(p.title);
    }
  };

  window.openProductDetail = (title) => {
    const p = catalogueProducts.find(item => item.title === title);
    if (!p) return;
    currentProduct = p;
    currentQty = 1;

    const img = document.getElementById("modal-product-img");
    const mTitle = document.getElementById("modal-product-title");
    const tone = document.getElementById("modal-product-tone");
    const tag = document.getElementById("modal-product-tag");
    const qtyVal = document.getElementById("modal-qty");
    const priceVal = document.getElementById("modal-product-price");

    if (img) img.src = p.img;
    if (mTitle) mTitle.textContent = p.title;
    if (tone) tone.textContent = p.tone;
    if (tag) tag.textContent = p.tag;
    if (qtyVal) qtyVal.textContent = currentQty;
    if (priceVal) priceVal.textContent = `₹${p.price.toLocaleString('en-IN')}`;

    const modal = document.getElementById("product-detail-modal");
    if (modal) modal.classList.add("active");
  };

  window.updateQty = (change) => {
    currentQty = Math.max(1, currentQty + change);
    const q = document.getElementById("modal-qty");
    if (q) q.textContent = currentQty;

    if (currentProduct) {
      const priceVal = document.getElementById("modal-product-price");
      if (priceVal) {
        priceVal.textContent = `₹${(currentProduct.price * currentQty).toLocaleString('en-IN')}`;
      }
    }
  };

  const updateCartDOM = () => {
    const container = document.getElementById("cart-items-container");
    if (!container) return;
    container.innerHTML = "";

    let totalItems = 0;
    let totalPrice = 0;

    cart.forEach((item, index) => {
      totalItems += item.qty;
      const sub = item.product.price * item.qty;
      totalPrice += sub;

      const div = document.createElement("div");
      div.className = "flex justify-between items-center glass p-3 rounded-2xl gap-3";
      div.innerHTML = `
        <img src="${item.product.img}" alt="${item.product.title}" class="w-12 h-12 object-cover rounded-xl border border-border" />
        <div class="flex-1 min-w-0" style="display: flex; flex-direction: column;">
          <span class="font-display text-sm truncate uppercase">${item.product.title}</span>
          <span class="text-xs text-muted-foreground">Qty: ${item.qty} · ₹${item.product.price.toLocaleString('en-IN')}</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="font-display text-sm">₹${sub.toLocaleString('en-IN')}</span>
          <button onclick="removeFromCart(${index})" class="text-xs text-coral hover:text-orange cursor-none">&times;</button>
        </div>
      `;
      container.appendChild(div);
    });

    if (cart.length === 0) {
      container.innerHTML = `<div class="text-center text-muted-foreground text-xs py-8">Your bag is empty.</div>`;
    }

    const bagBtn = document.getElementById("bag-btn");
    if (bagBtn) bagBtn.innerHTML = `<span class="btn-magnetic-bg"></span>Bag · ${totalItems}`;

    const cartTotal = document.getElementById("cart-total");
    if (cartTotal) cartTotal.textContent = `₹${totalPrice.toLocaleString('en-IN')}`;

    const checkoutTotal = document.getElementById("checkout-total");
    if (checkoutTotal) checkoutTotal.textContent = `₹${totalPrice.toLocaleString('en-IN')}`;
  };

  window.removeFromCart = (idx) => {
    cart.splice(idx, 1);
    updateCartDOM();
  };

  const addBtn = document.getElementById("add-to-cart-btn");
  if (addBtn) {
    addBtn.addEventListener("click", () => {
      if (!currentProduct) return;
      const idx = cart.findIndex(it => it.product.title === currentProduct.title);
      if (idx > -1) cart[idx].qty += currentQty;
      else cart.push({ product: currentProduct, qty: currentQty });

      window.closeProductDetail();
      updateCartDOM();
      
      const drawer = document.getElementById("cart-drawer-overlay");
      if (drawer) drawer.classList.add("active");
    });
  }

  window.openCart = () => {
    const drawer = document.getElementById("cart-drawer-overlay");
    if (drawer) drawer.classList.add("active");
  };

  window.openCheckout = () => {
    if (cart.length === 0) {
      alert("Please add items to proceed.");
      return;
    }
    window.closeCart();
    const modal = document.getElementById("checkout-modal");
    if (modal) modal.classList.add("active");
  };

  window.handlePlaceOrder = (e) => {
    e.preventDefault();
    window.closeCheckout();
    cart = [];
    updateCartDOM();
    const modal = document.getElementById("success-modal");
    if (modal) modal.classList.add("active");
  };

  window.closeCart = () => {
    const overlay = document.getElementById("cart-drawer-overlay");
    if (overlay) overlay.classList.remove("active");
  };

  window.closeProductDetail = () => {
    const modal = document.getElementById("product-detail-modal");
    if (modal) modal.classList.remove("active");
  };

  window.closeCheckout = () => {
    const modal = document.getElementById("checkout-modal");
    if (modal) modal.classList.remove("active");
  };

  window.closeSuccess = () => {
    const modal = document.getElementById("success-modal");
    if (modal) modal.classList.remove("active");
  };

  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      window.closeCart();
      window.closeProductDetail();
      window.closeCheckout();
      window.closeSuccess();
    }
  });

  // --- Dynamic Configure Stack Swaps (System 26) ---
  const subtotalVal = document.getElementById("subtotal-value");
  const moduleCount = document.getElementById("module-count");
  const selectedList = document.getElementById("selected-modules-list");
  const stackButtons = document.querySelectorAll(".stack-module-btn");

  let selectedModules = ["ignite", "recover"];

  const updateConfiguratorDOM = () => {
    if (!selectedList) return;
    let subtotal = 0;
    selectedList.innerHTML = "";

    stackButtons.forEach(btn => {
      const id = btn.getAttribute("data-id");
      const price = parseInt(btn.getAttribute("data-price"));
      const label = btn.getAttribute("data-label");
      const dot = btn.querySelector(".indicator-dot");
      const ring = btn.querySelector(".indicator-ring");

      if (selectedModules.includes(id)) {
        btn.setAttribute("aria-pressed", "true");
        btn.classList.add("shadow-glow-blue");
        btn.style.borderColor = "var(--electric)";
        if (dot) dot.classList.remove("hidden");
        if (ring) ring.classList.add("animate-pulse-ring");
        subtotal += price;

        const li = document.createElement("li");
        li.className = "flex justify-between";
        li.innerHTML = `<span>${label}</span><span class="text-muted-foreground">₹${price.toLocaleString('en-IN')}</span>`;
        selectedList.appendChild(li);
      } else {
        btn.setAttribute("aria-pressed", "false");
        btn.classList.remove("shadow-glow-blue");
        btn.style.borderColor = "";
        if (dot) dot.classList.add("hidden");
        if (ring) ring.classList.remove("animate-pulse-ring");
      }
    });

    if (selectedModules.length === 0) {
      selectedList.innerHTML = `<li class="text-muted-foreground">Select modules to begin.</li>`;
    }

    if (subtotalVal) subtotalVal.textContent = `₹${subtotal.toLocaleString('en-IN')}`;
    if (moduleCount) moduleCount.innerHTML = `${selectedModules.length}<span class="text-xl text-muted-foreground"> modules</span>`;
  };

  stackButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.getAttribute("data-id");
      if (selectedModules.includes(id)) {
        selectedModules = selectedModules.filter(x => x !== id);
      } else {
        selectedModules.push(id);
      }
      updateConfiguratorDOM();
    });
  });

  updateConfiguratorDOM();

  // --- Scroll elements observer ---
  const revealElements = document.querySelectorAll(".reveal-item");
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add("visible");
        revealObserver.unobserve(e.target);
      }
    });
  }, { threshold: 0.01, rootMargin: "0px 0px 200px 0px" });
  revealElements.forEach(el => revealObserver.observe(el));

  // Run initial check to force visibility on load for top-level elements
  setTimeout(() => {
    revealElements.forEach(el => {
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight + 100) {
        el.classList.add("visible");
      }
    });
  }, 100);

  // --- Pinned Anatomy horizontal track (System 10) ---
  const anatomySection = document.getElementById("anatomy-section");
  const horizontalTrack = document.getElementById("anatomy-horizontal-track");
  const scrollProgressRail = document.getElementById("scroll-progress-rail");

  if (anatomySection && horizontalTrack && scrollProgressRail) {
    let scrollScheduled = false;
    window.addEventListener("scroll", () => {
      if (scrollScheduled) return;
      scrollScheduled = true;
      requestAnimationFrame(() => {
        const rect = anatomySection.getBoundingClientRect();
        const sectionHeight = rect.height;
        const viewportHeight = window.innerHeight;
        const scrollMax = sectionHeight - viewportHeight;
        const scrolled = -rect.top;

        const percent = Math.max(0, Math.min(1, scrolled / scrollMax));
        const totalPanels = horizontalTrack.children.length;
        const transformPct = percent * (totalPanels - 1) * 100;
        
        horizontalTrack.style.transform = `translate3d(-${transformPct}vw, 0, 0)`;
        scrollProgressRail.style.width = `${percent * 100}%`;
        scrollScheduled = false;
      });
    });
  }

  // --- Story chapters timeline (System 25) ---
  const scrollStory = document.getElementById("scroll-story-section");
  const chapters = document.querySelectorAll(".story-chapter-visual");
  if (scrollStory && chapters.length > 0) {
    const scrollStoryProgressRail = document.getElementById("scroll-story-progress-rail");
    let storyScheduled = false;
    window.addEventListener("scroll", () => {
      if (storyScheduled) return;
      storyScheduled = true;
      requestAnimationFrame(() => {
        const rect = scrollStory.getBoundingClientRect();
        const scrolled = -rect.top;
        const scrollMax = rect.height - window.innerHeight;

        const percent = Math.max(0, Math.min(1, scrolled / scrollMax));
        if (scrollStoryProgressRail) {
          scrollStoryProgressRail.style.width = `${percent * 100}%`;
        }

        if (percent < 0.33) {
          chapters[0].style.opacity = "1";
          chapters[1].style.opacity = "0";
          chapters[2].style.opacity = "0";
        } else if (percent >= 0.33 && percent < 0.66) {
          chapters[0].style.opacity = "0";
          chapters[1].style.opacity = "1";
          chapters[2].style.opacity = "0";
        } else {
          chapters[0].style.opacity = "0";
          chapters[1].style.opacity = "0";
          chapters[2].style.opacity = "1";
        }
        storyScheduled = false;
      });
    });
  }

  // --- Magnetic components ---
  const magnetButtons = document.querySelectorAll("[data-magnetic]");
  magnetButtons.forEach(btn => {
    btn.addEventListener("mousemove", (e) => {
      const rect = btn.getBoundingClientRect();
      const x = (e.clientX - (rect.left + rect.width / 2)) * 0.35;
      const y = (e.clientY - (rect.top + rect.height / 2)) * 0.45;
      btn.style.transform = `translate3d(${x}px, ${y}px, 0)`;
    });

    btn.addEventListener("mouseleave", () => {
      btn.style.transform = "translate3d(0, 0, 0)";
    });
  });
};

// Booting orchestrations
if (document.readyState !== "loading") {
  init();
} else {
  document.addEventListener("DOMContentLoaded", init);
}
