import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                text: "#d6e3f8",
                background: "#050f1e",
                primary: "#7ea6e9",
                secondary: {
                    200: "#e6b8a8", // Adicione sua cor aqui
                    DEFAULT: "#93391a",
                },
                tertiary: "#08172d",
                accent: "#c2dc36",
            },

            fontSize: {
                h1: "5.61rem",
                h2: "4.209rem",
                h3: "3.157rem",
                h4: "2.369rem",
                h5: "1.777rem",
                h6: "1.333rem",
                p: "1rem",
                small: "0.75rem",

                sm: "0.75rem",
                md: "1rem",
                lg: "1.333rem",
                xl: "1.777rem",
                "2xl": "2.369rem",
                "3xl": "3.157rem",
                "4xl": "4.209rem",
                "5xl": "5.61rem",
            },
        },
    },

    plugins: [forms],
};
