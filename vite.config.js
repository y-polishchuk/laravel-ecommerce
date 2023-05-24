import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/admin-panel.js',
      ],
      refresh: [
        ...refreshPaths,
        'app/Http/Livewire/**',
      ],
    }),
  ],
  resolve: {
    alias: {
        '$': 'jQuery', // Initialize jQuery with the $ symbol
    },
  },
  build: {
    rollupOptions: {
        input: {
            'web-pages': 'resources/js/web-pages.js', // Entry for web pages
            'admin-panel': 'resources/js/admin-panel.js', // Entry for admin panel
          },
      output: {
        manualChunks: {
          'vendor-bootstrap': ['bootstrap'],
          'vendor-datatables': ['laravel-datatables-vite'],
        },
      },
    },
  },
});