const defaultTheme = require('tailwindcss/defaultTheme');
console.log('test');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
             'login-image': "url('../../public/css/top.jpg')",
            })
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
