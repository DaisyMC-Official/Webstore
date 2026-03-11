<?php ob_start(); $b = $GLOBALS['base_url'] ?? ''; ?>
<link rel="stylesheet" href="<?php echo htmlspecialchars($b, ENT_QUOTES, 'UTF-8'); ?>/include/components/header/HeaderStyle.css">
<div class="server-left">
    <img src="https://i.postimg.cc/cH0Rd9jv/Daisy-MCLogo270.png" class="server-logo">
</div>

<div class="server-center" id="copy-ip">

    <div class="play-button">▶︎</div>

    <div class="server-info">
        <div class="server-ip">play.daisymc.net</div>
        <div class="server-players">
            <span class="player-number" id="player-count"></span> players online
        </div>
    </div>

</div>

<div class="server-right">

    <div class="server-icons">
        <a href="https://discord.gg/Shub57r8wz" class="icon-square" target="_blank" rel="noopener noreferrer" aria-label="Discord">
            <i class="fa-brands fa-discord"></i>
        </a>
        <a href="https://wiki.daisymc.net/" class="icon-square" target="_blank" rel="noopener noreferrer" aria-label="Website">
            <i class="fa-solid fa-globe"></i>
        </a>
    </div>

    <div class="server-buttons">
        <a href="https://discord.gg/Shub57r8wz" class="pill-button" target="_blank" rel="noopener noreferrer">join</a>
        <a href="https://wiki.daisymc.net/" class="pill-button" target="_blank" rel="noopener noreferrer">view</a>
    </div>

</div>
<?php return ob_get_clean(); ?>