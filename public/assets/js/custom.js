document.addEventListener('DOMContentLoaded', (event) => {
  const followerOuter = document.createElement('div');
  const followerInner = document.createElement('div');

  followerOuter.classList.add('cursor-follower-outer');
  followerInner.classList.add('cursor-follower-inner');

  document.body.appendChild(followerOuter);
  document.body.appendChild(followerInner);

  let lastX = 0;
  let lastY = 0;
  let innerX = 0;
  let innerY = 0;
  let moveX = 0;
  let moveY = 0;

  document.addEventListener('mousemove', e => {
    const dx = e.clientX - lastX;
    const dy = e.clientY - lastY;

    // Calcula a direção do movimento do mouse
    const angle = Math.atan2(dy, dx);

    // Calcula a distância para o movimento baseada na velocidade do mouse
    const distance = Math.min(Math.sqrt(dx * dx + dy * dy), 20);

    // Atualiza o movimento do ponto central
    moveX = distance * Math.cos(angle);
    moveY = distance * Math.sin(angle);

    // Posiciona o ponto central
    innerX = e.clientX + moveX;
    innerY = e.clientY + moveY;

    // Atualiza a posição do ponto central e do círculo externo
    followerInner.style.left = `${innerX}px`;
    followerInner.style.top = `${innerY}px`;

    followerOuter.style.left = `${e.clientX}px`;
    followerOuter.style.top = `${e.clientY}px`;

    lastX = e.clientX;
    lastY = e.clientY;
  });

  const hoverElements = document.querySelectorAll('.element-hover');

  hoverElements.forEach(el => {
    el.addEventListener('mouseenter', () => followerOuter.classList.add('active'));
    el.addEventListener('mouseleave', () => followerOuter.classList.remove('active'));
  });
});