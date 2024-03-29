import { defineConfig } from 'vite';
import leaf from '@leafphp/vite-plugin';

export default defineConfig({
    plugins: [
        leaf({
            hotFile: 'hot',
            input: ['js/app.js', 'css/app.css'],
            refresh: true,
        }),
    ],
});
