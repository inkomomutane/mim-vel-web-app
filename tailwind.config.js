const plugin = require("tailwindcss/plugin");
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            boxShadow: {
                DEFAULT:
                    "0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.02)",
                md: "0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.02)",
                lg: "0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)",
                xl: "0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.01)",
            },
            outline: {
                orange: "2px solid #fc6700",
            },
            fontFamily: {
                body: [

                    "Jost",
                    "Open Sans",
                    "Noto Sans",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                sans: [
                    "Jost",
                    "Open Sans",
                    "Noto Sans",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            fontSize: {
                xs: ["0.75rem", { lineHeight: "1.5" }],
                sm: ["0.875rem", { lineHeight: "1.5715" }],
                base: ["1rem", { lineHeight: "1.5", letterSpacing: "-0.01em" }],
                lg: [
                    "1.125rem",
                    { lineHeight: "1.5", letterSpacing: "-0.01em" },
                ],
                xl: [
                    "1.25rem",
                    { lineHeight: "1.5", letterSpacing: "-0.01em" },
                ],
                "2xl": [
                    "1.5rem",
                    { lineHeight: "1.33", letterSpacing: "-0.01em" },
                ],
                "3xl": [
                    "1.88rem",
                    { lineHeight: "1.33", letterSpacing: "-0.01em" },
                ],
                "4xl": [
                    "2.25rem",
                    { lineHeight: "1.25", letterSpacing: "-0.02em" },
                ],
                "5xl": [
                    "3rem",
                    { lineHeight: "1.25", letterSpacing: "-0.02em" },
                ],
                "6xl": [
                    "3.75rem",
                    { lineHeight: "1.2", letterSpacing: "-0.02em" },
                ],
            },
            screens: {
                xs: "480px",
            },
            borderWidth: {
                3: "3px",
            },
            minWidth: {
                36: "9rem",
                44: "11rem",
                56: "14rem",
                60: "15rem",
                72: "18rem",
                80: "20rem",
            },
            maxWidth: {
                "8xl": "88rem",
                "9xl": "96rem",
            },
            zIndex: {
                60: "60",
            },
            colors:{
                primary: {"50":"#fff7ed","100":"#ffedd5","200":"#fed7aa","300":"#fdba74","400":"#fb923c","500":"#f97316","600":"#ea580c","700":"#c2410c","800":"#9a3412","900":"#7c2d12"},

            }
        },
    },
    plugins: [
        // eslint-disable-next-line global-require
        require("@tailwindcss/forms"),
        require('@tailwindcss/typography'),
        require("flowbite/plugin"),
        require('tailwind-scrollbar'),
        // require('@tailwindcss/line-clamp'),
        // add custom variant for expanding sidebar
        plugin(({ addVariant, e }) => {
            addVariant("sidebar-expanded", ({ modifySelectors, separator }) => {
                modifySelectors(
                    ({ className }) =>
                        `.sidebar-expanded .${e(
                            `sidebar-expanded${separator}${className}`
                        )}`
                );
            });
        }),
    ],
};
