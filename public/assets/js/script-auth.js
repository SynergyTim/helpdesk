let pathname = window.location.pathname;
let btnLoading = document.querySelector(".loading");
let form = document.getElementsByTagName("form")[0];

switch (pathname) {
    case "/login":
        let icon = document.querySelector(".icon");
        let btnLogin = document.querySelector(".login");
        let containerIcon = document.querySelector(".containerIcon");
        let password = document.querySelector(".password");

        form.addEventListener("submit", function () {
            btnLogin.classList.toggle("d-none");
            btnLoading.classList.toggle("d-block");
        });

        containerIcon.addEventListener("click", function () {
            icon.classList.toggle("bi-eye-slash-fill");
            icon.classList.toggle("bi-eye-fill");

            if (password.type === "password") {
                password.type = "text";
            } else if (password.type === "text") {
                password.type = "password";
            }
        });
        break;

    default:
        console.log("Invalid");
        break;
}
