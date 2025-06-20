<!DOCTYPE html>
<html>
<head>
  <title>Rates Checker</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

  <!-- Header Section -->
  <header class="site-header">
    <div class="header-left">
      <img src="logo.png" alt="Logo" class="logo" />
      <div class="nav-container">
      <nav class="nav-menu">
        <a href="http://localhost/gcnam-project/">HOME</a>
        <a href="https://gondwana-collection.com/experience-namibia">EXPLORE</a>
        <a href="https://gondwana-collection.com/en/safari-packages">TRAVEL OFFERS</a>
        <a href="https://gondwana-collection.com/news">NEWS & BLOG</a>
        <a href="https://gondwana-collection.com/en/about-us">ABOUT US</a>
        <a href="https://gondwana-collection.com/agent-portal">AGENT PORTAL</a>
        <a href="https://gondwana-collection.com/en/contact-us">CONTACT US</a>
      </nav>
    </div>
     </div>

    <!-- Bookings Button -->
<div class="bookings-btn-wrapper">
  <a href="https://gondwana-collection.com/" class="bookings-btn-link" target="_blank" rel="noopener noreferrer">
    <button class="bookings-btn">BOOK NOW</button>
  </a>
</div>


  </header>

  <!-- Main Content Wrapper -->
  <div class="main-content">
    <h3>Check Unit Rates</h3>
     <div id="result"></div>
 <!-- Inside index.php -->
<form id="rateForm">
  <label for="unit">Unit Type</label>
  <select id="unit" name="unit" required>
    <option value="">Select Unit</option>
    <option value="Standard Room">Standard Room</option>
    <option value="Deluxe Room">Deluxe Room</option>
  </select>

  <label for="arrival">Arrival</label>
  <input id="arrival" name="arrival" type="date" required />

  <label for="departure">Departure</label>
  <input id="departure" name="departure" type="date" required />

  <label for="occupants">Occupants</label>
  <input id="occupants" name="occupants" type="number" placeholder="Occupants" required />

  <label for="ages">Ages (comma separated)</label>
  <input id="ages" name="ages" placeholder="Ages (comma-separated)" required />

  <button type="submit">Get Rate</button>
</form>




   
    
  </div>

 <script src="script.js"></script>
<!-- Footer Section -->
<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-logo">
      <img src="logo.png" alt="Logo" />
    </div>

   <!-- New Subscribe Section -->
<div class="footer-column subscribe-column">
  <a href="https://share.hsforms.com/1vAyyivN-SSWpopwwm8mzMw591yr?__hstc=162122467.e068c78fc669b017d1926f70d2395d70.1748417104112.1749101793039.1749117179669.6&__hssc=162122467.2.1749117179669&__hsfp=2016472731&_gl=1*fkem3y*_gcl_aw*R0NMLjE3NDg0MTcxNDEuQ2p3S0NBanc2TnJCQmhCNkVpd0F2blRfcmhMNnlhbWdvWjhiOGRpMnFpd2hoU2VwZ21kNHRsaW43cGZ1eWhXUUlzR0tBbkVMc3Y2UFdCb0NudHdRQXZEX0J3RQ..*_gcl_au*MzU2Mjc0NDI5LjE3NDg0MTcxMzY" 
     class="subscribe-button" 
     target="_blank" 
     rel="noopener noreferrer">
    Subscribe Now
  </a>
  <p class="subscribe-text">Stay up-to-date with our monthly Newsletter.</p>
</div>

    <div class="footer-column">
      <h4>Services</h4>
      <a href="https://gondwana-collection.com/">Book Now</a>
      <a href="https://gondwana-collection.com/?lodges_and_camps=show">Lodges & Camps</a>
      <a href="https://gondwana-collection.com/en/safari-packages">Safaris & Travel</a>
      <a href="https://carhire.gondwana-collection.com/car-rental?_gl=1*wzoctd*_gcl_aw*R0NMLjE3NDg0MTcxNDEuQ2p3S0NBanc2TnJCQmhCNkVpd0F2blRfcmhMNnlhbWdvWjhiOGRpMnFpd2hoU2VwZ21kNHRsaW43cGZ1eWhXUUlzR0tBbkVMc3Y2UFdCb0NudHdRQXZEX0J3RQ..*_gcl_au*MzU2Mjc0NDI5LjE3NDg0MTcxMzY.">Car Rental</a>
    </div>
<div class="footer-column">
    <h4>Helpful Tips</h4>
<a href="https://gondwana-collection.com/en/contact-us">Good To Know</a>
<a href="https://gondwana-collection.com/en/about-us/gondwana-care-trust/">Gondwana Care Trust</a>
<a href=chrome-extension://efaidnbmnnnibpcajpcglclefindmkaj/https://8820531.fs1.hubspotusercontent-na1.net/hubfs/8820531/01%20Gondwana%20Website/Gondwana%20Passport/Your_Travel_Passport.pdf">Your Local Travel Guide</a>

</div>
    <div class="footer-column">
      <h4>Information</h4>
      
      <a href="https://gondwana-collection.com/en/contact-us">Contact Us</a>
      <a href="https://gondwana-collection.com/card">The Gondwana Card</a>
      <a href="https://gondwana-collection.com/share-trading">Share Trading</a>
      <a href="https://gondwana-collection.com/en/contact-us">Reservations</a>
      <div class="social-icons">
  <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
  <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
  <a href="#" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
  <a href="#" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
   <a href="#" target="_blank" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
</div>

    </div>

  </div>
</footer>

  
</body>
</html>
