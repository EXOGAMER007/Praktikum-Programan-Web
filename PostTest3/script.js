const formNama = document.querySelector(".kenalan");
const inputNama = document.querySelector(".nama2");
const namanya = document.querySelector(".namanya");
const mode = document.querySelector(".mode");
const mode2 = document.querySelector(".nav-item");
let isLight = false;

console.log(mode2);

mode.addEventListener("click", function () {
  document.body.classList.toggle("darkmode");
  isLight = !isLight;
  if (isLight) {
    document.body.style.backgroundImage = "url(aset/HuTao2.png)"; //dark mode
  } else {
    document.body.style.backgroundImage = "url(aset/Light2.jpg)"; //Light mode
  }
});

formNama.addEventListener("submit", function (e) {
  e.preventDefault(); //mencegah menampilkan data2 di url
  console.log(inputNama.value);
  const username = inputNama.value;
  localStorage.setItem("username", username); //menyimpan data2 di local storage
  inputNama.value = ""; //
  alert("Selamat datang " + username); //menampilkan pop up
  namanya.textContent = `Hi ${username}`; //menampilkan data2 di halaman
});

if (localStorage.getItem("username")) {
  const username = localStorage.getItem("username");
  namanya.textContent = `Hi ${username}`; //menampilkan data2 di halaman
  alert("Selamat datang " + username);
}
