import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
  testDir: './tests/e2e',
  use: {
    baseURL: 'http://localhost:8000',
  },
  projects: [
    {
      name: 'chromium',
      use: { ...devices['Desktop Chrome'] },
    },
  ],
  webServer: {
    command: 'php -S localhost:8000 kirby/router.php',
    url: 'http://localhost:8000',
    reuseExistingServer: !process.env.CI,
    timeout: 15000,
  },
});
