let showPassword = false;
const test = document.querySelector('img');
const pass_bt = document.querySelector('#pass-btn');
pass_bt.addEventListener('click', () => {
  showPassword = !showPassword;
  document.querySelector('#pass-inp').type = showPassword ? "text" : "password";
  pass_bt.src = showPassword ? "#" : "#";
  pass_bt.alt = showPassword ? "eye" : "eye-off";
});
