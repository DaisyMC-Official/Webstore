/**
 * Show a toast message in the bottom-right corner.
 * @param {string} message - Text to display (plain text; will be escaped).
 * @param {number} [durationMs=6000] - How long the toast stays visible.
 * @param {boolean} [isError=false] - If true, uses red error styling.
 */
function showToast(message, durationMs = 6000, isError = false) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'toast' + (isError ? ' toast--error' : '');
    toast.setAttribute('role', 'status');
    toast.setAttribute('aria-live', isError ? 'assertive' : 'polite');

    const text = document.createTextNode(message);
    toast.appendChild(text);

    const progress = document.createElement('div');
    progress.className = 'toast-progress';
    progress.style.animationDuration = durationMs + 'ms';
    toast.appendChild(progress);

    container.appendChild(toast);

    const removeToast = () => {
        toast.classList.add('is-exiting');
        toast.addEventListener('animationend', () => toast.remove(), { once: true });
    };

    const timeoutId = setTimeout(removeToast, durationMs);

    toast.addEventListener('click', () => {
        clearTimeout(timeoutId);
        removeToast();
    });
}
