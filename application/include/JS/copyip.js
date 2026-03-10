document.getElementById("copy-ip").addEventListener("click", function() {
    navigator.clipboard.writeText("play.daisymc.net");

    const popup = document.getElementById("copy-popup");

    popup.classList.add("show");

    setTimeout(function() {
        popup.classList.remove("show");
    }, 2000);
});