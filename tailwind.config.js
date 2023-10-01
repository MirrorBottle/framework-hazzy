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
        "secondary": "#375287",
        "accent": "#4568ac",
        "neutral": "#000000",
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