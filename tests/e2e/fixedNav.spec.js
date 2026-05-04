import { test, expect } from '@playwright/test';

test.describe('nav toggle', () => {
  test.use({ viewport: { width: 390, height: 844 } });

  test.beforeEach(async ({ page }) => {
    await page.goto('/');
  });

  test('clicking menu-toggle adds .expanded to .main-nav', async ({ page }) => {
    const nav = page.locator('.main-nav');
    await page.locator('.menu-toggle').click();
    await expect(nav).toHaveClass(/expanded/);
  });

  test('clicking menu-toggle again removes .expanded from .main-nav', async ({ page }) => {
    const toggle = page.locator('.menu-toggle');
    const nav = page.locator('.main-nav');
    await toggle.click();
    await expect(nav).toHaveClass(/expanded/);
    await toggle.click();
    await expect(nav).not.toHaveClass(/expanded/);
  });

  test('.moving is present immediately after toggle and absent after 200ms', async ({ page }) => {
    const nav = page.locator('.main-nav');
    await page.locator('.menu-toggle').click();
    await expect(nav).toHaveClass(/moving/);
    await expect(nav).not.toHaveClass(/moving/, { timeout: 1000 });
  });
});

test.describe('scroll-fixed nav', () => {
  test.beforeEach(async ({ page }) => {
    await page.goto('/');
  });

  test('.scroll added to .main-nav after scrolling past 25px', async ({ page }) => {
    const nav = page.locator('.main-nav');
    await page.evaluate(() => window.scrollTo(0, 100));
    await expect(nav).toHaveClass(/scroll/);
  });

  test('.scroll removed from .main-nav after scrolling back to top', async ({ page }) => {
    const nav = page.locator('.main-nav');
    await page.evaluate(() => window.scrollTo(0, 100));
    await expect(nav).toHaveClass(/scroll/);
    await page.evaluate(() => window.scrollTo(0, 0));
    await expect(nav).not.toHaveClass(/scroll/);
  });
});
