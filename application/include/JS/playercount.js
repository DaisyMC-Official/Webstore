const playerCount = document.getElementById("player-count");

async function updatePlayers() {

    try {
        const response = await fetch("https://api.mcsrvstat.us/2/play.daisymc.net");
        const data = await response.json();

        if (data.online) {
            playerCount.textContent = `${data.players.online}`;
        } else {
            playerCount.textContent = "0";
        }

    } catch (error) {
        playerCount.textContent = "0";
    }
}

updatePlayers();

/* refresh every 30 seconds */
setInterval(updatePlayers, 30000);