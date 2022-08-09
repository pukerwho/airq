module.exports = {
  mode: "jit",
  content: ["./**/*.php", "./source/**/*.js"],
  safelist: [
    "bg-yellow-100",
    "text-3xl",
    "lg:text-4xl",
    "bg-indigo-100",
    "bg-yellow-100",
    "bg-green-100",
    "bg-red-100",
    "bg-blue-100",
    "bg-purple-100",
    "bg-pink-100",
  ],
  // purge: {
  //   enabled: true,
  //   content: ["./source/css/tailwind.css", "./**/*.php"],
  // },
  darkMode: "class",
  theme: {
    zIndex: {
      1: 1,
      2: 2,
      10: 10,
      11: 11,
    },
    listStyleType: {
      auto: "auto",
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
    },
    extend: {
      lineHeight: {
        12: "3rem",
        16: "4rem",
      },
      colors: {
        "dark-md": "#2a2c31",
        "dark-lg": "#222529",
        "dark-xl": "#1b1e21",
        "custom-gray": "#eeeeee",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require("@tailwindcss/typography")],
};
