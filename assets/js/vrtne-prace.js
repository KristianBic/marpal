function scrollFunction() {
  const yOffset = -150;
  const element = document.getElementById("motto");
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

  window.scrollTo({ top: y, behavior: "smooth" });
}
