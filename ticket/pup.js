const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Load the generated HTML file
    const htmlFile = 'index.php';
    await page.goto(`file://${htmlFile}`, { waitUntil: 'domcontentloaded' });

    // Define the path where you want to save the screenshot
    const screenshotPath = 'ticket.png';

    // Capture a screenshot
    await page.screenshot({ path: screenshotPath });

    console.log(`Screenshot saved to ${screenshotPath}`);

    await browser.close();
})();
