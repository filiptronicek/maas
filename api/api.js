const fetch = require('node-fetch');



module.exports = (req, res) => {
  fetch('https://meme-api.herokuapp.com/gimme')
    .then(res => res.json())
    .then(json =>  res.json(json.url));
};
