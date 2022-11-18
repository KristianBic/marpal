function scrollFunction() {
  let e = document.getElementById("sortiment");
  e.scrollIntoView({
    block: "start",
    behavior: "smooth",
    inline: "nearest",
  });
}
