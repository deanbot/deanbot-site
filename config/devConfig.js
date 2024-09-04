module.exports = {
  // url of site hosted via xampp/lampp/mamp/etc
  proxyUrl: 'deanbot.local',

  port: 3000,
  uiPort: 3001,

  // reload when file is changed in content directory
  // will cause unneessary reloads if editing via [localhost]/panel (use panel via proxy url)
  reloadOnContentChange: true,
};
