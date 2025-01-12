/** @type {import('tailwindcss').Config} */
export default {
    daisyui: {
        themes: [
            {
                avotheme: {
                    primary: "#277FA0", // --avo-blue
                    "primary-focus": "#1F6480", // --avo-blue-hover
                    "primary-content": "#F8F6F5", // --avo-text-color

                    secondary: "#73BFDD", // --avo-blue-lite

                    accent: "#F9B642", // --avo-yellow

                    neutral: "#F8F6F5", // --avo-white
                    "neutral-focus": "#F0F0F0", // --avo-white-hover
                    "neutral-content": "#222222", // --avo-black

                    "base-100": "#F8F6F5", // --avo-white
                    "base-200": "#E7E3E3", // --avo-gray
                    "base-300": "#DBDBDB", // --avo-dark-gray

                    info: "#277FA0", // --avo-blue
                    success: "#27A089", // --avo-green
                    warning: "#F9B642", // --avo-yellow
                    error: "#EF6459", // --avo-red

                    "info-content": "#ffffff", // optional text color for info elements
                    "success-content": "#ffffff", // optional text color for success elements
                    "warning-content": "#000000", // optional text color for warning elements
                    "error-content": "#ffffff", // optional text color for error elements

                    "primary-hover": "#1F6480", // --avo-blue-hover
                    "secondary-hover": "#F9B642", // --avo-yellow-hover
                    "accent-hover": "#EC4335", // --avo-red-hover
                    "neutral-hover": "#1F1F1F", // --avo-black-hover
                },
            },
        ],
    },

    content: [
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                avo: {
                    blue: "rgb(var(--avo-blue))",
                    "blue-hover": "rgb(var(--avo-blue-hover))",
                    "blue-lite": "rgb(var(--avo-blue-lite))",
                    white: "rgb(var(--avo-white))",
                    "white-hover": "rgb(var(--avo-white-hover))",
                    black: "rgb(var(--avo-black))",
                    "black-hover": "rgb(var(--avo-black-hover))",
                    yellow: "rgb(var(--avo-yellow))",
                    "yellow-hover": "rgb(var(--avo-yellow-hover))",
                    red: "rgb(var(--avo-red))",
                    "red-hover": "rgb(var(--avo-red-hover))",
                    green: "rgb(var(--avo-green))",
                    gray: "rgb(var(--avo-gray))",
                    "dark-gray": "rgb(var(--avo-dark-gray))",
                },
            },
        },
    },

    // Add daisyUI
    plugins: [require("daisyui")],
};
