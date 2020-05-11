const fs = require('fs');
module.exports = (req, res) => {
  const filePath =  __dirname+"/IMG_5507.png"; // or any file format
  fs.createReadStream(filePath).pipe(res);
};
