const container = document.querySelector(".flower-particles");

const PETAL_COUNT = 40;

for (let i = 0; i < PETAL_COUNT; i++) {

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

  container.appendChild(petal);

}
