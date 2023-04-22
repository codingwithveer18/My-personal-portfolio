const express = require("express");
const path = require("path");

const mongoose = require('mongoose');
main().catch(err => console.log(err));
async function main() {
  await mongoose.connect('mongodb://localhost:27017');

  // define mongoose schema
  const contactSchema = new mongoose.Schema({
    name: String,
    phone: String,
    email: String,
    address: String,
    desc: String
  });

  const Contact = mongoose.model('Contact', contactSchema);
  app.post('/contact', (req, res) => {
    var mydata = new Contact(req.body);
    mydata.save().then(() => {
      res.send("this item has been saved to database")
    }).catch(() => {
      res.status(200).render('item was not saved to the database')
    });

    // res.status(200).render('contact.pug');
  })

}
const bodyparser = require("body-parser")


const app = express();
const port = 8000;



// EXPRESS SPECIFIC STUFF
app.use('/static', express.static('static')) // For serving static files
app.use(express.urlencoded())

// PUG SPECIFIC STUFF
app.set('view engine', 'pug') // Set the template engine as pug
app.set('views', path.join(__dirname, 'views')) // Set the views directory

// ENDPOINTS
app.get('/', (req, res) => {
  const params = {}
  res.status(200).render('index.html', params);
})
app.get('/contact', (req, res) => {
  const params = {}
  res.status(200).render('index.html', params)
})

// START THE SERVER
app.listen(port, () => {
  console.log(`The application started successfully on port ${port}`);
});