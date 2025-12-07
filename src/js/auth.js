let showPassword = false;
const test = document.querySelector('img');
const pass_bt = document.querySelector('#pass-btn');
pass_bt.addEventListener('click', () => {
  showPassword = !showPassword;
  document.querySelector('#pass-inp').type = showPassword ? "text" : "password";
  pass_bt.src = showPassword ? "../res/icons/eye.png" : "../res/icons/eye-off.png";
  pass_bt.alt = showPassword ? "eye" : "eye-off";
});
