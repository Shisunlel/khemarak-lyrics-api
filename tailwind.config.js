const defaultTheme = require("tailwindcss/defaultTheme");

const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            indigo: colors.indigo,
            yellow: colors.yellow,
            blue: colors.blue,
            sky: colors.sky,
            violet: colors.violet,
            purple: colors.purple,
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
