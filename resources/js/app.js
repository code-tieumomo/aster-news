import './bootstrap';

// Sidebar
const sidebarToggle = document.querySelector('#sidebar-toggle');
if (sidebarToggle) {
    sidebarToggle.addEventListener('click', () => {
        document.querySelector('aside').classList.toggle('showing');
    });
}

const sidebarOverlay = document.querySelector('#sidebar-overlay');
if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', () => {
        document.querySelector('aside').classList.toggle('showing');
    });
}

const commentsToggle = document.querySelector('#comments-toggle');
const comments = document.querySelector('#comments');
if (commentsToggle) {
    commentsToggle.addEventListener("click", () => {
        if (comments.classList.contains('hidden')) {
            comments.classList.remove('hidden');
            commentsToggle.querySelector('svg').classList.add('rotate-180');
        } else {
            comments.classList.add('hidden');
            commentsToggle.querySelector('svg').classList.remove('rotate-180');
        }
    });
}
