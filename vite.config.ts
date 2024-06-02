import { defineConfig, splitVendorChunkPlugin } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: 'resources/js/app.tsx',
      refresh: true,
    }),
    react(),
    splitVendorChunkPlugin(),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
      '@css': '/resources/css',
    },
  },
  build: {
    rollupOptions: {
      output: {
        manualChunks(_id) {
          if (_id.includes('lodash')) {
            return 'lodash';
          }
          if (_id.includes('ably')) {
            return 'ably';
          }
          if (_id.includes('cypress')) {
            return 'cypress';
          }
          if (_id.includes('react') || _id.includes('react-dom') || _id.includes('react-type-animation')) {
            return 'react';
          }
          if (_id.includes('leaflet') || _id.includes('react-leaflet')) {
            return 'mapjs';
          }
        },
      },
    },
  },
});
