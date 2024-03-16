/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

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
        extend: {
            fontFamily: {
                'sans': ['"SF UI Display"', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        {
            pattern: /col-span-(2|3|4|5|6|7|8|9|10|11|12)/,
            variants: ['sm'],
        },
        {
            pattern: /w-(28|32|36|40|44|48|52|56|60|64|72|80|96)/
        },
    ],

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"), 
        require("preline/plugin"),
    ]
};