/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/views/**/*.blade.php",
        "./resources/vendor/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/quanph/simple-comments/resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#2F9FF8",
                textPrimary: "#072D4B",
                textSecondary: "#A0AEC0",
                bgPrimary: "#F4F9F8"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ]
}

