/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: ["light", {
      hazzy: {
        "primary": "#19263f",
        "secondary": "#283c63",
        "accent": "#1970C3",
        "neutral": "#151417",
        "base-100": "#FFFFFF",
        "info": "#1e40af",
        "success": "#15803d",
        "warning": "#fbbf24",
        "error": "#f43f5e",
      },
    },],
  },
  plugins: [require("daisyui")],
}
