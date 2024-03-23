/*jshint esversion: 6 */
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./storage/framework/views/*.php",
    ],
    theme: {
        screens: {
            "xs": "340px",
            // => @media (min-width: 320px) { ... }

            "sm": "640px",
            // => @media (min-width: 640px) { ... }

            "md": "768px",
            // => @media (min-width: 768px) { ... }

            "lg": "1024px",
            // => @media (min-width: 1024px) { ... }

            "xl": "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: "#93c5fd",
                    DEFAULT: "#60a5fa",
                    dark: "#3b82f6"
                },
                neutral: {
                    light: "#f9fafb",
                    DEFAULT: "#f3f4f6",
                    dark: "#e5e7eb"
                }
            },
            transitionProperty: {
                "height": "height",
                "spacing": "margin, padding",
            }
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("flowbite/plugin"),
    ],
};
