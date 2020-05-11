const fetch = require("node-fetch");
const { json } = require("express");
module.exports = (req, res) => {
  fetch('https://meme-api.herokuapp.com/gimme')
    .then(result => result.json())
    .then(json => {
    res.writeHead(302, {
      'Location': json.url
      //add other headers here...
    });
    res.end();
  });
  };