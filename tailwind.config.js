import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                red: "#e51236",
                black: "#121212",
                blue: "#001a52",
                grey: {
                    10: "#f6f8f8",
                    20: "#e4e9eb",
                    30: "#c1c9cd",
                    40: "#848f94",
                    50: "#535c5f",
                },
            },
            fontSize: {
                "title-1": ["96px", { lineHeight: "1.1" }],
                "title-1-light": ["96px", { lineHeight: "1.1" }],
                "title-2": ["64px", { lineHeight: "1.1" }],
                "title-3": ["48px", { lineHeight: "1.1" }],
                "title-4": ["32px", { lineHeight: "1.2" }],
                "title-5": ["24px", { lineHeight: "1.2" }],
                body: ["16px", { lineHeight: "1.5" }],
                link: ["16px", { lineHeight: "1.5" }],
                button: ["16px", { lineHeight: "1.5" }],
                subtitle: ["16px", { lineHeight: "1.5" }],
            },
            fontWeight: {
                extralight: "200",
                light: "300",
                regular: "400",
                medium: "500",
                semibold: "600",
                bold: "700",
            },
        },
    },

    plugins: [forms],
};
