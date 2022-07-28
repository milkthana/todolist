import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { createVuePlugin as vue } from "vite-plugin-vue2";

const path = require("path");

export default defineConfig({
    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        
    ],
    resolve: {
        extensions: [
          ".mjs",
          ".js",
          ".ts",
          ".jsx",
          ".tsx",
          ".json",
          ".vue",
          ".scss",
        ],
        alias: {
          "@": path.resolve(__dirname, "./src"),
          json2csv: "json2csv/dist/json2csv.umd.js",
          '~bootstrap': 'bootstrap'
        },
      },
      css: {
        preprocessorOptions: {
          scss: {
            //  additionalData: `@import "@/scss/app.scss";`,
            additionalData: `@import "src/scss/_variables.scss";`,
          },
        },
      },
      server: {
        port: 8000,
      },
});
