module.exports = (req, res) => {
    res.writeHead(302, {
        'Location': 'https://png-5.findicons.com/files/icons/409/witchery/128/cat.png'
        //add other headers here...
      });
      res.end();
};