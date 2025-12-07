document.querySelector('.logo').addEventListener('click', () => {
  window.location.href = "/";
});

function auth(login) {
  window.location.href = `pages/${login ? "login" : "logout"}.php`;
}

function search() {
  const form_search = document.querySelector("#search-form");
  form_search.classList.toggle("visible");
  form_search.classList.toggle("hidden");
}
