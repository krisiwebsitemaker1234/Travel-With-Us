  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>Travel Weather Info</h3>
          <p>Your companion for safe and weather-informed travel experiences around the world.</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="footer-section">
          <h3>Quick Links</h3>
          <ul class="footer-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="trending.html">Trending Destinations</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Download Our App</h3>
          <div class="app-badges">
            <a href="#"><img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Download on the App Store"></a>
            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png" alt="Get it on Google Play" style="height: 40px;"></a>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>&copy; 2023 Travel Weather Info. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <style>
        /* Footer */
    footer {
      background-color: var(--dark);
      padding: 40px 0;
      margin-top: 60px;
    }

    .footer-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
    }

    .footer-section {
      flex: 1;
      min-width: 250px;
    }

    .footer-section h3 {
      margin-bottom: 20px;
      font-size: 1.3rem;
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: var(--accent);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-links a:hover {
      color: var(--warning);
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-icons a {
      color: var(--accent);
      font-size: 1.5rem;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .social-icons a:hover {
      color: var(--warning);
      transform: translateY(-3px);
    }

    .app-badges {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .app-badges img {
      height: 40px;
    }

    .copyright {
      text-align: center;
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    </style>