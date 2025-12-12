document.querySelectorAll(".card").forEach((card) => {
  card.addEventListener("mouseenter", () => {
    card.querySelector(".card-actions").classList.remove("hidden");
    card.querySelector(".card-actions").classList.add("visible");
  });
  card.addEventListener("mouseleave", () => {
    card.querySelector(".card-actions").classList.remove("visible");
    card.querySelector(".card-actions").classList.add("hidden");
  })
});
