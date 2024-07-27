/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/views/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: "Poppins",
      },
      colors: {
        black: "#313131",
      },
    },
  },
  plugins: [],
};
