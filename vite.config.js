import { defineConfig } from 'vite';

export default defineConfig({
  base: '/assets/builds/',
  build: {
    outDir: 'assets/builds',
    emptyOutDir: true,
    rollupOptions: {
      input: 'src/index.js',
      output: {
        entryFileNames: 'main.js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name && assetInfo.name.endsWith('.css')) {
            return 'main.css';
          }
          return 'images/[name][extname]';
        },
      },
    },
  },
});
