/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue", 
        "./node_modules/preline/dist/*.js",
    ],

    theme: {
        extend: {},
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"), 
        require("preline/plugin"),
    ]
};