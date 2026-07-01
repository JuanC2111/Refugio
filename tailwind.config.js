import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                display: ['Fraunces', 'serif'],
            },
            colors: {
                bosque: {
                    50: '#EAF3DE',
                    100: '#C0DD97',
                    200: '#97C459',
                    400: '#639922',
                    600: '#3B6D11',
                    800: '#27500A',
                    900: '#173404',
                },
                coral: {
                    50: '#FAECE7',
                    100: '#F5C4B3',
                    200: '#F0997B',
                    400: '#D85A30',
                    600: '#993C1D',
                    800: '#712B13',
                    900: '#4A1B0C',
                },
                crema: '#FAF7F0',
            },
        },
    },
    plugins: [forms],
};
