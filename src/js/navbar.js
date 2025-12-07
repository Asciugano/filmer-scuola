document.querySelector('.logo').addEventListener('click', () => {
  window.location.href = "/";
});

function auth(login) {
  window.location.href = `pages/${login ? "login" : "logout"}.php`;
}

function search() {
  const search_form = document.querySelector("#search-form");
  if (search_form.classList.contains("hidden"))
    search_form.classList.remove("hidden")
  else
    search_form.classList.add("hidden")
}
