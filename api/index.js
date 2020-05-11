module.exports = (req, res) => {
    res.header("Content-Type", "application/json");
    const {
      query: { name }
    } = req;
  
    res.send(`Hello ${name}!`);
  }