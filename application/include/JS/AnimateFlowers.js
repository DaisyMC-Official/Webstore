const container = document.querySelector(".flower-particles");

const PETAL_COUNT = 60;

// spread spawning over 2.2 seconds
const SPAWN_DURATION_MS = 2200;
const staggerDelay = SPAWN_DURATION_MS / PETAL_COUNT;

function spawnPetal(index) {
  const petal = document.createElement("div");
  petal.className = "petal";

  const startX = Math.random() * window.innerWidth;
  const startY = Math.random() * window.innerHeight;

  petal.style.left = startX + "px";
  petal.style.top = startY + "px";

  petal.style.animationDuration = (18 + Math.random() * 20) + "s";
  petal.style.animationDelay = (-Math.random() * 30) + "s";

  const scale = 0.6 + Math.random() * 0.8;
  petal.style.transform = `scale(${scale})`;

  petal.style.opacity = "0";
  petal.style.transition = "opacity 0.6s ease-out";
  container.appendChild(petal);

  requestAnimationFrame(() => {
    petal.style.opacity = "1";
  });
}

for (let i = 0; i < PETAL_COUNT; i++) {
  setTimeout(() => spawnPetal(i), i * staggerDelay);
}
