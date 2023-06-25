window.addEventListener('load',() => {
  const element = document.getElementById('error');
  const svgName = element.getAttribute('data-image');
  element?.setAttribute('src',(new URL('../errors/svgs/' + svgName, import.meta.url).href))
});
